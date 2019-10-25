<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /********************Register page********************/ 
    public function test_it_returns_register_page()
    {
        $response = $this->get(route('register'));
        $response->assertViewIs('auth.register');
    }
    /********************Login page**********************/ 
    public function test_it_returns_login_page()
    {
        $response = $this->get(route('login'));
        $response->assertViewIs('auth.login');
    }
}
