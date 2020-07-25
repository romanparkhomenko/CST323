<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SecurityTest extends TestCase
{
    use DatabaseTransactions;

    public function testAdminAccessRedirect()
    {
        $response = $this->get('/admin');

        $response->assertRedirect('/login');
        $this->assertGuest();
    }

    public function testUnauthorizedAccessRedirect()
    {
        $response = $this->get('/admin');
        $response->assertRedirect('/login');
        $this->assertGuest();

        $response = $this->get('/myprofile');
        $response->assertRedirect('/login');
        $this->assertGuest();

        $response = $this->get('/profile/1');
        $response->assertRedirect('/login');
        $this->assertGuest();

        $response = $this->get('/groups');
        $response->assertRedirect('/login');
        $this->assertGuest();

        $response = $this->get('/jobs');
        $response->assertRedirect('/login');
        $this->assertGuest();
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
}
