
<div class="update-profile-form p-2">
    <h4>Update {{$activeJob->jobtitle}}</h4>
    <form method="post" action="{{ route("softDeleteJob", $activeJob->id) }}">
        <input type="hidden" name="id" value="{{ $activeJob->id }}">
        <input type="submit" name="submit" value="Soft Delete" class="btn btn-primary">
    </form>

    <form method="post" action="{{ route("hardDeleteJob", $activeJob->id) }}">
        <input type="hidden" name="id" value="{{ $activeJob->id }}">
        <input type="submit" name="submit" value="Hard Delete" class="btn btn-warning">
    </form>

    <form action="{{ route("updateJob") }}" method="POST">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="companyname">Company Name</label>
            <input  type="text" class="form-control" id="companyname" placeholder="Company Name" value="{{$activeJob->companyname}}" name="companyname">
        </div>

        <div class="form-group">
            <label for="jobtitle">Job Title</label>
            <input  type="text" class="form-control" id="jobtitle" placeholder="Job Title" value="{{$activeJob->jobtitle}}" name="jobtitle">
        </div>

        <div class="form-group">
            <label for="salary">Salary</label>
            <input type="number" class="form-control" id="salary" placeholder="Salary" value="{{$activeJob->salary}}" name="salary">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <input type="text"  class="form-control" id="description" placeholder="Job Description" value="{{$activeJob->description}}" name="description"/>
        </div>

        <div class="form-group">
            <label for="city">City</label>
            <input  type="text" class="form-control" id="city" placeholder="City" value="{{$activeJob->city}}" name="city">
        </div>

        <div class="form-group">
            <input type="hidden" class="form-control" id="id" placeholder="id" value="{{$activeJob->id}}" name="id">
        </div>

        <button type="submit" class="update-profile-button btn btn-dark">Save</button>
    </form>
</div>
