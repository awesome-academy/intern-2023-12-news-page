<?php

namespace Tests\Unit\Model;

use App\Models\Notification;
use App\Models\Post;
use App\Models\Reply;
use App\Models\Report;
use App\Models\Review;
use App\Models\Role;
use App\Models\Status;
use App\Models\User;
use Tests\Unit\ModelTestCase;

class UserTest extends ModelTestCase
{
    public function testModelConfiguration()
    {
        $this->runConfigurationAssertions(
            new User(),
            ['name', 'email', 'password', 'role_id', 'status_id', 'verify', 'avatar', 'remember_token'],
            ['password', 'remember_token'],
            ['id', 'email_verified_at'],
            [],
            ['email_verified_at' => 'date:d-m-Y', 'birthday' => 'date:d-m-Y', 'id' => 'int'],
            ['created_at', 'updated_at'],
            'id',
            'users'
        );
    }

    public function testHasManyPosts()
    {
        $model = new User();
        $relation = $model->posts();

        $this->assertHasManyRelation($relation, $model, new Post(), 'user_id', 'id');
    }

    public function testBelongsToManyFollowers()
    {
        $model = new User();
        $relation = $model->followers();

        $this->assertBelongsToManyRelation($relation, $model, $model, 'follows.follower_id', 'follows.user_id');
    }

    public function testBelongsToManyFollowing()
    {
        $model = new User();
        $relation = $model->following();

        $this->assertBelongsToManyRelation($relation, $model, $model, 'follows.user_id', 'follows.follower_id');
    }

    public function testHasOneRole()
    {
        $model = new User();
        $relation = $model->role();

        $this->assertHasOneRelation($relation, $model, new Role(), 'id', 'role_id');
    }

    public function testHasOneStatus()
    {
        $model = new User();
        $relation = $model->status();

        $this->assertHasOneRelation($relation, $model, new Status(), 'id', 'status_id');
    }

    public function testHasManyReviews()
    {
        $model = new User();
        $relation = $model->reviews();

        $this->assertHasManyRelation($relation, $model, new Review(), 'user_id', 'id');
    }

    public function testHasManyReplies()
    {
        $model = new User();
        $relation = $model->replies();

        $this->assertHasManyRelation($relation, $model, new Reply(), 'user_id', 'id');
    }

    public function testHasManyReports()
    {
        $model = new User();
        $relation = $model->reports();

        $this->assertHasManyRelation($relation, $model, new Report(), 'report_id', 'id');
    }

    public function testHasManyUserReports()
    {
        $model = new User();
        $relation = $model->userReport();

        $this->assertHasManyRelation($relation, $model, new Report(), 'user_id', 'id');
    }

    public function testHasManyNotifications()
    {
        $model = new User();
        $relation = $model->notifications();

        $this->assertHasManyRelation($relation, $model, new Notification(), 'notifiable', 'id');
    }

    public function testSetNameAttribute()
    {
        $model = new User();
        $nameValue = '<script>alert("Hello!")</script>';

        $model->name = $nameValue;

        $this->assertEquals(htmlspecialchars($nameValue), $model->getAttribute('name'));
    }

    public function testGetNameAttribute()
    {
        $model = new User();
        $nameValue = 'john';

        $model->setAttribute('name', $nameValue);

        $result = $model->name;

        $this->assertEquals(ucfirst($nameValue), $result);
    }
}
