<?php

namespace App\Http\Controllers;

use App\JobPosts;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    public function profile($userId) {
        Log::info("Entering ProfileController.profile()");
        $user = User::find($userId);
        $userGroups = $user->affinityGroups;
        $data = [
            'user' => $user,
            'userGroups' => $userGroups,
        ];

        return view('profile')->with($data);
    }
}
