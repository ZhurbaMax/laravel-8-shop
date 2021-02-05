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
                <h5>Order list: <span class="total-price"></span></h5>
                <ul>
                    @foreach ($orders as $order )
                        <li class="orders">
                            <a href="{{ route('detail.order', $order) }}">Order number : {{ $order->id }} Created at: {{ $order->created_at }}</a>
                            <a href="#" class="btn btn-secondary order-delete" onclick="deleteConfirm('{{ $order->id }}')">
                                <i class="fa fa-trash"></i>
                            </a>
                            <form id="{{ $order->id }}" action="/admin/orders/{{$order->id}}/delete" method="get"></form>
                        </li>
                    @endforeach
                </ul>
                <div class="paginate">
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
