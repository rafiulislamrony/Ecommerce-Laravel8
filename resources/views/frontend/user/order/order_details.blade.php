@extends('frontend.main_master')

@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
            @include('frontend.common.user_sidebar')

            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h4><b>Shipping Details</b></h4>
                    </div>
                    <hr>
                    <div class="card-body" style="background: #E9EBEC;">
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
            </div>

            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h4><b>Order Details</b> <span class="text-danger">Invoice:{{ $order->invoice_no }}</span></h4>
                    </div>
                    <hr>
                    <div class="card-body" style="background: #E9EBEC;">
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
                                <th> {{ $order->transaction_id }} </th>
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
            </div>
        </div>
        <div class="row">

            <div class="col-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr style="background: #e2e2e2;">
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
                                        <img src="{{ asset($item->product->product_thambnial) }}" style="width: 50px;"
                                            alt="">
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

            @if ($order->status !== "dalivered")

            @else

            @php
            $order = App\Models\Order::where('id', $order->id)->where('return_reason', '=', NULL)->first();
            @endphp
            @if ($order)
            <form action="{{ route('return.order',$order->id) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="label">Order Return Reson</label>
                    <textarea name="return_reason" id="" class="form-control" cols="30"
                        rows="4"> Return Reason </textarea>
                </div>
                <button type="submit" class="btn btn-danger">Submit</button>
            </form>
            @else
            <span class="badge badge-pill badge-warning" style="background: red;" >
                You have Send Return Request
            </span>

            @endif

            @endif
            <br>
            <br>
        </div>
    </div>
</div>

@endsection
