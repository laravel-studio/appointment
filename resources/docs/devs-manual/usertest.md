# User Test
---
 - [User Test Data](/{{route}}/{{version}}/usertest/#user-test-data)

<a name="user-test-data"></a>
## User Test Data

#### Registration Page
```php
    public function test_it_returns_register_page()
    {
        $response = $this->get(route('register'));
        $response->assertViewIs('auth.register');
    }
```
#### Login Page
```php
    public function test_it_returns_login_page()
    {
        $response = $this->get(route('login'));
        $response->assertViewIs('auth.login');
    }
```
