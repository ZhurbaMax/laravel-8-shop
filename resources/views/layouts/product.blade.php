@extends('layouts.app')

@section('content')
    <div class="cantainer">
        <div class="row">
            <div class="col-xl-12">
                <div class="shop-add-text">
                    @if(session()->get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-xl-4">
                <img class="card-img-top" src=" {{ asset('storage') . '/'. $product->image }} ">
            </div>
            <div class="col-xl-8">
                <div class="card-body">
                    <h5 class="card-title"> {{ $product->title_product }} </h5>
                    <p class="card-text brand"> {{ $product->brand }} </p>
                    <p class="card-text"> {{ $product->description }} </p>
                    <a class="btn btn-primary">Price {{ $product->price }} $</a>
                    <form action="{{ route('cart.add', $product) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-success">Add card</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
