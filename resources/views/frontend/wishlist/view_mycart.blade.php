@extends('frontend.main_master')

@section('content')

@section('title')
My Cart Page
@endsection

<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class='active'>Mycart</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="shopping-cart">
                <div class="shopping-cart-table ">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="cart-romove item">Image</th>
                                    <th class="cart-product-name item">Product Name</th>
                                    <th class="cart-edit item">Color</th>
                                    <th class="cart-edit item">Size</th>
                                    <th class="cart-qty item">Quantity</th>
                                    <th class="cart-sub-total item">Subtotal</th>
                                    <th class="cart-total last-item">Remove</th>
                                </tr>
                            </thead>
                            <tbody id="cartPage">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- /.row -->

            <!-- ======= BRANDS CAROUSEL ===== -->
            @include('frontend.body.brands')
            <!-- ======= BRANDS CAROUSEL : END ====== -->

        </div><!-- /.container -->
    </div><!-- /.body-content -->

    @endsection
