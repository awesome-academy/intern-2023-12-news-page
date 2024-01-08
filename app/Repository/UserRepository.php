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
}
