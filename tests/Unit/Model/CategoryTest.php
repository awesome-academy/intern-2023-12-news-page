<?php

namespace Tests\Unit\Model;

use App\Models\Category;
use App\Models\Post;
use Tests\Unit\ModelTestCase;

class CategoryTest extends ModelTestCase
{
    public function testModelConfiguration()
    {
        $this->runConfigurationAssertions(
            new Category(),
            ['*'],
            [],
            ['*'],
            [],
            ['id' => 'int'],
            ['created_at', 'updated_at'],
            'id',
            'categories'
        );
    }

    public function testPostsRelation()
    {
        $model = new Category();
        $relation = $model->posts();

        $this->assertHasManyRelation($relation, $model, new Post());
    }
}
