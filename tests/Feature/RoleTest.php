<?php

namespace Tests\Feature;

use App\User;
use App\Role;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoleTest extends TestCase
{

    use WithFaker,RefreshDatabase;

    // public function test_admin_can_add_role(){
    //     $this->withoutExceptionHandling();
    //     // $this->signIn(); //authentication
    //     $this->post('roles/store')->assertStatus(200); //see a create form
    //     $attributes=[
    //         'name'          => $this->faker->word,
    //         'display_name'         => $this->faker->word,
    //         'description'      => $this->faker->word,
    //     ];
    //     $this->post('roles/store',$attributes)->assertRedirect('roles');
    //     $this->assertDatabaseHas('roles',$attributes);
    // }

    /**
     * authenticated can create roles
     * @test
     */
    public function only_admin_can_create_roles()
    {
        $this->withExceptionHandling();
        // $this->signIn(); //authentication

        $this->actingAs(factory(User::class)->create([
            'status' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
        ]));

        $this->get('/roles/create')->assertStatus(200); //see a create form
        $attributes = [
            'name'          => $this->faker->word,
            'display_name'  => $this->faker->word,
            'description'   => $this->faker->word,
        ];

        // $this->post('/roles/store', $attributes)->assertRedirect('/roles');
        $this->post('/roles/store', $attributes);

        $this->assertDatabaseHas('roles', $attributes);
    }

    /**
     * A role requires a name
     * @test
     */
    // public function a_role_requires_name()
    // {
    //     // $this->signIn();

    //     $this->actingAs(factory(User::class)->create([
    //         'status' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
    //     ]));

    //     $attributes = factory('App\Role')->raw(['name' => '']);

    //     $this->post('/roles/store', $attributes)->assertStatus(422);
    // }

    /**
     * authenticated user can only update roles
     * @test
     */
    public function authenticated_users_can_update_roles()
    {
        $this->withExceptionHandling();

        $this->actingAs(factory(User::class)->create([
            'status' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
        ]));

        $role = factory('App\Role')->create();

        $this->patch($role->updatePath(), [
            "name" => "rolename"
        ]);

        $this->assertDatabaseHas("roles", ["name" => "rolename"]);
    }
}
