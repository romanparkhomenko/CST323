
<div class="update-profile-form p-2">
    <h4>Update {{$activeUser->firstname}}</h4>
    <form method="post" action="{{ route("softDeleteUser", $activeUser->id) }}">
        <input type="hidden" name="id" value="{{ $activeUser->id }}">
        <input type="submit" name="submit" value="Soft Delete" class="btn btn-primary">
    </form>

    <form method="post" action="{{ route("hardDeleteUser", $activeUser->id) }}">
        <input type="hidden" name="id" value="{{ $activeUser->id }}">
        <input type="submit" name="submit" value="Hard Delete" class="btn btn-warning">
    </form>

    <form action="updateProfile" method="POST">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="isAdmin">Has Admin Access? <span style="font-weight: bold">[1 or 0]</span></label>
            <input type="text" class="form-control" id="isAdmin" placeholder="isAdmin" value={{$activeUser->isAdmin}} name="isAdmin">
        </div>

        <div class="form-group">
            <label for="firstname">First Name</label>
            <input  type="text" class="form-control" id="firstname" placeholder="First Name" value="{{$activeUser->firstname}}" name="firstname">
        </div>

        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input  type="text" class="form-control" id="lastname" placeholder="Last Name" value="{{$activeUser->lastname}}" name="lastname">
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input  type="number" class="form-control" id="phone" placeholder="Phone #" value="{{$activeUser->phone}}" name="phone">
        </div>

        <div class="form-group">
            <label for="about">About</label>
            <input type="text"  class="form-control" id="about" placeholder="About You" value="{{$activeUser->about}}" name="about"/>
        </div>

        <div class="form-group">
            <label for="jobtitle">Job Title</label>
            <input  type="text" class="form-control" id="jobtitle" placeholder="Job Title" value="{{$activeUser->jobtitle}}" name="jobtitle">
        </div>

        <div class="form-group">
            <input type="hidden" class="form-control" id="id" placeholder="id" value="{{$activeUser->id}}" name="id">
        </div>

        <div class="form-group">
            <input type="hidden" class="form-control" id="password" placeholder="password" value="{{$activeUser->password}}" name="password">
        </div>

        <div class="form-group">
            <input type="hidden" class="form-control" id="username" placeholder="username" value="{{$activeUser->username}}" name="username">
        </div>

        <button type="submit" class="update-profile-button btn btn-dark">Save</button>
    </form>
</div>
