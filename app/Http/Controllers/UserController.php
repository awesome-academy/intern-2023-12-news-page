<?php

namespace App\Http\Controllers;

use App\Repository\Resource\RoleRepositoryInterface;
use App\Repository\Resource\StatusRepositoryInterface;
use App\Repository\Resource\UserRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepositoryInterface;
    protected $statusRepositoryInterface;
    protected $roleRepositoryInterface;

    public function __construct(
        UserRepositoryInterface $userRepositoryInterface,
        StatusRepositoryInterface $statusRepositoryInterface,
        RoleRepositoryInterface $roleRepositoryInterface
    ) {
        $this->userRepositoryInterface = $userRepositoryInterface;
        $this->statusRepositoryInterface = $statusRepositoryInterface;
        $this->roleRepositoryInterface = $roleRepositoryInterface;
    }

    public function __getDataTab($tab, $search): LengthAwarePaginator
    {
        return $this->userRepositoryInterface->getPostByRole($tab, $search);
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
        $getIdUpdateStatus = $this->statusRepositoryInterface->getIdBySlug($slug, $type);

        $this->userRepositoryInterface->updateStatus($userId, $getIdUpdateStatus);

        return redirect()->route('manager.users.index')
            ->with('success', config('constants.notification.updateSuccess'));
    }

    public function updateRole(Request $request, $user): RedirectResponse
    {
        $userId = $user;
        $slug = $request['slug'];
        $getIdUpdateRole = $this->roleRepositoryInterface->getIdBySlug($slug);

        $this->userRepositoryInterface->updateRole($userId, $getIdUpdateRole);

        return redirect()->route('manager.users.index')
            ->with('success', config('constants.notification.updateSuccess'));
    }

    public function updateVerify(Request $request, $user): RedirectResponse
    {
        $userId = $user;
        $updateVerify = $request['verify'];

        $this->userRepositoryInterface->updateVerify($userId, $updateVerify);

        return redirect()->route('manager.users.index')
            ->with('success', config('constants.notification.updateSuccess'));
    }
}
