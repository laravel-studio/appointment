# Slot Test
---
 - [Slot Test Data](/{{route}}/{{version}}/slottest/#slot-test-data)

<a name="slot-test-data"></a>
## Slot Test Data

#### Guests cannot view slots
```php
    /** @test */
    public function guests_cannot_view_slots()
    {
        $this->withExceptionHandling();

        $this->get('/slots')->assertRedirect('/login');
    }
```

#### Guests cannot create slots
```php
    /** @test */
    public function guests_cannot_create_slots()
    {
        $this->withExceptionHandling();

        $this->get('slots/create')->assertRedirect('/login');
    }
```

#### Guests cannot edit slots
```php
    /** @test */
    public function guests_cannot_edit_slots()
    {
        $this->withExceptionHandling();

        $slots = factory('App\Slot')->create();

        $this->get($slots->editPath())->assertRedirect('/login');
    }
```
#### A slot requires a service
```php
    /** @test */
    public function a_slot_requires_a_service()
    {
        $this->actingAs(factory(User::class)->create([
            'status' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
        ]));

        $attributes = factory('App\Slot')->raw(['employee_service_id' => '']);

        $this->post('/slots/create', $attributes)->assertSessionHasErrors('employee_service_id');
    }
```

#### A slot requires a day
```php
    /** @test */
    public function a_slot_requires_a_day()
    {
        $this->actingAs(factory(User::class)->create([
            'status' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
        ]));

        $attributes = factory('App\Slot')->raw(['days' => '']);

        $this->post('/slots/create', $attributes)->assertSessionHasErrors('days');
    }
```
