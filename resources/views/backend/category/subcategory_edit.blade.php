@extends('admin.admin_master')

@section('admin')

<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-------- Add SubCategory Page  --------->
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit SubCategory</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form method="post" action="{{ route('subcategory.update') }}">
                            @csrf

                            <input type="hidden" name="id" value="{{ $subcategory->id }}">
                                    <div class="form-group">

                                        <h5>Category Select <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="category_id" class="form-control">
                                                <option value="" selected="" disabled="" >Select Category</option>
                                                @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ $category->id == $subcategory->category_id ? 'selected': ''}} >{{ $category->category_name_en }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <h5>SubCategory English <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subcategory_name_en" value="{{ $subcategory->subcategory_name_en }}" class="form-control">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>SubCategory Hindi<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subcategory_name_hin"  value="{{ $subcategory->subcategory_name_hin }}"  class="form-control">

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
