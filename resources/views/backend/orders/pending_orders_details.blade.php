@extends('admin.admin_master')

@section('admin')

<div class="container-full">

    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Order Details</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Box Cards</li>
                            <li class="breadcrumb-item active" aria-current="page">Basic Box</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="row">


            <div class="col-md-6 col-12">
                <div class="box box-bordered border-primary">
                    <div class="box-header with-border">
                        <h4 class="box-title"><b>Shipping Details</b></h4>
                    </div>
                    <table class="table">
                        <tr>
                            <th> Shipping Name : </th>
                            <th> {{ $order->name }} </th>
                        </tr>
                        <tr>
                            <th> Shipping Phone : </th>
                            <th> {{ $order->phone }} </th>
                        </tr>

                        <tr>
                            <th> Shipping Email : </th>
                            <th> {{ $order->email }} </th>
                        </tr>

                        <tr>
                            <th> Division : </th>
                            <th> {{ $order->division->division_name }} </th>
                        </tr>

                        <tr>
                            <th> District : </th>
                            <th> {{ $order->district->district_name }} </th>
                        </tr>

                        <tr>
                            <th> State : </th>
                            <th>{{ $order->state->state_name }} </th>
                        </tr>

                        <tr>
                            <th> Post Code : </th>
                            <th> {{ $order->post_code }} </th>
                        </tr>

                        <tr>
                            <th> Order Date : </th>
                            <th> {{ $order->order_date }} </th>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="box box-bordered border-primary">
                    <div class="box-header with-border">
                        <h4 class="box-title"><b>Order Details</b> <span class="text-danger" >Invoice:{{ $order->invoice_no }}</span></h4>
                    </div>
                    <table class="table">
                        <tr>
                            <th> Name : </th>
                            <th> {{ $order->user->name }} </th>
                        </tr>
                        <tr>
                            <th> Phone : </th>
                            <th> {{ $order->user->phone }} </th>
                        </tr>
                        <tr>
                            <th> Payment Type : </th>
                            <th> {{ $order->payment_method }} </th>
                        </tr>
                        <tr>
                            <th> Trnx ID : </th>
                            <th> {{ $order->transaction_id }}</th>
                        </tr>
                        <tr>
                            <th> Invoice : </th>
                            <th class="text-danger"> {{ $order->invoice_no }} </th>
                        </tr>
                        <tr>
                            <th> Order Total : </th>
                            <th>${{ $order->amount }} </th>
                        </tr>
                        <tr>
                            <th>Order : </th>
                            <th>
                                <span class="badge badge-pill badge-warning" style="background: #418DB9;">
                                {{ $order->status }}
                                </span>
                            </th>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-12">
                <div class="box box-bordered border-primary">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>
                                    <label for="">Image</label>
                                </td>
                                <td>
                                    <label for="">Product name</label>
                                </td>
                                <td>
                                    <label for="">Product Code</label>
                                </td>
                                <td>
                                    <label for="">Color</label>
                                </td>
                                <td>
                                    <label for="">Size</label>
                                </td>
                                <td>
                                    <label for="">Quantity</label>
                                </td>
                                <td>
                                    <label for="">Price</label>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orderItem as $item)
                                <tr>
                                    <td>
                                        <label for="">
                                            <img src="{{ asset($item->product->product_thambnial) }}" style="width: 50px;" alt="">
                                        </label>
                                    </td>
                                    <td>
                                        <label for=""> {{ $item->product->product_name_en }}</label>
                                    </td>
                                    <td>
                                        <label for=""> {{ $item->product->product_code }}</label>
                                    </td>
                                    <td>
                                        <label for=""> {{ $item->color }}</label>
                                    </td>
                                    <td>
                                        <label for=""> {{ $item->size }}</label>
                                    </td>
                                    <td>
                                        <label for=""> {{ $item->qty }}</label>
                                    </td>
                                    <td>
                                        <label for="">
                                            ${{ $item->price }}
                                            (${{ $item->price * $item->qty }})

                                        </label>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

</div>

@endsection
