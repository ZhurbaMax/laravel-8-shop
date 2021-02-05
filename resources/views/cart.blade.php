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
                <div class="h2 mt-5 mb-5" style="text-align: center" > Card </div>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
                <th scope="col">Number</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($order->products as $product )
                <tr>
                    <td>{{ $product->title_product }}</td>
                    <td>{{ $product->totalCostProductCart($product->pivot->count) }} $</td>
                    <td><img class="card-img-top cart-img" src="{{ asset('storage') . '/'. $product->image }}"></td>
                    <th>
                        <form action="{{ route('cart.add', $product) }}" method="post" class="form-plus">
                            @csrf
                            <button type="submit" class="btn btn-success cart"><i class="fa fa-plus" aria-hidden="true"></i></button>
                        </form>
                        {{ $product->pivot->count }}
                        <form action="{{ route('cart.reduce', $product) }}" method="post" class="form-minus">
                            @csrf
                            <button type="submit" class="btn btn-success cart"><i class="fa fa-minus" aria-hidden="true"></i></button>
                        </form>
                    </th>
                    <td>
                        <form method="post" class="item-form" action="{{ route('cart.remove', $product) }}">
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="order-total">
            <p>Order total: <span class="total-price">{{ $order->totalSumCart() }}</span></p>
            <div class="col-xl-12 right-bott">
                <a class="btn btn-success" href="{{ route('cart.checkout') }}">Сheckout</a>
            </div>
        </div>

        <cart-component></cart-component>
@endsection
