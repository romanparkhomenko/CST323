
<div class="update-profile-form p-2">
    <h4>Update your Profile</h4>
    <form action="updateProfile" method="POST">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="firstname">First Name</label>
            <input  type="text" class="form-control" id="firstname" placeholder="First Name" value="{{Auth::user()->firstname}}" name="firstname">
        </div>

        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input  type="text" class="form-control" id="lastname" placeholder="Last Name" value="{{Auth::user()->lastname}}" name="lastname">
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input  type="number" class="form-control" id="phone" placeholder="Phone #" value="{{Auth::user()->phone}}" name="phone">
        </div>

        <div class="form-group">
            <label for="about">About</label>
            <input type="text"  class="form-control" id="about" placeholder="About You" value="{{Auth::user()->about}}" name="about"/>
        </div>

        <div class="form-group">
            <label for="jobtitle">Job Title</label>
            <input  type="text" class="form-control" id="jobtitle" placeholder="Job Title" value="{{Auth::user()->jobtitle}}" name="jobtitle">
        </div>

        <div class="form-group">
            <label for="skills">Skills</label>
            <input  type="text" class="form-control" id="skills" placeholder="Skills" value="{{Auth::user()->skills}}" name="skills">
        </div>

        <div class="form-group">
            <label for="jobhistory">Job History</label>
            <input  type="text" class="form-control" id="jobhistory" placeholder="Job History" value="{{Auth::user()->jobhistory}}" name="jobhistory">
        </div>

        <div class="form-group">
            <label for="education">Education</label>
            <input  type="text" class="form-control" id="education" placeholder="Education" value="{{Auth::user()->education}}" name="education">
        </div>

        <div class="form-group">
            <input type="hidden" class="form-control" id="id" placeholder="id" value="{{Auth::user()->id}}" name="id">
        </div>

        <div class="form-group">
            <input type="hidden" class="form-control" id="password" placeholder="password" value="{{Auth::user()->password}}" name="password">
        </div>

        <div class="form-group">
            <input type="hidden" class="form-control" id="username" placeholder="username" value="{{Auth::user()->username}}" name="username">
        </div>

        <div class="form-group">
            <input type="hidden" class="form-control" id="isAdmin" placeholder="isAdmin" value="{{Auth::user()->isAdmin}}" name="isAdmin">
        </div>

        <button type="submit" class="update-profile-button btn btn-dark">Save</button>
    </form>
</div>
