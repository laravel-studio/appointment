# Appointment Test
---
 - [Appointment Test Data](/{{route}}/{{version}}/appointmenttest/#appointment-test-data)

<a name="test-data"></a>
## Appointment Test Data

#### Guests cannot view the appointments list
```php
    /** @test */
    public function guests_cannot_view_appointments_list()
    {
        $this->withExceptionHandling();

        $this->get('/appointments')->assertRedirect('/login');
    }
```
#### Authenticated Users can view the appointments list
```php
    /** @test */
    public function authenticated_users_can_view_appointment_lists()
    {
        $this->withoutExceptionHandling();

        $this->actingAs(factory(User::class)->create([
            'status' => $this->faker->randomNumber($nbDigits = NULL, $strict = false)
        ]));

        $this->get('/appointments')->assertStatus(200);
    }
```
#### Only authenticated users can book appointments
```php
    /** @test */
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
    }
```
#### Only authenticated users can view booking history of all users
```php
    /** @test */
    public function only_authenticated_users_can_view_booking_history()
    {
        $this->withoutExceptionHandling();

        $this->actingAs(factory(User::class)->create([
            'status' => $this->faker->randomNumber($nbDigits = NULL, $strict = false)
        ]));

        $this->get('/appointments/booking-history')->assertStatus(200);
    }
```

#### Only authenticated users can view booking reports
```php
    /** @test */
    public function only_authenticated_users_can_view_booking_reports()
    {
        $this->withoutExceptionHandling();

        $this->actingAs(factory(User::class)->create([
            'status' => $this->faker->randomNumber($nbDigits = NULL, $strict = false)
        ]));

        $this->get('/appointments/booking-reports')->assertStatus(200);
    }
```
