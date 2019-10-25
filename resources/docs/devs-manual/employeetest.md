# Employee Test
---
 - [Employee Test Data](/{{route}}/{{version}}/employeetest/#employee-test-data)

<a name="employee-test-data"></a>
## Employee Test Data

#### Only logged in users can view employee list
```php
    /** @test */
    public function only_logged_in_users_can_view_employee_list()
    {
        $this->withoutExceptionHandling();

        $this->actingAs(factory(User::class)->create([
            'status' => $this->faker->randomNumber($nbDigits = NULL, $strict = false)
        ]));

        $this->get('/employees')->assertStatus(200);
    }
```

#### Guest cannot view employee list
```php
    /** @test */
    public function guest_cannot_view_employee_list()
    {
        $this->withExceptionHandling();

        $this->get('/appointments')->assertRedirect('/login');
    }
```
#### Guest cannot access create employee url
```php
    /** @test */
    public function guests_cannot_access_create_employee()
    {
        $this->withExceptionHandling();

        $this->get('/employees/create')->assertRedirect('login');
    }
```
#### Only authenticated users can update employee details
```php
    /** @test */
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
```
