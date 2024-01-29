<?php

namespace Tests\Unit\Model;

use App\Models\Post;
use App\Models\Reply;
use App\Models\Review;
use App\Models\Status;
use App\Models\User;
use Tests\Unit\ModelTestCase;

class StatusTest extends ModelTestCase
{
    public function testModelConfiguration()
    {
        $this->runConfigurationAssertions(
            new Status(),
            ['*'],
            [],
            ['*'],
            [],
            ['id' => 'int'],
            ['created_at', 'updated_at'],
            'id',
            'statuses'
        );
    }

    public function testHasManyUsers()
    {
        $model = new Status();
        $relation = $model->users();

        $this->assertHasManyRelation($relation, $model, new User(), 'status_id', 'id');
    }

    public function testHasManyReviews()
    {
        $model = new Status();
        $relation = $model->reviews();

        $this->assertHasManyRelation($relation, $model, new Review(), 'status_id', 'id');
    }

    public function testHasManyPosts()
    {
        $model = new Status();
        $relation = $model->posts();

        $this->assertHasManyRelation($relation, $model, new Post(), 'status_id', 'id');
    }

    public function testHasManyReplies()
    {
        $model = new Status();
        $relation = $model->replies();

        $this->assertHasManyRelation($relation, $model, new Reply(), 'status_id', 'id');
    }
}
