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
                        <h4 class="box-title">Admin Profile Edit</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form method="post" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Admin User Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name" class="form-control"
                                                value="{{ $editData->name }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Admin Email <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="email" name="email" class="form-control"
                                                value="{{ $editData->email }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Admin Profie Image</h5>
                                        <div class="controls">
                                            <input type="file" name="profile_photo_path" class="form-control" id="image">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <img class="rounded-circle" id="showImage"
                                        src="{{ (!empty($editData->profile_photo_path)) ? url('upload/admin_images/'.$editData->profile_photo_path):url('upload/no_image.jpg') }}"
                                        alt="User Avatar" style="width: 100px; height:100px; object-fit: cover;">
                                </div>

                            </div>

                            <input type="submit" name="file" class="btn btn-rounded btn-primary mb-5" value="Submit">

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


<script type="text/javascript">
    $(document).ready(function(){
      $('#image').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#showImage').attr('src', e.target.result);
        }
        reader.readAsDataURL(e.target.files[0]);
       });
    });
</script>







@endsection
