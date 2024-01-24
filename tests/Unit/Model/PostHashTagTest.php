<?php

namespace Tests\Unit\Model;

use App\Models\PostHashtag;
use Tests\Unit\ModelTestCase;

class PostHashTagTest extends ModelTestCase
{
    public function testModelConfiguration()
    {
        $this->runConfigurationAssertions(
            new PostHashtag(),
            ['*'],
            [],
            [],
            [],
            [],
            ['created_at', 'updated_at'],
            'id',
            'post_hashtag'
        );
    }
}
