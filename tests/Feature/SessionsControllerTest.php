<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SessionsControllerTest extends TestCase
{
   use RefreshDatabase;

   public function setUp(): void
   {
    parent::setUp();

    $this->artisan('migrate');
   }

   public function testLoginFormDisplayed()
   {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertViewIs('auth.login');
   }

   public function testSuccessfulRegistration()
   {
    $response = $this->post('/register', [
        'name' => 'Test User',
        'username' => 'testuser',
        'email' => 'test@example.com',
        'user_type' => 'coder',
        'password' => 'password',
        'password_confirmation' => 'password',
    ]);

    $response->assertRedirect('/');
    $this->assertAuthenticated();
    $this->assertDatabaseHas('users', [
        'name' => 'Test User',
        'username' => 'testuser',
        'email' => 'test@example.com',
        'user_type' => 'coder',
    ]);
}

public function testFailedLogin()
{
    $user = \App\Models\User::factory()->create([
        'username' => 'test username',
        'email' => 'test@example.com',
        'password' => bcrypt('password'),
    ]);

    $response = $this->post('/login', [
        'username' => 'test username',
        'email' => 'test@example.com',
        'password' => 'wrong-password',
    ]);

    $response->assertStatus(302);
    $response->assertSessionHasErrors('message');
    $this->assertFalse(auth()->check());
}


}
