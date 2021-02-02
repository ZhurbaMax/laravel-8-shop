@extends('layouts.app')

@section('content')
<div class="cantainer">
    <h2 class="shop-h2">Shop</h2>
    <div class="row">
        <div class="col-3">
            <div class="col-12">
                <form method="get" action="/search-title">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Search for title</label>
                        <input type="title" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter title">
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
                <form method="get" action="/filter-price">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Filter price</label>
                        <select class="form-control"  name="filter_price" id="exampleFormControlSelect1">
                            <option>cheap at first</option>
                            <option>dear first</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Go</button>
                </form>
                @if(isset($brands))
                    @include('layouts.brand')
                @endif
            </div>
        </div>
        <div class="col-9">
            <div class="row">
                @foreach ($products as $product )
                <div class="col-4">
                    <div class="card">
                        <img class="card-img-top" src=" {{ asset('storage') . '/'. $product->image }} ">
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
                @endforeach
                <div class="paginate">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
