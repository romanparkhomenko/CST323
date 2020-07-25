@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 all-jobs">
                <div class="content">
                    <h4>Search For Jobs</h4>
                    <form class="search-job-form" action="searchJobs" method="GET">

                        <div class="form-group search-bar">
                            <label for="search">Search</label>
                            <input class="form-control" type="text" id="search" name="search" placeholder="Search keywords, cities, descriptions, etc..">
                        </div>

                        <div class="form-group">
                            <label for="searchBy">Order Search By</label>
                            <select name="searchBy" id="searchBy" class="form-control">
                                <option value="created_at" disabled selected>Search By...</option>
                                <option value="companyname">Company Name</option>
                                <option value="city">city</option>
                                <option value="description">description</option>
                                <option value="salary">Salary</option>
                                <option value="jobtitle">Job Title</option>
                                <option value="city">City</option>
                                <option value="created_at">Posted</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="orderBy">Order By</label>
                            <select name="orderBy" id="orderBy" class="form-control">
                                <option value="asc" disabled selected>Order By...</option>
                                <option value="asc">Ascending</option>
                                <option value="desc">Descending</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div id="job-search-results">
                    @include('jobresults')
                </div>
            </div>

            <div class="col-md-12 all-jobs">
                <div class="content">
                    <h4>My Applications</h4>
                </div>
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <td>Job ID</td>
                        <td>Company Name</td>
                        <td>Job Title</td>
                        <td>Salary</td>
                        <td>Description</td>
                        <td>City</td>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($myJobs)
                        @foreach($myJobs as $job)
                            <tr>
                                <td>{{$job->id}}</td>
                                <td>{{$job->companyname}}</td>
                                <td>{{$job->jobtitle}}</td>
                                <td>{{$job->salary}}</td>
                                <td>{{$job->description}}</td>
                                <td>{{$job->city}}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
