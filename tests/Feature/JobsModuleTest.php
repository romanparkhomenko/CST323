<?php

namespace Tests\Feature;

use App\AffinityGroups;
use App\JobPosts;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class JobsModuleTest extends TestCase
{
    use DatabaseTransactions;

    public function testJobsPageAppears()
    {
        $user = factory('App\User')->create();

        $response = $this->actingAs($user)->get('/jobs');

        $response->assertStatus(200);
    }

    public function testJobsAppearOnPage()
    {
        $user = factory('App\User')->create();

        $response = $this->actingAs($user)->get('/jobs');

        $response->assertViewHas('jobs');
        $response->assertViewHas('myJobs');

        $response->assertStatus(200);
    }

    public function testUserApplyToJob()
    {
        $user = factory('App\User')->create();
        $job = factory('App\JobPosts')->create();

        $response = $this->actingAs($user)->post('/apply', [
            'user_id' => 99,
            'job_id' => 99,
        ]);

        $response->assertStatus(200);
        $response->assertViewHas('jobs');
        $response->assertViewHas('myJobs');
    }

    public function testJobSearch()
    {
        $user = factory('App\User')->create();
        $job = factory('App\JobPosts')->create();

        $response = $this->actingAs($user)->post('/searchJobs', [
            'search' => 'Cupertino',
        ]);

        $jobsObj = JobPosts::find(99);

        $response->assertStatus(200);
    }
}
