<?php

namespace Tests\Feature;

use App\User;
use App\Slot;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SlotsTest extends TestCase
{
     use WithFaker,RefreshDatabase;

    //  public function test_user_can_create_slots(){

    //     $this->withoutExceptionHandling();
    //      $this->signIn(); //authentication
    //     $this->post('slots/create')->assertStatus(200); //see a create form
    //     $attributes=[
    //         'service'          => $this->faker->word,
    //         'days'         => $this->faker->word,
    //         'starttime'      => $this->faker->time($format = 'H:i:s', $max = 'now'),
    //         'endtime'           => $this->faker->time($format = 'H:i:s', $max = 'now'),
    //     ];
    //     $this->post('slots/create',$attributes)->assertRedirect('slots');
    //     $this->assertDatabaseHas('slots',$attributes);
    //  }

    /**
     * Only authenticated users can create slots
     * @test
     */
    // public function only_authenticated_users_can_create_slots()
    // {
    //     // $this->withoutExceptionHandling();

    //     $this->actingAs(factory(User::class)->create([
    //         'status' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
    //     ]));

    //     $this->get('/slots/create')->assertStatus(200);

    //     $attributes = [
    //         "employee_service_id" => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
    //         "days" => $this->faker->word,
    //         "start_time" => $this->faker->time($format = 'H:i:s', $max = 'now'),
    //         "end_time" => $this->faker->time($format = 'H:i:s', $max = 'now')
    //     ];

    //     $this->post('/slots/store', $attributes)->assertRedirect('slots');
    //     $this->assertDatabaseHas('slots', $attributes);
    // }

    /**
     * Guests cannot view slots
     * @test
     */
    public function guests_cannot_view_slots()
    {
        $this->withExceptionHandling();

        $this->get('/slots')->assertRedirect('/login');
    }

    /**
     * Guests cannot create slots
     * @test
     */
    public function guests_cannot_create_slots()
    {
        $this->withExceptionHandling();

        $this->get('slots/create')->assertRedirect('/login');
    }

    /**
     * Guests cannot edit slots
     * @test
     */
    public function guests_cannot_edit_slots()
    {
        $this->withExceptionHandling();

        $slots = factory('App\Slot')->create();

        $this->get($slots->editPath())->assertRedirect('/login');
    }

    /**
     * Only authenticated users can update slot details
     * @test
     */
    // public function only_authenticated_users_can_update_slots()
    // {
    //     $this->withExceptionHandling();

    //     $this->actingAs(factory(User::class)->create([
    //         'status' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
    //     ]));

    //     $slots = factory('App\Slot')->create();

    //     $this->patch($slots->updatePath(), [
    //         "days" => "Monday",
    //     ]);

    //     $this->assertDatabaseHas("slots", [
    //         "days" => "Monday",
    //         ]);
    // }

    /**
     * A slot requires a service
     * @test
     */
    public function a_slot_requires_a_service()
    {
        $this->actingAs(factory(User::class)->create([
            'status' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
        ]));

        $attributes = factory('App\Slot')->raw(['employee_service_id' => '']);

        $this->post('/slots/create', $attributes)->assertSessionHasErrors('employee_service_id');
    }

    /**
     * A slot requires a day
     * @test
     */
    public function a_slot_requires_a_day()
    {
        $this->actingAs(factory(User::class)->create([
            'status' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
        ]));

        $attributes = factory('App\Slot')->raw(['days' => '']);

        $this->post('/slots/create', $attributes)->assertSessionHasErrors('days');
    }
}
