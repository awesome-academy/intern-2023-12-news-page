<?php

namespace App\Http\Controllers;

use App\Repository\PostRepository;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function dashboard()
    {
        $userId = Auth::user()->id;
        $role = Auth::user()->role->slug;
        $dataView = [
            'countViews' => $this->postRepository->countViews($userId),
            'countPosts' => $this->postRepository->countPosts($userId),
            'countFollows' => 0,
        ];
        if (in_array($role, config('constants.modSlug'))) {
            $dataView['countReports'] = 0;
        }

        return view('dashboard')->with($dataView);
    }
}
