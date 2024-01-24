<?php

namespace Tests\Unit\Model;

use App\Models\Reply;
use App\Models\Review;
use App\Models\Status;
use App\Models\User;
use Tests\Unit\ModelTestCase;

class ReplyTest extends ModelTestCase
{
    public function testModelConfiguration()
    {
        $this->runConfigurationAssertions(
            new Reply(),
            [],
            [],
            ['*'],
            [],
            ['id' => 'int'],
            ['created_at', 'updated_at'],
            'id',
            'replies'
        );
    }

    public function testBelongsToUser()
    {
        $model = new Reply();
        $relation = $model->user();

        $this->assertBelongsToRelation($relation, $model, new User(), 'user_id', 'id');
    }

    public function testBelongsToReview()
    {
        $model = new Reply();
        $relation = $model->review();

        $this->assertBelongsToRelation($relation, $model, new Review(), 'review_id', 'id');
    }

    public function testBelongsToStatus()
    {
        $model = new Reply();
        $relation = $model->status();

        $this->assertBelongsToRelation($relation, $model, new Status(), 'status_id', 'id');
    }

    public function testSetContentAttribute()
    {
        $model = new Reply();
        $typeValue = '<script>alert("Danger!")</script>';

        $model->content = $typeValue;

        $this->assertEquals(htmlspecialchars($typeValue), $model->getAttribute('content'));
    }
}
