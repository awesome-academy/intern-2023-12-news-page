<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use App\Http\Requests\ProfileRequest;
use App\Repository\FollowRepository;
use App\Repository\PostRepository;
use App\Repository\UserRepository;
use App\Services\ReportService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    protected $postRepository;
    protected $reportService;
    protected $userRepository;
    protected $followRepository;

    public function __construct(
        PostRepository $postRepository,
        ReportService $reportService,
        UserRepository $userRepository,
        FollowRepository $followRepository
    ) {
        $this->postRepository = $postRepository;
        $this->reportService = $reportService;
        $this->userRepository = $userRepository;
        $this->followRepository = $followRepository;
    }

    public function dashboard()
    {
        $userId = Auth::user()->id;
        $role = Auth::user()->role->slug;
        $dataView = [
            'countViews' => $this->postRepository->countViews($userId),
            'countPosts' => $this->postRepository->countPosts($userId),
            'countFollows' => $this->followRepository->countFollower($userId),
        ];
        if (in_array($role, config('constants.modSlug'))) {
            $dataView['countReports'] = $this->reportService->countReports();
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

        $this->userRepository->updateProfile($userId, $dataUpdate);

        return redirect()->route('profile')->with('success', config('constants.notification.updateSuccess'));
    }

    public function updatePassword(PasswordRequest $request): RedirectResponse
    {
        $userId = Auth::user()->id;
        $dataUpdate = [
            'password' => Hash::make($request['new_password']),
        ];

        $this->userRepository->updateProfile($userId, $dataUpdate);

        return redirect()->route('profile')->with('success', config('constants.notification.updateSuccess'));
    }
}
