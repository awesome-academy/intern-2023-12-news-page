<?php

namespace App\Http\Controllers;

use App\Repository\ManagerPostRepository;
use App\Services\ManagerPostService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ManagerPostController
{
    protected $managerPostService;
    protected $managerPostRepository;

    public function __construct(ManagerPostService $managerPostService, ManagerPostRepository $managerPostRepository)
    {
        $this->managerPostRepository = $managerPostRepository;
        $this->managerPostService = $managerPostService;
    }

    public function __getDataTab($tab, $search): LengthAwarePaginator
    {
        $tab = empty($tab) ? config('constants.post.postStatusSlugVerify') : $tab;

        return $this->managerPostRepository->getPostByStatus($tab, $search);
    }

    public function index(Request $request)
    {
        $tab = $request['tab'];
        $search = $request['search'];

        $dataView = [
            'data' => $this->__getDataTab($tab, $search),
            'tab' => $tab,
            'search' => $search,
        ];

        return view('auth/pages/managerPost/index')->with($dataView);
    }

    public function handle(Request $request): RedirectResponse
    {
        $data = [
            'id' => $request['post'],
            'status_id' => $request['status'],
        ];

        $this->managerPostService->changeStatusPostByManager($data);

        return redirect()->route('manager.post.index')
            ->with('success', config('constants.notification.updateSuccess'));
    }
}
