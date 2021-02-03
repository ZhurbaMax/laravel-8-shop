@extends('layouts.app')

@section('content')
    <div class="shop-add-text">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="h2 mt-5 mb-5" style="text-align: center" > Orders </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-3">
            <ul class="list-group">
                <li class="list-group-item"><a href="{{ route('admin') }}">List product</a></li>
                <li class="list-group-item"><a href="{{ route('admin.orders') }}">Orders</a></li>
            </ul>
        </div>
        <div class="col-xl-9">
            <div class="ordeer-total">
                <h5>Order Detail: <span class="total-price"></span></h5>
                    @foreach ($orderDetail as $order )
                    <p><span class="span-order">Made an order: </span> {{ $order->created_at }} </p>
                        <p><span class="span-order">Status: </span>
                            @if($order->status == 1)
                                Confirmed
                            @else
                                not Confirmed
                            @endif
                        </p>
                        <p><span class="span-order"> Customer name: </span> {{ $order->name }} </p>
                        <p><span class="span-order"> Customer phone:</span> {{ $order->phone }} </p>
                    <p><span class="span-order">Order price:</span> <span class="total-price">{{ $order->totalSumCart() }}</span></p>
                    <ul>
                        @foreach ($order->products as $product )
                            <li>{{ $product->title_product }} : {{  $product->pivot->count }} - pieces </li>
                        @endforeach
                    </ul>
                    @endforeach
            </div>
        </div>
    </div>
@endsection
