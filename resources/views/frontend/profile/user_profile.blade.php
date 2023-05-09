@extends('frontend.main_master')

@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <br>
                <img class="card-img-top"
                    src="{{ (!empty($user->profile_photo_path)) ? url('upload/user_images/'.$user->profile_photo_path):url('upload/no_image.jpg') }}"
                    alt="" style="border-radius: 50%; height: 100%; width: 100%;">
                <br>
                <br>
                <ul class="list-group list-group-flush">
                    <a class="btn btn-primary btn-sm btn-block" href="{{ route('dashboard') }}">Home</a>
                    <a class="btn btn-primary btn-sm btn-block" href="{{ route('user.profile') }}">Profile Update</a>
                    <a class="btn btn-primary btn-sm btn-block" href="">Change Password</a>
                    <a class="btn btn-danger btn-sm btn-block" href="{{ route('user.logout') }}">Logout</a>
                </ul>

            </div>
            <div class="col-md-2">

            </div>
            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center"> <span class="text-danger">Hi....</span>
                    <strong>{{ Auth::user()->name }}</strong> Update Your Profile
                    </h3>
                    <div class="card-body">
                        <form method="POST" action="{{ route('user.profile.store') }}" enctype="multipart/form-data" >
                            @csrf

                            <div class="form-group">
                                <label class="info-title" for="name">Name</label>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="email">Email</label>
                                <input type="email" name="email" value="{{ $user->email }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="phone">Phone</label>
                                <input type="text" name="phone" value="{{ $user->phone }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="profile">User Image</label>
                                <input type="file" name="profile_photo_path"  class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">Update</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
