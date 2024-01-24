<?php

namespace Tests\Unit\Model;

use App\Models\Notification;
use Tests\Unit\ModelTestCase;

class NotificationTest extends ModelTestCase
{
    public function testModelConfiguration()
    {
        $this->runConfigurationAssertions(
            new Notification(),
            ['id', 'type', 'notifiable', 'data'],
            [],
            ['*'],
            [],
            ['id' => 'string'],
            ['created_at', 'updated_at'],
            'id',
            'notifications'
        );
    }
}
