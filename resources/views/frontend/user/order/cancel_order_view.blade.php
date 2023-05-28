@extends('frontend.main_master')

@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
            @include('frontend.common.user_sidebar')

            <div class="col-md-10">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr style="background: #e2e2e2;">
                                <td>
                                    <label for=""> Date</label>
                                </td>
                                <td>
                                    <label for=""> Total</label>
                                </td>
                                <td>
                                    <label for=""> Payment</label>
                                </td>
                                <td>
                                    <label for=""> Invoice</label>
                                </td>
                                <td>
                                    <label for=""> Order</label>
                                </td>
                                <td>
                                    <label for=""> Action </label>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($orders as $order)
                            <tr>
                                <td>
                                    <label for=""> {{ $order->order_date }}</label>
                                </td>
                                <td>
                                    <label for=""> ${{ $order->amount }}</label>
                                </td>
                                <td>
                                    <label for=""> {{ $order->payment_method }}</label>
                                </td>
                                <td>
                                    <label for=""> {{ $order->invoice_no }}</label>
                                </td>
                                <td>
                                    <label for="">
                                        <span class="badge badge-pill badge-warning" style="background: #418DB9;">{{
                                            $order->status }} </span>
                                    </label>
                                </td>
                                <td>
                                    <a href="{{ url('user/order_details/'.$order->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i>
                                        View
                                    </a>
                                    <br>
                                    <br>
                                    <a target="_blank" href="{{ url('user/invoice_download/'.$order->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-download" style="color: white;"></i>
                                        Invoice
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <h3 class="text-danger">Order Not Found</h3>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
