@extends('frontend.main_master')

@section('content')
<div class="body-content">
    <div class="container">
        <div class="row">
            @include('frontend.common.user_sidebar')
            <div class="col-md-2">

            </div>
            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center"> <span class="text-danger">Change password</span>
                    </h3>
                    <div class="card-body">
                        <form method="POST" action="{{ route('user.password.update') }}">
                            @csrf

                            <div class="form-group">
                                <label class="info-title" for="name">Current Password</label>
                                <input id="current_password" type="password" name="oldpassword" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="email">New Password</label>
                                <input id="password" type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="phone">Confirm Password</label>
                                <input id="password_confirmation" type="password" name="password_confirmation"
                                    class="form-control">
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
