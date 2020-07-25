
<div class="add-job-form p-2">
    <h4>Post a job</h4>
    <form action="addNewJob" method="POST">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="companyname">Company Name</label>
            <input  type="text" class="form-control" id="companyname" placeholder="Company Name" name="companyname">
        </div>

        <div class="form-group">
            <label for="jobtitle">Job Title</label>
            <input  type="text" class="form-control" id="jobtitle" placeholder="Job Title" name="jobtitle">
        </div>

        <div class="form-group">
            <label for="salary">Salary</label>
            <input type="number" class="form-control" id="salary" placeholder="Salary" name="salary">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <input type="text"  class="form-control" id="description" placeholder="Job Description" name="description"/>
        </div>

        <div class="form-group">
            <label for="city">City</label>
            <input  type="text" class="form-control" id="city" placeholder="City" name="city">
        </div>

        <div class="form-group">
            <input type="hidden" class="form-control" id="id" placeholder="id" name="id">
        </div>

        <button type="submit" class="update-profile-button btn btn-dark">Save</button>
    </form>
</div>
