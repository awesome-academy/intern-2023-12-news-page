<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use App\Http\Requests\ProfileRequest;
use App\Repository\Resource\FollowRepositoryInterface;
use App\Repository\Resource\PostRepositoryInterface;
use App\Repository\Resource\UserRepositoryInterface;
use App\Services\PostService;
use App\Services\ReportService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    protected $reportService;
    protected $postService;
    protected $postRepositoryInterface;
    protected $userRepositoryInterface;
    protected $followRepositoryInterface;

    public function __construct(
        ReportService $reportService,
        PostService $postService,
        PostRepositoryInterface $postRepositoryInterface,
        UserRepositoryInterface $userRepositoryInterface,
        FollowRepositoryInterface $followRepositoryInterface
    ) {
        $this->reportService = $reportService;
        $this->postService = $postService;
        $this->userRepositoryInterface = $userRepositoryInterface;
        $this->followRepositoryInterface = $followRepositoryInterface;
        $this->postRepositoryInterface = $postRepositoryInterface;
    }

    public function getDataDateQuery($time, $userId): Collection
    {
        return $this->postService->getDataDateQuery($time, $userId);
    }

    public function dashboard(Request $request)
    {
        $userId = Auth::user()->id;
        $role = Auth::user()->role->slug;
        $data = $this->getDataDateQuery($request['time'], $userId);
        $dataView = [
            'countViews' => $this->postRepositoryInterface->countViews($userId),
            'countPosts' => $this->postRepositoryInterface->countPosts($userId),
            'countFollows' => $this->followRepositoryInterface->countFollower($userId),
            'highestViewPost' => $this->postRepositoryInterface->getHighestViewPost($userId),
            'highestCommentPost' => $this->postRepositoryInterface->getHighestCommentPost($userId),
            'newestPost' => $this->postRepositoryInterface->getNewestPost($userId),
            'selectDateQuery' => config('constants.dayQuery.dataQuerySelected'),
            'selectChoice' => $request['time'],
            'data' => $data,
        ];

        if (in_array($role, config('constants.modSlug'))) {
            $dataView['countReports'] = $this->reportService->countReports();
        }

        if ($data->count() > 0) {
            $dataView['lastUpdated'] = !empty($data->last()->updated_at) ? $data->last()->updated_at :
                $data->last()->created_at;
        }

        return view('dashboard')->with($dataView);
    }

    public function profile()
    {
        $dataView = [
            'user' => Auth::user(),
        ];

        return view('profile')->with($dataView);
    }

    public function updateProfile(ProfileRequest $request): RedirectResponse
    {
        $userId = Auth::user()->id;
        $dataUpdate = [
            'name' => $request['name'],
        ];

        if (isset($request['file'])) {
            $dataUpdate['avatar'] = uploadAvatarProfile($request['file']);
        } else {
            $dataUpdate['avatar'] = $request['default'];
        }

        $this->userRepositoryInterface->updateProfile($userId, $dataUpdate);

        return redirect()->route('profile')->with('success', config('constants.notification.updateSuccess'));
    }

    public function updatePassword(PasswordRequest $request): RedirectResponse
    {
        $userId = Auth::user()->id;
        $dataUpdate = [
            'password' => Hash::make($request['new_password']),
        ];

        $this->userRepositoryInterface->updateProfile($userId, $dataUpdate);

        return redirect()->route('profile')->with('success', config('constants.notification.updateSuccess'));
    }
}
