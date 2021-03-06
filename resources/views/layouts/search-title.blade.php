@extends('layouts.app')

@section('content')
    <div class="cantainer">
        <h2 class="shop-h2">Search results</h2>
        <div class="row">
            <div class="col-xl-3">
                <div class="col-xl-12">
                    <form method="get" action="{{ route('filter.shop') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Search for title</label>
                            <input type="text" name="title_product" value="{{ old('title_product') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter title">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Filter price</label>
                            <select class="form-control"  name="filter_price" id="exampleFormControlSelect1">
                                <option>cheap at first</option>
                                <option>dear first</option>
                            </select>
                        </div>
                        @if(isset($brands))
                            @include('layouts.brand')
                        @endif
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </form>
                </div>
            </div>
            <div class="col-xl-9">
                <div class="row">
                    @foreach ($products as $product )
                        <div class="col-xl-3">
                            <div class="card">
                                <img class="card-img-top" src=" {{ asset('storage') . '/'. $product->image }} ">
                                <div class="card-body">
                                    <h5 class="card-title"> {{ $product->title_product }} </h5>
                                    <p class="card-text brand"> {{ $product->brand }} </p>
                                    <p class="card-text"> {{ $product->description }} </p>
                                    <a  class="btn btn-primary">Price {{ $product->price }} $</a>
                                    <form action="{{ route('cart.add', $product) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Add card</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
