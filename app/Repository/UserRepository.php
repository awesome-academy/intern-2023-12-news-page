<?php

namespace App\Repository;

use App\Models\User;
use App\Repository\Resource\StatusRepositoryInterface;
use App\Repository\Resource\UserRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected $roleRepository;
    protected $statusRepositoryI;
    protected $model;

    public function __construct(
        RoleRepository $roleRepository,
        StatusRepositoryInterface $statusRepositoryI,
        User $model
    ) {
        $this->roleRepository = $roleRepository;
        $this->statusRepositoryI = $statusRepositoryI;
        $this->model = $model;

        parent::__construct($model);
    }

    public function getPostByRole($tab, $search): LengthAwarePaginator
    {
        $roleId = $this->roleRepository->getIdBySlug($tab);

        $query = $this->model->with(['status', 'role'])->where('role_id', $roleId);

        if (!empty($search)) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        return $query->paginate(config('constants.paginate'));
    }

    public function getUserById($userId)
    {
        return $this->find(['id' => $userId], ['name', 'avatar', 'created_at', 'verify']);
    }

    public function updateStatus($userId, $getIdUpdateStatus)
    {
        $this->edit($userId, [
            'status_id' => $getIdUpdateStatus,
        ]);
    }

    public function updateRole($userId, $getIdUpdateRole)
    {
        $this->edit($userId, [
            'role_id' => $getIdUpdateRole,
        ]);
    }

    public function updateVerify($userId, $verify)
    {
        $this->edit($userId, [
            'verify' => $verify,
        ]);
    }

    public function getUserSearch($search, $paginate = null)
    {
        $configUserSlug = config('constants.user.userStatusActive');
        $configUserType = config('constants.user.userStatusType');
        $statusId = $this->statusRepositoryI->getIdBySlug($configUserSlug, $configUserType);

        $query = $this->model->with(['posts', 'role', 'followers'])->where('status_id', $statusId)
            ->where('name', 'like', '%' . $search . '%')
            ->select(['name', 'avatar', 'verify', 'id', 'role_id']);

        if ($paginate !== null) {
            return $query->paginate($paginate);
        }

        return $query->get();
    }

    public function updateProfile($userId, $dataUpdate)
    {
        $this->edit($userId, $dataUpdate);
    }
}
