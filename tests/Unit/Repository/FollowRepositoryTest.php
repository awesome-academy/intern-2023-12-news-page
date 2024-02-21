<?php

namespace Tests\Unit\Repository;

use App\Models\Follow;
use App\Models\User;
use App\Notifications\NotificationFollow;
use App\Repository\FollowRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Mockery;
use Pusher\Pusher;
use Tests\TestCase;

class FollowRepositoryTest extends TestCase
{
    use RefreshDatabase;

    protected $followRepository;
    protected $followModel;
    protected $userModel;
    protected $user;
    protected $idsUser;
    protected $data;

    public function setUp(): void
    {
        parent::setUp();
        Notification::fake();

        $this->followModel = Mockery::mock(Follow::class);
        $this->userModel = Mockery::mock(User::class);

        $this->followModel->shouldReceive('where')->andReturn($this->followModel);
        $this->followModel->shouldReceive('select')->andReturn($this->followModel);
        $this->followModel->shouldReceive('create')->andReturn(null);
        $this->followModel->shouldReceive('delete')->andReturn(null);

        $this->user = User::factory(2)->create();
        $this->idsUser = $this->user->pluck('id')->toArray();
        $this->data = [
            'user_id' => 5000,
            'follower_id' => 5001,
        ];
        Auth::shouldReceive('user')->andReturn($this->user);
        Follow::factory($this->data)->create();

        $this->followRepository = new FollowRepository($this->followModel);
    }

    public function tearDown(): void
    {
        Mockery::close();
        unset($this->followRepository);
        parent::tearDown();
    }

    public function test_follows_a_user_and_sends_notification()
    {
        $pusher = Mockery::mock(Pusher::class);
        $pusher->shouldReceive('trigger')->andReturn((object) ['status' => 'success']);

        $followerId = $this->idsUser[1];
        $userId = $this->idsUser[0];

        $this->followModel->shouldReceive('first')->andReturn([]);

        $response = $this->followRepository->followAction([
            'user_id' => $userId,
            'follower_id' => $followerId,
        ], $pusher);

        $this->assertTrue($response);

        Notification::assertSentTo(
            [$this->user[1]],
            NotificationFollow::class
        );
    }

    public function test_had_follows_user_and_unfollow()
    {
        $followerId = 5001;
        $userId = 5000;

        $fakeRecord = Mockery::mock();
        $fakeRecord->shouldReceive('delete')->andReturn(null);

        $this->followModel->shouldReceive('first')->andReturn($fakeRecord)->shouldReceive('delete')->andReturn(null);

        $response = $this->followRepository->followAction([
            'user_id' => $userId,
            'follower_id' => $followerId,
        ]);

        $this->assertFalse($response);
    }
}
