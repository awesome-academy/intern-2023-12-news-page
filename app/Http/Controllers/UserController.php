<?php

namespace App\Http\Controllers;

use App\Repository\RoleRepository;
use App\Repository\StatusRepository;
use App\Repository\UserRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepository;
    protected $statusRepository;
    protected $roleRepository;

    public function __construct(
        UserRepository $userRepository,
        StatusRepository $statusRepository,
        RoleRepository $roleRepository
    ) {
        $this->userRepository = $userRepository;
        $this->statusRepository = $statusRepository;
        $this->roleRepository = $roleRepository;
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function __getDataTab($tab, $search): LengthAwarePaginator
    {
        return $this->userRepository->getPostByRole($tab, $search);
    }

    public function managerUsersIndex(Request $request)
    {
        $tab = $request['tab'] ?? config('constants.user.userType');
        $search = $request['search'];

        $dataView = [
            'data' => $this->__getDataTab($tab, $search),
            'tab' => $tab,
            'search' => $search,
        ];

        return view('auth/pages/managerUser/index')->with($dataView);
    }

    public function updateStatus(Request $request, $user): RedirectResponse
    {
        $userId = $user;
        $slug = $request['slug'];
        $type = config('constants.user.userStatusType');
        $getIdUpdateStatus = $this->statusRepository->getIdBySlug($slug, $type);

        $this->userRepository->updateStatus($userId, $getIdUpdateStatus);

        return redirect()->route('manager.users.index')
            ->with('success', config('constants.notification.updateSuccess'));
    }

    public function updateRole(Request $request, $user): RedirectResponse
    {
        $userId = $user;
        $slug = $request['slug'];
        $getIdUpdateRole = $this->roleRepository->getIdBySlug($slug);

        $this->userRepository->updateRole($userId, $getIdUpdateRole);

        return redirect()->route('manager.users.index')
            ->with('success', config('constants.notification.updateSuccess'));
    }
}
