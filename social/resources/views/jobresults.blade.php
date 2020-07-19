
@if ($searchResults ?? '')
<table class="table table-hover table-bordered">
    <thead>
    <tr>
        <td>Job ID</td>
        <td>Company Name</td>
        <td>Job Title</td>
        <td>Salary</td>
        <td>Description</td>
        <td>City</td>
        <td>Apply</td>
    </tr>
    </thead>
    <tbody>
    @foreach($searchResults as $job)
        <tr>
            <td>{{$job->id}}</td>
            <td>{{$job->companyname}}</td>
            <td>{{$job->jobtitle}}</td>
            <td>{{$job->salary}}</td>
            <td>{{$job->description}}</td>
            <td>{{$job->city}}</td>
            <td>
                <form action="apply" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="job_id" value="{{$job->id}}" id="job_id">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}" id="user_id">
                    <button type="submit" class="btn btn-primary">APPLY</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@else
    <p class="text-black-50 mt-1 text-center">No search results. Try searching something above.</p>
@endif
