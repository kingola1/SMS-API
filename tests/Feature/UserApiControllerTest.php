<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserApiControllerTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_that_it_lists_users()
    {
        User::factory()->count(3)->create();

        $response = $this->getJson('/api/v1/users');

        //$response->assertStatus(200);

        $response->assertJsonCount(3);
    }

}
