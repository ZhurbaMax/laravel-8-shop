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
            <div class="h2 mt-5 mb-5" style="text-align: center" > Checkout </div>
        </div>
    </div>

    <div class="checkout-total">
        <h5>Amount to pay: <span class="total-price">{{ $order->totalSumCart() }}</span></h5>
        <h5>Your order:</h5>
        <ul>
            @foreach ($order->products as $product )
                <li>{{ $product->title_product }} : {{  $product->pivot->count }} - pieces </li>
            @endforeach
        </ul>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{ route('checkout.confirm') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputEmail1">Enter your name</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Enter your phone</label>
                <input type="text" name="phone" value="{{ old('phone') }}"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="col-xl-12 right-bott">
                <button type="submit" class="btn btn-success">Valide purchase</button>
            </div>
        </form>
    </div>
@endsection
