<?php

namespace App\Repository;

use App\Models\Notification;

class NotificationRepository
{
    public function getNotificationsByUserId($userId, $tab = null)
    {
        if (empty($tab)) {
            return Notification::where('notifiable', $userId)
                ->orderBy('created_at', 'DESC')->paginate(config('constants.paginate'));
        }

        return Notification::where('notifiable', $userId)
            ->orderBy('created_at', 'DESC')->paginate(config('constants.paginate'), ['*'], 'page', $tab);
    }

    public function countNotificationsNotReadingYet($userId)
    {
        return Notification::where('notifiable', $userId)->where('read_at', false)->count();
    }

    public function updateReadNotification($id)
    {
        return Notification::where('id', $id)->update([
            'read_at' => true,
        ]);
    }
}
