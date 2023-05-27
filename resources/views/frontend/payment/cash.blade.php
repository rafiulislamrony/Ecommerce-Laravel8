@extends('frontend.main_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
@section('title')
Cash On Delivery  Page
@endsection
<!-- ========== HEADER : END ========== -->
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class='active'>Cash On Delivery</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="checkout-box ">
            <div class="row">
                <div class="col-md-6">
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Your Shopping Amount</h4>
                                </div>
                                <ul class="nav nav-checkout-progress list-unstyled">
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
                <div class="col-md-6">
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Sellect Payment Method</h4>
                                </div>
                                <form action="{{ route('cash.order') }}" method="post" id="payment-form">
                                    @csrf
                                    <div class="form-row">
                                        <img src="{{ asset('frontend/assets/images/payments/cash.png') }}" alt="">
                                        <label for="card-element">

                                            <input type="hidden" name="name" value="{{ $data['shipping_name'] }}" id="">
                                            <input type="hidden" name="email" value="{{ $data['shipping_email'] }}"
                                                id="">
                                            <input type="hidden" name="phone" value="{{ $data['shipping_phone'] }}"
                                                id="">
                                            <input type="hidden" name="post_code" value="{{ $data['post_code'] }}"
                                                id="">
                                            <input type="hidden" name="division_id" value="{{ $data['division_id'] }}"
                                                id="">
                                            <input type="hidden" name="district_id" value="{{ $data['district_id'] }}"
                                                id="">
                                            <input type="hidden" name="state_id" value="{{ $data['state_id'] }}" id="">
                                            <input type="hidden" name="notes" value="{{ $data['notes'] }}" id="">

                                        </label>

                                    </div>
                                    <br>
                                    <button class="btn btn-primary">Submit Payment</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /.checkout-box -->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->

        <!-- ======= BRANDS CAROUSEL ===== -->
        @include('frontend.body.brands')
        <!-- ======= BRANDS CAROUSEL : END ====== -->

        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div><!-- /.container -->
</div><!-- /.body-content -->



@endsection
