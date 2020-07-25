<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserProfileModuleTest extends TestCase
{
    use DatabaseTransactions;

    public function testProfilePageAppears()
    {
        $user = factory('App\User')->create();

        $response = $this->actingAs($user)->get('/profile/1');

        $response->assertStatus(200);
    }

    public function testUserAndGroupsAppearOnPage()
    {
        $user = factory('App\User')->create();

        $response = $this->actingAs($user)->get('/profile/1');

        $response->assertViewHas('user');
        $response->assertViewHas('userGroups');

        $response->assertStatus(200);
    }
}
