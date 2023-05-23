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
                        <h3 class="box-title">Edit Division</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form method="post" action="{{ route('division.update', $divisions->id) }}" >
                            @csrf
                            <div class="form-group">
                                <h5>Division Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" value="{{ $divisions->division_name }}" name="division_name" class="form-control">
                                </div>
                            </div>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
                            </div>
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
