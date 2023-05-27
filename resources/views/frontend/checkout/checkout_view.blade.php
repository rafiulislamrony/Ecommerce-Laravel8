@extends('frontend.main_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
@section('title')
My Checkout
@endsection

<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class='active'>Checkout</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="checkout-box ">
            <form class="register-form" action="{{ route('checkout.store') }}" method="post" >
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="panel-group checkout-steps" id="accordion">
                            <div class="panel panel-default checkout-step-01">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 already-registered-login">
                                            <h4>Shipping Address</h4>
                                            <div class="form-group">
                                                <label class="info-title" for="ex1">
                                                    <b> Shipping Name</b> <span>*</span>
                                                </label>
                                                <input type="text" name="shipping_name" value="{{ Auth::user()->name }}"
                                                    placeholder="Full Name"
                                                    class="form-control unicase-form-control text-input" id="ex1">
                                            </div>
                                            <div class="form-group">
                                                <label class="info-title" for="ex1">
                                                    <b>Email</b> <span>*</span>
                                                </label>
                                                <input type="email" name="shipping_email"
                                                    value="{{ Auth::user()->email }}" placeholder="Your Email"
                                                    class="form-control unicase-form-control text-input" id="ex1">
                                            </div>
                                            <div class="form-group">
                                                <label class="info-title" for="ex1">
                                                    <b>Phone </b><span>*</span>
                                                </label>
                                                <input type="number" name="shipping_phone"
                                                    value="{{ Auth::user()->phone }}" placeholder="Phone Number"
                                                    class="form-control unicase-form-control text-input" id="ex1">
                                            </div>
                                            <div class="form-group">
                                                <label class="info-title" for="ex1">
                                                    <b>Post Code</b>
                                                    <span>*</span>
                                                </label>
                                                <input type="text" name="post_code" placeholder="Post Code"
                                                    class="form-control unicase-form-control text-input" id="ex1">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 already-registered-login">
                                            <div class="form-group">
                                                <h5><b>Division Select</b> <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="division_id"
                                                        class=" form-control unicase-form-control text-input"
                                                        required="">
                                                        <option value="" selected="" disabled="">Select Division
                                                        </option>
                                                        @foreach($divisions as $item)
                                                        <option value="{{ $item->id }}">{{
                                                            $item->division_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('division_id')
                                                    <span class="text-danger">{{ $message }} </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5><b>District Select</b> <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="district_id"
                                                        class=" form-control unicase-form-control text-input"
                                                        required="">
                                                        <option value="" selected="" disabled="">Select District
                                                        </option>

                                                    </select>
                                                    @error('district_id')
                                                    <span class="text-danger">{{ $message }} </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5><b>State Select</b> <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="state_id"
                                                        class=" form-control unicase-form-control text-input"
                                                        required="">
                                                        <option value="" selected="" disabled="">Select State </option>

                                                    </select>
                                                    @error('state_id')
                                                    <span class="text-danger">{{ $message }} </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="info-title" for="ex1">
                                                    <b> Notes </b> <span>*</span>
                                                </label>
                                                <textarea name="notes" class="form-control" placeholder="Notes" id=""
                                                    cols="30" rows="4">

                                            </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Your Checkout Progress</h4>
                                    </div>
                                    <div class="">
                                        <ul class="nav nav-checkout-progress list-unstyled">
                                            @foreach ($carts as $item)
                                            <li>
                                                <strong>Image:</strong>
                                                <img src="{{ asset($item->options->image) }}" style="width:40px;"
                                                    alt="">
                                            </li>
                                            <li>
                                                <strong>Quantity:</strong>
                                                ( {{$item->qty }} )
                                                <strong>Color:</strong>
                                                {{$item->options->color }}
                                                <strong>Size:</strong>
                                                {{$item->options->size }}
                                            </li>
                                            @endforeach
                                            <hr>
                                            <li>
                                                @if(Session::has('coupon'))
                                                <strong>Subtotal:</strong>${{ $cartTotal }}
                                                <hr>
                                                <strong>Coupon Name:</strong>{{ Session()->get('coupon')['coupon_name']
                                                }}
                                                ({{ Session()->get('coupon')['coupon_discount'] }} %)
                                                <hr>
                                                <strong>Coupon Discount:</strong> ${{
                                                Session()->get('coupon')['discount_amount'] }}
                                                <hr>
                                                <strong>Grand total:</strong>${{
                                                Session()->get('coupon')['total_amount'] }}
                                                <hr>

                                                @else
                                                <strong>Subtotal:</strong>${{ $cartTotal }}
                                                <hr>
                                                <strong>Grand Total:</strong>${{ $cartTotal }}
                                                <hr>
                                            </li>
                                            @endif

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- checkout-progress-sidebar -->

                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Sellect Payment Method</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" value="stripe" type="radio"
                                                    name="payment_method" id="t2" checked>
                                                <label class="form-check-label" for="t2">
                                                    Stripe
                                                </label>
                                                <img src="{{ asset('frontend/assets/images/payments/4.png') }}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" value="card" type="radio"
                                                    name="payment_method" id="t1">
                                                <label class="form-check-label" for="t1">
                                                    Card
                                                </label>
                                                <img src="{{ asset('frontend/assets/images/payments/3.png') }}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" value="cash" type="radio"
                                                    name="payment_method" id="t3">
                                                <label class="form-check-label" for="t3">
                                                    Cash
                                                </label>
                                                <img src="{{ asset('frontend/assets/images/payments/6.png') }}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" style="margin-top: 20px;"
                                                class="btn-upper btn btn-primary checkout-page-button">
                                                <b> Payment Step</b>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.row -->
            </form>
        </div><!-- /.checkout-box -->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->

        <!-- ======= BRANDS CAROUSEL ===== -->
        @include('frontend.body.brands')
        <!-- ======= BRANDS CAROUSEL : END ====== -->

        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div><!-- /.container -->
</div><!-- /.body-content -->

<!-- SellectBar -->
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="division_id"]').on('change', function(){
            var division_id = $(this).val();
            if(division_id) {
                $.ajax({
                    url: "{{  url('/district-get/ajax') }}/"+division_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        $('select[name="state_id"]').empty();
                       var d =$('select[name="district_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="district_id"]').append('<option value="'+ value.id +'">' + value.district_name + '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });

        $('select[name="district_id"]').on('change', function(){
            var district_id = $(this).val();
            if(district_id) {
                $.ajax({
                    url: "{{  url('/state-get/ajax') }}/"+district_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="state_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="state_id"]').append('<option value="'+ value.id +'">' + value.state_name + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });

    });

</script>


@endsection
