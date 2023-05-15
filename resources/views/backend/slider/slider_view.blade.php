@extends('admin.admin_master')

@section('admin')
@php
use Illuminate\Support\Str;
@endphp

<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-8">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Slider list</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Slider Image</th>
                                        <th>Slider Title</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sliders as $item)
                                    <tr>
                                        <td>
                                            <img src="{{ asset($item->slider_img) }}" alt=""
                                                style="width: 70px; height: 40px; object-fit: cover;">
                                        </td>
                                        <td>
                                            @if ($item->title == NULL)
                                            <span class="badge badge-pill badge-danger">No Title </span>
                                            @else
                                            {{ $item->title }}
                                            @endif
                                        </td>
                                        <td>{{ Str::limit($item->description, 50) }}</td>
                                        <td>
                                            @if ($item->status == 1)
                                            <span class="badge badge-pill badge-success">Active </span>
                                            @else
                                            <span class="badge badge-pill badge-danger">InActive </span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('slider.edit', $item->id) }}" class="btn btn-info btn-sm"
                                                title="Edit Data">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="{{ route('slider.delete', $item->id) }}" id="delete"
                                                class="btn btn-danger btn-sm" title="Delete Data">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            @if ($item->status == 1)
                                            <a href="{{ route('slider.inactive', $item->id) }}"
                                                class="btn btn-danger btn-sm" title="InActive Now">
                                                <i class="fa fa-arrow-down"></i>
                                            </a>
                                            @else
                                            <a href="{{ route('slider.active', $item->id) }}"
                                                class="btn btn-success btn-sm" title="Active Now">
                                                <i class="fa fa-arrow-up"></i>
                                            </a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>

            <!-------- Add Slider Page  --------->
            <div class="col-lg-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Slider</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form method="post" action="{{ route('slider.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <h5>Slider Title <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="title" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Slider Description <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="description" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Slider Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="slider_img" class="form-control">
                                            @error('slider_img')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <input type="submit" value="Add New" class="btn btn-rounded btn-primary mb-5">

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
