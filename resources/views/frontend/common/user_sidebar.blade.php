@php
    $id = Auth::user()->id;
    $user = App\Models\User::find($id);
@endphp


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
            <a class="btn btn-primary btn-sm btn-block" href="{{ route('change.password') }}">Change Password</a>
            <a class="btn btn-primary btn-sm btn-block" href="{{ route('my.orders') }}">Orders</a>
            <a class="btn btn-danger btn-sm btn-block" href="{{ route('user.logout') }}">Logout</a>
        </ul>
</div>
