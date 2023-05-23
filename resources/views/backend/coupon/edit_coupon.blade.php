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
                        <h3 class="box-title">Edit Coupon</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form method="post" action="{{ route('coupon.update', $coupons->id) }}" >
                            @csrf
                            <div class="form-group">
                                <h5>Coupon Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text"  value="{{ $coupons->coupon_name }}" name="coupon_name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Coupon Discount(%) <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text"  value="{{ $coupons->coupon_discount }}" name="coupon_discount" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Coupon Validity Date <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="date"  value="{{ $coupons->coupon_validity }}" name="coupon_validity" class="form-control" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                                </div>
                            </div>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Uodate">
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
