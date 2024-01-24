<?php

namespace Tests\Unit\Model;

use App\Models\Post;
use App\Models\Reply;
use App\Models\Report;
use App\Models\Review;
use App\Models\Status;
use App\Models\User;
use Tests\Unit\ModelTestCase;

class ReviewTest extends ModelTestCase
{
    public function testModelConfiguration()
    {
        $this->runConfigurationAssertions(
            new Review(),
            ['post_id', 'user_id', 'content', 'status_id'],
            [],
            ['*'],
            [],
            ['id' => 'int'],
            ['created_at', 'updated_at'],
            'id',
            'reviews'
        );
    }

    public function testBelongsToUser()
    {
        $model = new Review();
        $relation = $model->user();

        $this->assertBelongsToRelation($relation, $model, new User(), 'user_id', 'id');
    }

    public function testHasManyReplies()
    {
        $model = new Review();
        $relation = $model->replies();

        $this->assertHasManyRelation($relation, $model, new Reply(), 'review_id', 'id');
    }

    public function testHasManyReports()
    {
        $model = new Review();
        $relation = $model->reports();

        $this->assertHasManyRelation($relation, $model, new Report(), 'report_id', 'id');
    }

    public function testBelongsToPost()
    {
        $model = new Review();
        $relation = $model->post();

        $this->assertBelongsToRelation($relation, $model, new Post(), 'post_id', 'id');
    }

    public function testBelongsToStatus()
    {
        $model = new Review();
        $relation = $model->status();

        $this->assertBelongsToRelation($relation, $model, new Status(), 'status_id', 'id');
    }
}
