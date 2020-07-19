<?php

namespace App\Http\Controllers;

use App\AffinityGroups;
use App\Models\JobModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\UserModel;
use App\Services\Business\SecurityService;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function myprofile()
    {
        $userGroups = Auth::user()->affinityGroups;
        $data = [
            'userGroups' => $userGroups,
        ];
        return view('myprofile')->with($data);
    }

    public function updateProfile(Request $request) {
        $username = $request->input('username');
        $password = $request->input('password');
        $id = $request->input('id');
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $phone = $request->input('phone');
        $about = $request->input('about');
        $jobtitle = $request->input('jobtitle');
        $skills = $request->input('skills');
        $jobhistory = $request->input('jobhistory');
        $education = $request->input('education');
        $isAdmin = $request->input('isAdmin');

        $user = new UserModel($username, $password);
        $user->setId($id);
        $user->setFirstname($firstname);
        $user->setLastname($lastname);
        $user->setPhone($phone);
        $user->setAbout($about);
        $user->setJobtitle($jobtitle);
        $user->setIsAdmin($isAdmin);
        $user->setSkills($skills);
        $user->setJobhistory($jobhistory);
        $user->setEducation($education);

        $service = new SecurityService();
        $status = $service->updateUser($user);

        if ($status){
            $data = [
                'model' => $user,
                'message' => $status
            ];
            return view('home')->with($data);
        } else {
            return view('updateFailed');
        }
    }

    public function addJob(Request $request) {
        $this->validateJobForm($request);

        $companyname = $request->input('companyname');
        $jobtitle = $request->input('jobtitle');
        $salary = $request->input('salary');
        $description = $request->input('description');
        $city = $request->input('city');
        $createdAt = now();

        $job = new JobModels($companyname, $jobtitle);
        $job->setSalary($salary);
        $job->setDescription($description);
        $job->setCity($city);
        $job->setCreatedAt($createdAt);

        $service = new SecurityService();
        $status = $service->addJob($job);

        if ($status){
            $data = [
                'model' => Auth::user(),
                'jobMessage' => $status
            ];
            return view('home')->with($data);
        } else {
            return view('updateFailed');
        }
    }

    private function validateJobForm(Request $request)
    {
        // Setup Data Validation Rules for Login Form
        $rules = ['companyname' => 'Required | Alpha',
            'jobtitle' => 'Required'];

        // Run Data Validation Rules
        $this->validate($request, $rules);
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

        return view('groups');
    }
}
