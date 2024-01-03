<?php

namespace App\Http\Controllers;

use App\Repository\PostRepository;
use App\Services\ReportService;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    protected $postRepository;
    protected $reportService;

    public function __construct(PostRepository $postRepository, ReportService $reportService)
    {
        $this->postRepository = $postRepository;
        $this->reportService = $reportService;
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
            $dataView['countReports'] = $this->reportService->countReports();
        }

        return view('dashboard')->with($dataView);
    }
}
