<?php

namespace Tests\Unit\Model;

use App\Models\Category;
use App\Models\Hashtag;
use App\Models\Post;
use App\Models\Report;
use App\Models\Review;
use App\Models\Status;
use App\Models\User;
use Tests\Unit\ModelTestCase;

class PostTest extends ModelTestCase
{
    public function testModelConfiguration()
    {
        $this->runConfigurationAssertions(
            new Post(),
            ['title', 'content', 'user_id', 'thumbnail', 'description', 'category_id', 'status_id'],
            [],
            ['*'],
            [],
            ['id' => 'int', 'deleted_at' => 'datetime'],
            ['created_at', 'updated_at'],
            'id',
            'posts'
        );
    }

    public function testBelongsToUser()
    {
        $model = new Post();
        $relation = $model->user();

        $this->assertBelongsToRelation($relation, $model, new User(), 'user_id', 'id');
    }

    public function testBelongsToCategory()
    {
        $model = new Post();
        $relation = $model->category();

        $this->assertBelongsToRelation($relation, $model, new Category(), 'category_id', 'id');
    }

    public function testHasManyReports()
    {
        $model = new Post();
        $relation = $model->reports();

        $this->assertHasManyRelation($relation, $model, new Report(), 'report_id', 'id');
    }

    public function testHasManyReviews()
    {
        $model = new Post();
        $relation = $model->reviews();

        $this->assertHasManyRelation($relation, $model, new Review(), 'post_id', 'id');
    }

    public function testBelongsToStatus()
    {
        $model = new Post();
        $relation = $model->status();

        $this->assertBelongsToRelation($relation, $model, new Status(), 'status_id', 'id');
    }

    public function testBelongsToManyHashtags()
    {
        $model = new Post();
        $relation = $model->hashtags();

        $this->assertBelongsToManyRelation(
            $relation,
            $model,
            new Hashtag(),
            'post_hashtag.post_id',
            'post_hashtag.hashtag_id'
        );
    }

    public function testSetTypeAttribute()
    {
        $model = new Post();
        $typeValue = '<script>alert("Danger!")</script>';

        $model->type = $typeValue;

        $this->assertEquals(htmlspecialchars($typeValue), $model->getAttribute('type'));
    }
}
