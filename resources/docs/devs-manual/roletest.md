# Role Test
---
 - [Role Test Data](/{{route}}/{{version}}/roletest/#role-test-data)

<a name="role-test-data"></a>
## Role Test Data

#### Authenticated can create roles
```php
    /** @test */
    public function only_admin_can_create_roles()
    {
        $this->withExceptionHandling();

        $this->actingAs(factory(User::class)->create([
            'status' => $this->faker->randomNumber($nbDigits = NULL, $strict = false),
        ]));

        $this->get('/roles/create')->assertStatus(200); //see a create form
        $attributes = [
            'name'          => $this->faker->word,
            'display_name'  => $this->faker->word,
            'description'   => $this->faker->word,
        ];
        $this->post('/roles/store', $attributes);
        $this->assertDatabaseHas('roles', $attributes);
    }
```

#### Authenticated user can only update roles
```php
    /** @test */
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
```
