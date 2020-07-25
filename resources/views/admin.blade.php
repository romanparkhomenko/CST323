@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h3>Admin Dashboard</h3>
            <div class="content">
                <h4>Manage Users</h4>
            </div>

            <div class="row justify-content-start">
                <div class="col-md-12">
                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <td>User ID</td>
                            <td>First Name</td>
                            <td>Last Name</td>
                            <td>Username</td>
                            <td>Email</td>
                            <td>Phone</td>
                            <td>Job Title</td>
                            <td>Is Admin?</td>
                            <td>Edit</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->firstname}}</td>
                                <td>{{$user->lastname}}</td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->jobtitle}}</td>
                                <td>{{$user->isAdmin == 1 ? 'Yes' : 'No'}}</td>
                                <td>
                                    <a href="{{ route('editUser', $user->id) }}" class="btn btn-xs btn-info pull-right">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    </div>

        <div class="col-md-12">
            <div class="content">
                <h4>Manage Jobs</h4>
            </div>
        <div class="row justify-content-start">
            <div class="col-md-12">
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <td>Job ID</td>
                        <td>Company Name</td>
                        <td>Job Title</td>
                        <td>Salary</td>
                        <td>Description</td>
                        <td>City</td>
                        <td>Applicants</td>
                        <td>Edit</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($jobs as $job)
                        <tr>
                            <td>{{$job->id}}</td>
                            <td>{{$job->companyname}}</td>
                            <td>{{$job->jobtitle}}</td>
                            <td>{{$job->salary}}</td>
                            <td width="20%">{{$job->description}}</td>
                            <td>{{$job->city}}</td>
                            <td width="20%">
                                <details>
                                    <summary>Applicants</summary>
                                    @if ($job->users)
                                    @foreach($job->users as $user)
                                        <p><a href="{{ route("profile", $user->id) }}">{{$user->firstname}} {{$user->lastname}}</a></p>
                                    @endforeach
                                    @endif
                                </details>
                            </td>
                            <td>
                                <a href="{{ route("editJob", $job->id) }}" class="btn btn-xs btn-info pull-right">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            @if ($activeUser ?? '')
                <div class="col-md-6">
                    <h4>Edit User</h4>
                    @include('updateAdmin')
                </div>
            @endif

            @if ($activeJob ?? '')
                <div class="col-md-6">
                    <h4>Edit Job</h4>
                    @include('updateJob')
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
