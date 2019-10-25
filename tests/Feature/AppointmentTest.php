<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AppointmentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use WithFaker;

    // public function test_user_can_bookappointment(){
    //     $this->withoutExceptionHandling();
    //     $attributes=[
    //        'customer_id'                => $this->faker->randomDigitNotNull,
    //        'slot_id'                    => $this->faker->randomDigitNotNull,
    //        'booking_date'               => $this->faker->date($format = 'Y-m-d', $max = 'now'),
    //        'start_time'                 => $this->faker->time($format = 'H:i:s', $max = 'now'),
    //        'end_time'                   => $this->faker->time($format = 'H:i:s', $max = 'now'),
    //        'status'                     => $this->faker->randomDigitNotNull,
    //        'booked_by'                  => $this->faker->randomDigitNotNull
    //     ];
    //     $this->post('/appointments/book',$attributes)->assertRedirect('appointments');
    //     $this->assertDatabaseHas('appointments',$attributes);
    // }

    /**
     * Guests cannot view the appointments list
     *
     * @test
     */
    public function guests_cannot_view_appointments_list()
    {
        $this->withExceptionHandling();

        $this->get('/appointments')->assertRedirect('/login');
    }

    /**
     * Authenticated Users can view the appointments list
     *
     * @test
     */
    public function authenticated_users_can_view_appointment_lists()
    {
        $this->withoutExceptionHandling();

        $this->actingAs(factory(User::class)->create([
            'status' => $this->faker->randomNumber($nbDigits = NULL, $strict = false)
        ]));

        $this->get('/appointments')->assertStatus(200);
    }

    /**
     * Only authenticated users can book appointments
     *
     * @test
     */
    public function only_authenticated_users_can_book_appointments()
    {
        $this->withoutExceptionHandling();

        $this->actingAs(factory(User::class)->create([
            'status' => $this->faker->randomNumber($nbDigits = NULL, $strict = false)
        ]));

        $this->get('/appointments/book')->assertStatus(200);

        $attributes = [
            'customer_id' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
            'slot_id' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
            'booking_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'start_time' => $this->faker->time($format = 'H:i:s', $max = 'now'),
            'end_time' => $this->faker->time($format = 'H:i:s', $max = 'now'),
            'status' => $this->faker->randomDigit,
            'booked_by' => $this->faker->randomNumber($nbDigits = NULL, $strict = false)
        ];

        // $this->post('/appointments/book', $attributes)->assertRedirect('/appointments');
        // $this->assertDatabaseHas('appointments', $attributes);
    }

    /**
     * Only authenticated users can view booking history of all users
     *
     * @test
     */
    public function only_authenticated_users_can_view_booking_history()
    {
        $this->withoutExceptionHandling();

        $this->actingAs(factory(User::class)->create([
            'status' => $this->faker->randomNumber($nbDigits = NULL, $strict = false)
        ]));

        $this->get('/appointments/booking-history')->assertStatus(200);
    }

    /**
     * Only authenticated users can view booking reports
     *
     * @test
     */
    public function only_authenticated_users_can_view_booking_reports()
    {
        $this->withoutExceptionHandling();

        $this->actingAs(factory(User::class)->create([
            'status' => $this->faker->randomNumber($nbDigits = NULL, $strict = false)
        ]));

        $this->get('/appointments/booking-reports')->assertStatus(200);
    }
}
