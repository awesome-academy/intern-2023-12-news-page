<?php

namespace App\Repository\Resource;

interface NotificationRepositoryInterface
{
    public function getNotificationsByUserId($userId, $tab);

    public function countNotificationsNotReadingYet($userId);

    public function updateReadNotification($id);
}
