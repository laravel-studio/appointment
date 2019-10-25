<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ServiceTest extends TestCase
{

    use WithFaker,RefreshDatabase;
    /***************Add Service*****************/
    // public function test_user_add_service(){
    //     $this->withoutExceptionHandling();

    //     $attributes=[
    //        'title'          => $this->faker->sentence,
    //        'description'    => $this->faker->paragraph,
    //        'terms'          => $this->faker->paragraph,
    //        'duration'       => $this->faker->randomDigitNotNull
    //     ];

    //     $this->post('services',$attributes)->assertRedirect('services');
    //     $this->assertDatabaseHas('services',$attributes);
    // }
    /***************View Service ****************/
    // public function test_user_can_view_service()
    // {
    //     $this->withoutExceptionHandling();
    //     dd($service= factory('App\Service')->create());
    //     $this->get('services'.$service->id)
    //     ->assertSee($service->title)
    //     ->assertSee($service->description)
    //     ->assertSee($service->terms)
    //     ->assertSee($service->duration);
    // }
     /***************Edit Service ****************/
    // public function test_user_can_update_service()
    // {
    //     $this->withoutExceptionHandling();
    //     $attributes=[
    //        'title'          => $this->faker->sentence,
    //        'description'    => $this->faker->paragraph,
    //        'terms'          => $this->faker->paragraph,
    //        'duration'       => $this->faker->randomDigitNotNull
    //     ];


    //     $this->patch('services/',$attributes)->assertRedirect('services');
    //     $this->assertDatabaseHas('services',$attributes);
    // }


    /**
     * Only auhtenticated users can create services
     * @test
     */
    public function only_authenticated_users_can_create_service()
    {
        // $this->withExceptionHandling();

        $this->actingAs(factory(User::class)->create([
            'status' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
        ]));

        $this->get('/services/create')->assertStatus(200);

        $attributes = [

            'title' => $this->faker->sentence,

            'duration' => $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
            'description' => $this->faker->sentence,
            'terms' => $this->faker->sentence
        ];

        $this->post('/services', $attributes)->assertRedirect('services');

        // $this->assertDatabaseHas('services', $attributes);
    }

    /**
     * Guests cannot view services
     * @test
     */
    public function guests_cannot_view_services()
    {
        $this->withExceptionHandling();

        $this->get('/services')->assertRedirect('/login');
    }

    /**
     * Guests cannot create services
     * @test
     */
    public function guests_cannot_create_services()
    {
        $this->withExceptionHandling();

        $this->get('/services/create')->assertRedirect('/login');
    }

    /**
     * Guests cannot edit services
     * @test
     */
    public function guests_cannot_edit_services()
    {
        $this->withExceptionHandling();

        $service = factory('App\Service')->create();

        $this->get($service->editPath())->assertRedirect('/login');

    }

    /**
     * Guests cannot delete projects
     * @test
     */
    public function guests_cannot_delete_services()
    {
        $this->withExceptionHandling();

        $service = factory('App\Service')->create();

        $this->delete($service->editpath())->assertRedirect('/login');
    }

    /**
     * Only authenticated users can edit services
     * @test
     */
    public function only_authenticated_users_can_edit_services()
    {
        $this->withExceptionHandling();

        $this->actingAs(factory(User::class)->create([
            'status' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
        ]));

        $service = factory('App\Service')->create();


        $this->patch($service->editPath(), [
            "title" => "Test Tilte",
            "duration" => 60,
            "description" => "Test Description",
            "terms" => "Test terms"
        ]);

        $this->assertDatabaseHas("services", [
            "title" => "Test Tilte",
            "duration" => 60,
            "description" => "Test Description",
            "terms" => "Test terms"
            ]);
    }

    /**
     * Only authenticated users can delete services
     * @test
     */
    public function only_authenticated_users_can_delete_services()
    {
        $this->withExceptionHandling();

        $this->actingAs(factory(User::class)->create([
            'status' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
        ]));

        $service = factory('App\Service')->create();

        $this->delete($service->editPath())->assertRedirect('/services');
    }

    /**
     * A service requires a title
     * @test
     */
    public function a_service_requires_title()
    {
        // $this->withExceptionHandling();

        $this->actingAs(factory(User::class)->create([
            'status' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
        ]));

        $attributes = factory('App\Service')->raw(['title' => '']);

        $this->post('/services', $attributes)->assertStatus(302);
    }

    /**
     * A service requires duration
     * @test
     */
    public function a_service_requires_duration()
    {
        // $this->withExceptionHandling();

        $this->actingAs(factory(User::class)->create([
            'status' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
        ]));

        $attributes = factory('App\Service')->raw(['duration' => '']);

        $this->post('/services', $attributes)->assertStatus(302);
    }

    /**
     * A service requires a description
     * @test
     */
    public function a_service_requires_a_description()
    {
        // $this->withExceptionHandling();

        $this->actingAs(factory(User::class)->create([
            'status' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
        ]));

        $attributes = factory('App\Service')->raw(['description' => '']);

        $this->post('/services', $attributes)->assertStatus(302);
    }

    /**
     * A service requires a terms
     * @test
     */
    public function a_service_requires_terms()
    {
        // $this->withExceptionHandling();

        $this->actingAs(factory(User::class)->create([
            'status' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
        ]));

        $attributes = factory('App\Service')->raw(['terms' => '']);

        $this->post('/services', $attributes)->assertStatus(302);
    }
}
