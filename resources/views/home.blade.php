@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h3>Dashboard</h3>
            <div class="content">
                <p>Welcome {{ Auth::user()->firstname . ' ' . Auth::user()->lastname }}!</p>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row justify-content-start">
                <div class="col-md-6">
                    @include('updateProfile')
                </div>
                <div class="col-md-6">
                    @if (Auth::user() && Auth::user()->isAdmin == 1)
                        @include('addJob')
                    @endif
                </div>

                @if ($message ?? '' == 1)
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="alert alert-success" role="alert">
                                    <p>Successfully updated profile info.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($jobMessage ?? '' == 1)
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="alert alert-success" role="alert">
                                    <p>Successfully posted job.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
