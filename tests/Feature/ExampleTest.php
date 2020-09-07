<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;


    /** @test */
    function user_can_be_created()
    {
        $user = factory('App\User')->create();

        $this->post(route('auth.register'), $user->toArray());

        $this->assertDatabaseHas('users', $user->toArray());
    }
}
