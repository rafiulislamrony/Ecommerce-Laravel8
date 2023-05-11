@extends('admin.admin_master')

@section('admin')

<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-------- Add Brand Page  --------->
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Category</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form method="post" action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data" >
                            @csrf

                            <input type="hidden" name="id" value="{{ $category->id }}">

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <h5>Category Name English <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="category_name_en" value="{{ $category->category_name_en }}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Category Name Hindi<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="category_name_hin"  value="{{ $category->category_name_hin }}"  class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Category Icon <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="category_icon" value="{{ $category->category_icon }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <input type="submit" value="Update" class="btn btn-rounded btn-primary mb-5">

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
