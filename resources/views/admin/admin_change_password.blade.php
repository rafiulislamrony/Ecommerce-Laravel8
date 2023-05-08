@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="container-full">

    <!-- Main content -->
    <section class="content">
        <div class="row justify-content-center">
            <div class="col-xl-8">
                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Admin Change Password</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form method="post" action="{{ route('update.change.password') }}">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Old Password <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input id="current_password" type="password" name="oldpassword" class="form-control" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>New Password <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input id="password" type="password" name="password" class="form-control" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Confirm Password <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <input type="submit" name="file" class="btn btn-rounded btn-primary mb-5" value="Update">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

</section>
<!-- /.content -->
</div>

<style>
    .is-invalid {
    border-color: #dc3545;
    padding-right: calc(1.5em + .75rem);
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='none' stroke='%23dc3545' viewBox='0 0 16 16'%3e%3cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M6 6h4l2 2-2 2H6M6 9v4'%3e%3c/path%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: center right calc(.375em + .1875rem);
    background-size: calc(.75em + .375rem) calc(.75em + .375rem);
}
.invalid-feedback {
    display: block;
    width: 100%;
    margin-top: .25rem;
    font-size: 80%;
    color: #dc3545;
}
</style>

@endsection
