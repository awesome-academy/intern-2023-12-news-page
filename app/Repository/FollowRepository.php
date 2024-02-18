<?php

namespace App\Repository;

use App\Models\Follow;
use App\Models\User;
use App\Notifications\NotificationFollow;
use App\Repository\Resource\FollowRepositoryInterface;
use Carbon\Carbon;
use Pusher\Pusher;

class FollowRepository extends BaseRepository implements FollowRepositoryInterface
{
    protected $model;

    public function __construct(Follow $model)
    {
        $this->model = $model;
        parent::__construct($model);
    }

    public function followAction($data)
    {
        $search = $this->find([
            'user_id' => $data['user_id'],
            'follower_id' => $data['follower_id'],
        ]);

        if (empty($search)) {
            $this->store([
                'user_id' => $data['user_id'],
                'follower_id' => $data['follower_id'],
                'created_at' => Carbon::now(),
            ]);

            $user = User::find($data['follower_id']);
            $following = User::find($data['user_id']);

            $user->notify(new NotificationFollow($following->name));

            $options = [
                'cluster' => 'ap1',
                'encrypted' => true,
            ];

            $pusher = new Pusher(
                env('PUSHER_APP_KEY'),
                env('PUSHER_APP_SECRET'),
                env('PUSHER_APP_ID'),
                $options
            );

            $pusher->trigger('NotificationEvent', 'send-notification', [
                'following_id' => $data['follower_id'],
                'name' => $following->name,
            ]);
        } else {
            $search->delete();
        }
    }

    public function checkFollow($userId, $followerId)
    {
        return $this->find([
            'user_id' => $userId,
            'follower_id' => $followerId,
        ]);
    }

    public function getFollow($userId, $tab, $search = null)
    {
        $query = User::where('id', $userId);

        if ($tab === config('constants.follow.followerTab')) {
            $query->with([
                'followers' => function ($query) use ($search) {
                    $query->where('name', 'LIKE', '%' . $search . '%');
                },
            ]);
        } else {
            $query->with([
                'following' => function ($query) use ($search) {
                    $query->where('name', 'LIKE', '%' . $search . '%');
                },
            ]);
        }

        return $query->first();
    }

    public function unFollow($userId, $authId)
    {
        $this->find([
            'user_id' => $authId,
            'follower_id' => $userId,
        ])->delete();
    }

    public function countFollower($userId)
    {
        return $this->model->where('follower_id', $userId)->count();
    }
}
