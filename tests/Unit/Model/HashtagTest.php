<?php

namespace Tests\Unit\Model;

use App\Models\Hashtag;
use App\Models\Post;
use Tests\Unit\ModelTestCase;

class HashtagTest extends ModelTestCase
{
    public function testModelConfiguration()
    {
        $this->runConfigurationAssertions(
            new Hashtag(),
            ['name', 'slug'],
            [],
            ['*'],
            [],
            ['id' => 'int'],
            ['created_at', 'updated_at'],
            'id',
            'hashtags'
        );
    }

    public function testBelongsToManyPosts()
    {
        $model = new Hashtag();
        $relation = $model->posts();

        $this->assertBelongsToManyRelation(
            $relation,
            $model,
            new Post(),
            'post_hashtag.hashtag_id',
            'post_hashtag.post_id'
        );
    }

    public function testSetNameAttribute()
    {
        $model = new Hashtag();
        $nameValue = '<script>alert("Hello!")</script>';

        $model->name = $nameValue;

        $this->assertEquals(htmlspecialchars($nameValue), $model->getAttribute('name'));
    }
}
