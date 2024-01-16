<?php

namespace App\Http\Controllers;

use App\Repository\FollowRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    protected $followRepository;

    public function __construct(FollowRepository $followRepository)
    {
        $this->followRepository = $followRepository;
    }

    public function __getDataTab($tab, $search)
    {
        $id = userAuth()->id;

        return $this->followRepository->getFollow($id, $tab, $search);
    }

    public function index(Request $request)
    {
        $tab = empty($request['tab']) ? config('constants.follow.followerTab') : $request['tab'];
        $search = $request['search'];
        $data = $this->__getDataTab($tab, $search);
        $dataByTab = $tab === config('constants.follow.followerTab') ? $data->followers : $data->following;

        $dataView = [
            'tab' => $tab,
            'search' => $search,
            'data' => $dataByTab,
        ];

        return view('auth/pages/follow/index')->with($dataView);
    }

    public function unFollow(Request $request): RedirectResponse
    {
        $authId = Auth::user()->id;
        $userId = $request['userId'];

        $this->followRepository->unFollow($userId, $authId);

        return redirect()->route('follows.index')
            ->with('success', config('constants.notification.updateSuccess'));
    }
}
