<?php

namespace Tests\Feature;

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class LoginLogoutModuleTest extends TestCase
{
    use DatabaseTransactions;

    public function testLoginViewExists()
    {
        $response = $this->get('/login');

        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    public function testHomeViewWhenAuthenticated()
    {
        $user = factory('App\User')->create();

        $response = $this->actingAs($user)->get('/login');

        $response->assertRedirect('/home');
    }

    public function testUserLogin()
    {
        $user = factory('App\User')->create();
        $this->withoutExceptionHandling();
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'test',
        ]);

        $response->assertRedirect('/home');
        $this->assertAuthenticatedAs($user);
    }

    public function testInvalidUserLogin()
    {
        $user = factory('App\User')->create();
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'ohnoooo',
        ]);

        $response->assertSessionHasErrors();

        $this->assertGuest();
    }

    public function testLogoutAnAuthenticatedUser()
    {
        $user = factory('App\User')->create();

        $response = $this->actingAs($user)->post('/logout');

        $response->assertStatus(302);

        $this->assertGuest();
    }
}
