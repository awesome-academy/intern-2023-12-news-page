<?php

namespace Tests\Unit\Model;

use App\Models\Post;
use App\Models\Report;
use App\Models\Review;
use App\Models\User;
use Tests\Unit\ModelTestCase;

class ReportTest extends ModelTestCase
{
    public function testModelConfiguration()
    {
        $this->runConfigurationAssertions(
            new Report(),
            ['report_id', 'type', 'content', 'user_id'],
            [],
            ['*'],
            [],
            ['id' => 'int'],
            ['created_at', 'updated_at'],
            'id',
            'reports'
        );
    }

    public function testBelongsToReview()
    {
        $model = new Report();
        $relation = $model->review();

        $this->assertBelongsToRelation($relation, $model, new Review(), 'report_id', 'id');
    }

    public function testBelongsToUser()
    {
        $model = new Report();
        $relation = $model->user();

        $this->assertBelongsToRelation($relation, $model, new User(), 'report_id', 'id');
    }

    public function testBelongsToPost()
    {
        $model = new Report();
        $relation = $model->post();

        $this->assertBelongsToRelation($relation, $model, new Post(), 'report_id', 'id');
    }

    public function testBelongsToUserInfo()
    {
        $model = new Report();
        $relation = $model->userInfo();

        $this->assertBelongsToRelation($relation, $model, new User(), 'user_id', 'id');
    }

    public function testSetContentAttribute()
    {
        $model = new Report();
        $typeValue = '<script>alert("Danger!")</script>';

        $model->content = $typeValue;

        $this->assertEquals(htmlspecialchars($typeValue), $model->getAttribute('content'));
    }

    public function testSetTypeAttribute()
    {
        $model = new Report();
        $typeValue = '<script>alert("Danger!")</script>';

        $model->type = $typeValue;

        $this->assertEquals(htmlspecialchars($typeValue), $model->getAttribute('type'));
    }
}
