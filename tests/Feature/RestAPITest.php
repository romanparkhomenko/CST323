<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RestAPITest extends TestCase
{
    use DatabaseTransactions;

    public function testAPIExists()
    {
        $response = $this->get('/api/documentation');
        $response->assertSuccessful();
    }

    public function testGetUsers()
    {
        $response = $this->get('/api/users');
        $response->assertSuccessful();
    }

    public function testGetJobs()
    {
        $response = $this->get('/api/jobs');
        $response->assertSuccessful();
    }

    public function testGetGroups()
    {
        $response = $this->get('/api/groups');
        $response->assertSuccessful();
    }
}
