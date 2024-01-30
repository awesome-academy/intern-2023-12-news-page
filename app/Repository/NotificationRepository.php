<?php

namespace App\Repository;

use App\Models\Notification;
use App\Repository\Resource\NotificationRepositoryInterface;

class NotificationRepository extends BaseRepository implements NotificationRepositoryInterface
{
    protected $model;

    public function __construct(Notification $notification)
    {
        $this->model = $notification;
        parent::__construct($notification);
    }

    public function getNotificationsByUserId($userId, $tab = null)
    {
        if (empty($tab)) {
            return $this->paginate(config('constants.paginate'), ['notifiable' => $userId]);
        }

        return $this->model->where('notifiable', $userId)
            ->orderBy('created_at', 'DESC')->paginate(config('constants.paginate'), ['*'], 'page', $tab);
    }

    public function countNotificationsNotReadingYet($userId)
    {
        return $this->model->where('notifiable', $userId)->where('read_at', false)->count();
    }

    public function updateReadNotification($id)
    {
        return $this->edit($id, [
            'read_at' => true,
        ]);
    }
}
