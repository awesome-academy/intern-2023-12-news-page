<?php

namespace App\Http\Controllers;

use App\Repository\PostRepository;
use App\Repository\RoleRepository;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    protected $postRepository;
    protected $roleRepository;

    public function __construct(PostRepository $postRepository, RoleRepository $roleRepository)
    {
        $this->postRepository = $postRepository;
        $this->roleRepository = $roleRepository;
    }

    public function dashboard()
    {
        $userId = Auth::user()->id;
        $role = $this->roleRepository->getSlugbyId($userId);
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
