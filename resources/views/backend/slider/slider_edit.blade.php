@extends('admin.admin_master')

@section('admin')

<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-------- Add Slider Page  --------->
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Slider</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form method="post" action="{{ route('slider.update') }}" enctype="multipart/form-data" >
                            @csrf

                            <input type="hidden" name="id" value="{{ $slider->id }}">
                            <input type="hidden" name="old_image" value="{{ $slider->slider_img }}">

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <h5>Slider Title <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="title" value="{{ $slider->title }}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Description<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="description"  value="{{ $slider->description }}"  class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Slider Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="slider_img" class="form-control">
                                            @error('slider_img')
                                            <span class="text-denger">{{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div> 

                            <input type="submit" value="update" class="btn btn-rounded btn-primary mb-5">

                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
</div>


@endsection
