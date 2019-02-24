<?php

namespace Tests\Unit;

use Bouncer;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $user = factory(User::class)->create();

        $this->assertFalse($user->isA('tenant_admin'));

        $user->assign('tenant_admin');

        Bouncer::refreshFor($user);

        $this->assertTrue($user->isA('tenant_admin'));
    }
}
