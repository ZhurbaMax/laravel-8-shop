@extends('layouts.app')

@section('content')
    <div class="cantainer">
        <h2 class="shop-h2">Search for title</h2>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    @foreach ($products as $product )
                        <div class="col-3">
                            <div class="card">
                                <img class="card-img-top" src=" {{ asset('storage') . '/'. $product->image }} ">
                                <div class="card-body">
                                    <h5 class="card-title"> {{ $product->title_product }} </h5>
                                    <p class="card-text brand"> {{ $product->brand }} </p>
                                    <p class="card-text"> {{ $product->description }} </p>
                                    <a  class="btn btn-primary">Price {{ $product->price }} $</a>
                                    <button type="submit" class="btn btn-success">Add card</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
