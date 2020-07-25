<?php

namespace Tests\Feature;

use App\AffinityGroups;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminModuleTest extends TestCase
{
    use DatabaseTransactions;

    public function testAdminPageAppears()
    {
        $user = factory('App\User')->create();
        $job = factory('App\JobPosts')->create();

        $response = $this->actingAs($user)->get('/admin');

        $response->assertStatus(200);
    }

    public function testUsersAppearOnPage()
    {
        $user = factory('App\User')->create();
        $job = factory('App\JobPosts')->create();

        $response = $this->actingAs($user)->get('/admin');

        $response->assertViewHas('users');
        $response->assertViewHas('jobs');

        $response->assertStatus(200);
    }

    public function testJobsAppearOnPage()
    {
        $user = factory('App\User')->create();
        $job = factory('App\JobPosts')->create();

        $response = $this->actingAs($user)->get('/admin');

        $response->assertViewHas('users');
        $response->assertViewHas('jobs');

        $response->assertStatus(200);
    }

    public function testEditJobAppearOnPage()
    {
        $user = factory('App\User')->create();
        $job = factory('App\JobPosts')->create();

        $response = $this->actingAs($user)->get('/admin/jobs/1');

        $response->assertViewHas('users');
        $response->assertViewHas('jobs');

        $response->assertStatus(200);
    }

    public function testEditUserAppearOnPage()
    {
        $user = factory('App\User')->create();
        $job = factory('App\JobPosts')->create();

        $response = $this->actingAs($user)->get('/admin/1');

        $response->assertViewHas('users');
        $response->assertViewHas('jobs');

        $response->assertStatus(200);
    }
}
