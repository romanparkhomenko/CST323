<?php

namespace App\Http\Controllers;

use App\AffinityGroups;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupsController extends Controller
{
    public function index() {
        $user = User::find(Auth::user()->id);
        $userGroups = $user->affinityGroups;

        $allGroups = AffinityGroups::all();

        $data = [
            'userGroups' => $userGroups,
            'allGroups' => $allGroups
        ];
        return view('groups')->with($data);
    }

    public function joinGroup(Request $request) {
        $groupID = $request->input('group_id');
        $user = User::find(Auth::user()->id);

        $affinityGroup = AffinityGroups::find($groupID);
        $user->affinityGroups()->attach($affinityGroup);

        $allGroups = AffinityGroups::all();
        $userGroups = $user->affinityGroups;

        $data = [
            'userGroups' => $userGroups,
            'allGroups' => $allGroups
        ];
        return view('groups')->with($data);
    }

    public function leaveGroup(Request $request) {
        $groupID = $request->input('group_id');
        $user = User::find(Auth::user()->id);
        $affinityGroup = AffinityGroups::find($groupID);

        $user->affinityGroups()->detach($affinityGroup);

        $allGroups = AffinityGroups::all();
        $userGroups = $user->affinityGroups;

        $data = [
            'userGroups' => $userGroups,
            'allGroups' => $allGroups
        ];
        return view('groups')->with($data);
    }

    public function createGroup(Request $request) {
        $affinityGroup = new AffinityGroups;
        $affinityGroup->groupname = $request->input('groupname');
        $affinityGroup->city = $request->input('city');
        $affinityGroup->description = $request->input('description');
        $affinityGroup->skills = $request->input('skills');
        $affinityGroup->education = $request->input('education');

        $affinityGroup->save();

        $user = User::find(Auth::user()->id);

        $affinityGroup->users()->attach($user);

        return view('home');
    }
}
