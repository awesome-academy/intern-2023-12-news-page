<?php

namespace Tests\Unit\Model;

use App\Models\Follow;
use Tests\Unit\ModelTestCase;

class FollowTest extends ModelTestCase
{
    public function testModelConfiguration()
    {
        $this->runConfigurationAssertions(
            new Follow(),
            ['*'],
            [],
            [],
            [],
            [],
            ['created_at', 'updated_at'],
            'id',
            'follows'
        );
    }
}
