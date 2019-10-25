<?php

namespace Tests\Feature;

use auth;
use App\User;
use Faker\Factory;
use Tests\TestCase;
use Faker\ORM\Propel\Populator;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployeeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use WithFaker,RefreshDatabase;
    /*
    * @Employee Registration
    */
    // public function test_admin_can_create_emplyee()
    // {
    //     $this->withoutExceptionHandling();
    //     $this->signIn(); //authentication
    //     $this->get('/employees/create')->assertStatus(200); //see a create form
    //     $attributes=[
    //         'name'          => $this->faker->userName,
    //         'email'         => $this->faker->email,
    //         'password'      => $this->faker->password,
    //         'type'          => $this->faker->randomNumber($nbDigits = NULL, $strict = false) ,
    //         'status'        => $this->faker->randomDigitNotNull
    //     ];

    //     $this->post('/employees/create',$attributes)->assertRedirect('employees');
    //     $this->assertDatabaseHas('users',$attributes);

    // }

    /**
     * Only logged in users can view employee list
     *
     * @test
     */
    public function only_logged_in_users_can_view_employee_list()
    {
        $this->withoutExceptionHandling();

        $this->actingAs(factory(User::class)->create([
            'status' => $this->faker->randomNumber($nbDigits = NULL, $strict = false)
        ]));

        $this->get('/employees')->assertStatus(200);
    }

    /**
     * Guest cannot view employee list
     *
     * @test
     */
    public function guest_cannot_view_employee_list()
    {
        $this->withExceptionHandling();

        $this->get('/appointments')->assertRedirect('/login');
    }

    /**
     * Only logged in users can create employees
     *
     * @test
     */
    // public function only_logged_in_users_can_create_employee()
    // {
    //     $this->withoutExceptionHandling();

    //     $this->actingAs(factory(User::class)->create([
    //         'status' => $this->faker->randomNumber($nbDigits = NULL, $strict = false)
    //     ]));


    //     $this->get('employees/create')->assertStatus(200);

    //     $attributes = [
    //         'name' => $this->faker->text,
    //         'email' => $this->faker->email,
    //         'email_verified_at' => $this->faker->dateTime($max = 'now', $timezone = null),
    //         'remember_token' => $this->faker->text,
    //         'password' => $this->faker->password,
    //         // 'type' => $this->faker->randomDigitNotNull,
    //         'status' => $this->faker->randomDigitNotNull,
    //         'created_at' => $this->faker->dateTime($max = 'now', $timezone = null),
    //         'updated_at' => $this->faker->dateTime($max = 'now', $timezone = null),
    //         'deleted_at' => $this->faker->optional($weight = 0.5, $default = false)->randomDigit,
    //         'profileimage' => $this->faker->optional($weight = 0.5, $default = false)->randomDigit
    //     ];

    //     $generator = \Faker\Factory::create();
    //     $populator = new \Faker\ORM\Propel\Populator($generator);
    //     // $populator->addEntity('Author', 5);
    //     $populator->addEntity('User', 5, array(
    //         'type' => null,
    //         'deleted_at' => null,
    //         'profileimage' => null,
    //     ));




    //     // $this->post('/employees/create', $attributes)->assertRedirect('/employees');

    //     $this->assertDatabaseHas('users', $attributes);
    // }

    /**
     * Guest cannot access create employee url
     *
     * @test
     */
    public function guests_cannot_access_create_employee()
    {
        $this->withExceptionHandling();

        $this->get('/employees/create')->assertRedirect('login');
    }

    /**
     * Only authenticated users can update employee details
     *
     * @test
     */
    public function only_authenticated_users_can_update_employee_details()
    {
        $this->withoutExceptionHandling();

        $this->actingAs(factory(User::class)->create([
            'status' => $this->faker->randomNumber($nbDigits = NULL, $strict = false)
        ]));

        $employees = factory('App\User')->create([
            'id' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
            'status' => $this->faker->randomNumber($nbDigits = NULL, $strict = false)
            ]);

        $this->patch($employees->updatePath(), [
            'name' => "New name"
        ]);

        $this->assertDatabaseHas('users', ['name' => "New name"]);
    }

}
