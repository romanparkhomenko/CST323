<?php

namespace App\Http\Controllers;

use App\JobPosts;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $jobs = JobPosts::all();
        $data = [
            'users' => $users,
            'jobs' => $jobs
        ];
        return view('admin')->with($data);
    }

    public function editUser($userId) {

        $users = User::all();
        $activeUser = User::find($userId);
        $jobs = JobPosts::all();

        $data = [
            'users' => $users,
            'activeUser' => $activeUser,
            'jobs' => $jobs
        ];
        return view('admin')->with($data);
    }

    public function editJob($jobId) {

        $users = User::all();
        $activeJob = JobPosts::find($jobId);
        $jobs = JobPosts::all();

        $data = [
            'users' => $users,
            'activeJob' => $activeJob,
            'jobs' => $jobs
        ];
        return view('admin')->with($data);
    }

    public function hardDelete(Request $request)
    {
        $id = $request->input('id');
        User::destroy($id);

        $users = User::all();
        $jobs = JobPosts::all();
        $data = [
            'users' => $users,
            'jobs' => $jobs
        ];

        return view('admin')->with($data);
    }

    public function softDelete(Request $request)
    {
        $id = $request->input('id');
        User::find($id)
            ->update(['deleted_at' => now()]);

        $users = User::all();
        $jobs = JobPosts::all();
        $data = [
            'users' => $users,
            'jobs' => $jobs
        ];
        return view('admin')->with($data);
    }

    public function hardDeleteJob(Request $request)
    {
        $id = $request->input('id');
        JobPosts::destroy($id);

        $users = User::all();
        $jobs = JobPosts::all();
        $data = [
            'users' => $users,
            'jobs' => $jobs
        ];

        return view('admin')->with($data);
    }

    public function softDeleteJob(Request $request)
    {
        $id = $request->input('id');
        JobPosts::find($id)
            ->update(['deleted_at' => now()]);

        $users = User::all();
        $jobs = JobPosts::all();
        $data = [
            'users' => $users,
            'jobs' => $jobs
        ];
        return view('admin')->with($data);
    }
}
