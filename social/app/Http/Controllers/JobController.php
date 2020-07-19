<?php

namespace App\Http\Controllers;

use App\JobPosts;
use App\Models\JobModels;
use App\Services\Business\SecurityService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function index() {
        $jobs = JobPosts::all();
        $myJobs = Auth::user()->jobPosts;

        $data = [
            'jobs' => $jobs,
            'myJobs' => $myJobs
        ];

        return view('jobs')->with($data);
    }

    public function searchJobs(Request $request) {
        $jobs = JobPosts::all();
        if ($request->ajax() && $request->search != null) {
            $searchResults = JobPosts::where('companyname', 'like', '%'. $request->search . '%')
                ->orWhere('description', 'like', '%'. $request->search . '%')
                ->orWhere('city', 'like', '%'. $request->search . '%')
                ->orWhere('salary', 'like', '%'. $request->search . '%')
                ->orWhere('jobtitle', 'like', '%'. $request->search . '%')
                ->orderBy($request->searchBy, $request->searchByOrder)
                ->get();

            $html = view()->make('jobresults', compact('searchResults'))->render();

            return response()->json(array('html'=> $html), 200);
        }

        return null;
    }

    public function apply(Request $request) {
        $userID = $request->input('user_id');
        $jobID = $request->input('job_id');
        $user = User::find($userID);

        $jobPost = JobPosts::find($jobID);
        $user->jobPosts()->attach($jobPost);

        $jobs = JobPosts::all();
        $myJobs = $user->jobPosts;

        $data = [
            'jobs' => $jobs,
            'myJobs' => $myJobs
        ];

        return view('jobs')->with($data);
    }

    public function updateJob(Request $request) {
        $id = $request->input('id');
        $companyname = $request->input('companyname');
        $jobtitle = $request->input('jobtitle');
        $salary = $request->input('salary');
        $description = $request->input('description');
        $city = $request->input('city');
        $updatedAt = now();

        $job = new JobModels($companyname, $jobtitle);
        $job->setId($id);
        $job->setSalary($salary);
        $job->setDescription($description);
        $job->setCity($city);
        $job->setUpdatedAt($updatedAt);

        $service = new SecurityService();
        $status = $service->updateJob($job);

        $users = User::all();
        $jobs = JobPosts::all();

        if ($status){
            $data = [
                'users' => $users,
                'jobs' => $jobs
            ];
            return view('admin')->with($data);
        } else {
            return view('updateFailed');
        }
    }
}
