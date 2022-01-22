<?php

namespace Tests\Feature;

use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoleApiControllerTest extends TestCase
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
    
    public function test_that_it_lists_roles()
    {
        Role::factory()->count(3)->create();

        $response = $this->getJson('/api/v1/roles');

        $response->assertStatus(200);

        $response->assertJsonCount(3, 'data');
    }

    public function test__that_show_is_valid()
    {
        $role = Role::factory()->create();

        $response = $this->getJson("/api/v1/roles/{$role->id}");

        $response->assertStatus(200);

        $response->assertJsonPath('id',$role->id);
    }
    
    public function test_that_it_stores_a_role()
    {
        $name = $this->faker->name();
        $response = $this->postJson("/api/v1/roles", ['name' => $name]);

        $response->assertCreated();

        $this->assertDatabaseHas('roles',['name' => $name]);
    }

    public function test_that_it_is_updated()
    {
        $role = Role::factory()->create();

        $name = $this->faker->name();

        $response = $this->putJson("/api/v1/roles/{$role->id}", [ 'name' => $name]);

        $response->assertCreated();

        $this->assertDatabaseHas('roles',['name' => $name]);
    }

    public function test_that_it_is_deleted()
    {
        $role = Role::factory()->create();

        $name = $this->faker->name();

        $response = $this->deleteJson("/api/v1/roles/{$role->id}", [ 'name' => $name]);

        $response->assertSuccessful();

        $this->assertDatabaseMissing('roles',['name' => $name]);
    }

}
