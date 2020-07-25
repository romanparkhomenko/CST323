@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row justify-content-start">
                    <div class="col-md-12">
                        <h3>All Groups</h3>
                        <div class="all-user-groups">
                            @if ($allGroups)
                                @foreach ($allGroups as $group)
                                    <div class="user-group">
                                        <h4>{{ $group->groupname }}</h4>
                                        <p>Description: {{ $group->description }}</p>
                                        <p>Skills: {{ $group->skills }}</p>
                                        <p>Education: {{ $group->education }}</p>
                                        <p>City: {{ $group->city }}</p>
                                        <form action="joinGroup" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="group_id" value="{{$group->id}}" id="group_id">
                                            <button type="submit" class="btn btn-primary">JOIN GROUP</button>
                                        </form>
                                        <details>
                                            <summary>Group Members</summary>
                                            <ul>
                                                @foreach($group->users as $user)
                                                    <li>{{$user->firstname}} {{$user->lastname}}</li>
                                                @endforeach
                                            </ul>
                                        </details>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-md-6">
                        <h3>My Groups</h3>
                        <div class="user-groups">
                            @if ($userGroups)
                                @foreach ($userGroups as $group)
                                    <div class="user-group">
                                        <h4>{{ $group->groupname }}</h4>
                                        <p>Description: {{ $group->description }}</p>
                                        <p>Skills: {{ $group->skills }}</p>
                                        <p>Education: {{ $group->education }}</p>
                                        <p>City: {{ $group->city }}</p>
                                        <form action="leaveGroup" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="group_id" value="{{$group->id}}" id="group_id">
                                            <button type="submit" class="btn btn-danger">LEAVE GROUP</button>
                                        </form>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        @include('addGroup')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
