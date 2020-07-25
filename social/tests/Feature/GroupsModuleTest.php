<?php

namespace Tests\Feature;

use App\AffinityGroups;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GroupsModuleTest extends TestCase
{
    use DatabaseTransactions;

    public function testGroupsPageAppears()
    {
        $user = factory('App\User')->create();

        $response = $this->actingAs($user)->get('/groups');

        $response->assertStatus(200);
    }

    public function testGroupsAppearOnPage()
    {
        $user = factory('App\User')->create();

        $response = $this->actingAs($user)->get('/groups');

        $response->assertViewHas('allGroups');
        $response->assertViewHas('userGroups');

        $response->assertStatus(200);
    }

    public function testUserJoinGroupOnPage()
    {
        $user = factory('App\User')->create();

        $response = $this->actingAs($user)->post('/joinGroup', [
            'group_id' => 10,
        ]);

        $response->assertStatus(200);

        $response->assertViewHas('allGroups');
        $response->assertViewHas('userGroups');
    }

    public function testUserLeaveGroupOnPage()
    {
        $user = factory('App\User')->create();
        $group = factory('App\AffinityGroups')->create();

        $response = $this->actingAs($user)->post('/joinGroup', [
            'group_id' => 99,
        ]);

        $groupObj = AffinityGroups::find(99);

        $response->assertStatus(200);
        $response->assertViewHas('allGroups');
        $response->assertViewHas('userGroups');
        $this->assertEquals($groupObj['original'], $response['userGroups'][0]['original']);

        $response = $this->actingAs($user)->post('/leaveGroup', [
            'group_id' => 99,
        ]);

        $response->assertStatus(200);
        $response->assertViewHas('allGroups');
        $response->assertViewHas('userGroups');
    }
}
