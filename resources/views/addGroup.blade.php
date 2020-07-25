
<div class="add-job-form p-2">
    <h4>Create a new Affinity Group</h4>
    <form action="createGroup" method="POST">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="groupname">Company Name</label>
            <input  type="text" class="form-control" id="groupname" placeholder="Group Name" name="groupname">
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
            <label for="skills">Skills</label>
            <input  type="text" class="form-control" id="skills" placeholder="Skills" name="skills">
        </div>

        <div class="form-group">
            <label for="education">Education</label>
            <input  type="text" class="form-control" id="education" placeholder="Education" name="education">
        </div>

        <button type="submit" class="update-profile-button btn btn-dark">Create Group</button>
    </form>
</div>
