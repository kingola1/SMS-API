<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class AdminApiControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_that_it_lists_admin_for_admin_users()
    {
        Admin::factory()->count(3)->create();
        $user = (Admin::factory()->create())->user;
        echo $user->isAdmin();
        Sanctum::actingAs($user, ['*']);

        $response = $this->getJson('/api/v1/admins');

        $response->assertStatus(200);
        $response->dump();
    }
}
