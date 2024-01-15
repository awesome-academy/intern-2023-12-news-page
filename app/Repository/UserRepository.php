<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserRepository
{
    protected $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function getPostByRole($tab, $search): LengthAwarePaginator
    {
        $roleId = $this->roleRepository->getIdBySlug($tab);

        $query = User::with(['status', 'role'])->where('role_id', $roleId);

        if (!empty($search)) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        return $query->paginate(config('constants.paginate'));
    }

    public function getUserById($userId)
    {
        return User::where('id', $userId)->select(['name', 'avatar', 'created_at', 'verify'])->first();
    }

    public function updateStatus($userId, $getIdUpdateStatus)
    {
        User::find($userId)->update([
            'status_id' => $getIdUpdateStatus,
        ]);
    }

    public function updateRole($userId, $getIdUpdateRole)
    {
        User::find($userId)->update([
            'role_id' => $getIdUpdateRole,
        ]);
    }

    public function updateVerify($userId, $verify)
    {
        User::find($userId)->update([
            'verify' => $verify,
        ]);
    }

    public function getUserSearch($search, $limit = null)
    {
        $configUserSlug = config('constants.user.userStatusActive');
        $configUserType = config('constants.user.userStatusType');
        $statusId = $this->statusRepository->getIdBySlug($configUserSlug, $configUserType);

        $query = User::with(['posts', 'role', 'followers'])->where('status_id', $statusId)
            ->where('name', 'like', '%' . $search . '%')
            ->select(['name', 'avatar', 'verify', 'id', 'role_id']);

        if ($limit !== null) {
            $query->limit($limit);
        }

        return $query->get();
    }

    public function updateProfile($userId, $dataUpdate)
    {
        User::find($userId)->update($dataUpdate);
    }
}
