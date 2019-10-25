# Service Test
---

 - [Service Test Data](/{{route}}/{{version}}/servicetest/#service-test-data)


<a name="service-test-data"></a>
## Service Test Data

#### Only auhtenticated users can create services
```php
    /** @test */
    public function only_authenticated_users_can_create_service()
    {
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
    }
```

#### Guests cannot view services
```php
    /** @test */
    public function guests_cannot_view_services()
    {
        $this->withExceptionHandling();

        $this->get('/services')->assertRedirect('/login');
    }
```

#### Guests cannot create services
```php
    /** @test */
    public function guests_cannot_create_services()
    {
        $this->withExceptionHandling();

        $this->get('/services/create')->assertRedirect('/login');
    }
```
#### Guests cannot edit services
```php
    /** @test */
    public function guests_cannot_edit_services()
    {
        $this->withExceptionHandling();

        $service = factory('App\Service')->create();

        $this->get($service->editPath())->assertRedirect('/login');

    }
```
#### Guests cannot delete projects
```php
    /** @test */
    public function guests_cannot_delete_services()
    {
        $this->withExceptionHandling();

        $service = factory('App\Service')->create();

        $this->delete($service->editpath())->assertRedirect('/login');
    }
```

#### Only authenticated users can edit services
```php
    /** @test */
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
```

#### Only authenticated users can delete services
```php
    /** @test */
    public function only_authenticated_users_can_delete_services()
    {
        $this->withExceptionHandling();
        $this->actingAs(factory(User::class)->create([
            'status' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
        ]));
        $service = factory('App\Service')->create();

        $this->delete($service->editPath())->assertRedirect('/services');
    }
```

#### A service requires a title
```php
    /** @test */
    public function a_service_requires_title()
    {
        $this->actingAs(factory(User::class)->create([
            'status' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
        ]));

        $attributes = factory('App\Service')->raw(['title' => '']);

        $this->post('/services', $attributes)->assertStatus(302);
    }
```
#### A service requires duration
```php
    /** @test */
    public function a_service_requires_duration()
    {
        $this->actingAs(factory(User::class)->create([
            'status' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
        ]));

        $attributes = factory('App\Service')->raw(['duration' => '']);

        $this->post('/services', $attributes)->assertStatus(302);
    }
```

#### A service requires a description
```php
    /** @test */
    public function a_service_requires_a_description()
    {
        $this->actingAs(factory(User::class)->create([
            'status' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
        ]));

        $attributes = factory('App\Service')->raw(['description' => '']);

        $this->post('/services', $attributes)->assertStatus(302);
    }
```
#### A service requires a term
```php
    /** @test */
    public function a_service_requires_terms()
    {
        $this->actingAs(factory(User::class)->create([
            'status' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
        ]));

        $attributes = factory('App\Service')->raw(['terms' => '']);

        $this->post('/services', $attributes)->assertStatus(302);
    }
```
