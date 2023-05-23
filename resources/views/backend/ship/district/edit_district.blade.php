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
                        <h3 class="box-title">Edit District</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form method="post" action="{{ route('district.update', $district->id) }}" >
                            @csrf

                            <div class="form-group">
                                <h5>Division Select <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="division_id" class="form-control">
                                        <option value="" selected="" disabled="">Select Division</option>
                                        @foreach ($division as $item)
                                        <option value="{{ $item->id }}" {{ $item->id == $district->division_id ? 'selected' : '' }}>
                                            {{ $item->division_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('division_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>District Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" value="{{ $district->district_name }}" name="district_name" class="form-control">
                                    @error('district_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
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
