<?php

namespace Tests\Unit\Model;

use App\Models\Role;
use App\Models\User;
use Tests\Unit\ModelTestCase;

class RoleTest extends ModelTestCase
{
    public function testModelConfiguration()
    {
        $this->runConfigurationAssertions(
            new Role(),
            ['*'],
            [],
            ['*'],
            [],
            ['id' => 'int'],
            ['created_at', 'updated_at'],
            'id',
            'roles'
        );
    }

    public function testHasManyUsers()
    {
        $model = new Role();
        $relation = $model->users();

        $this->assertHasManyRelation($relation, $model, new User(), 'role_id', 'id');
    }
}
