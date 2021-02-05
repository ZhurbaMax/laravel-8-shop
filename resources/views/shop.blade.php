@extends('layouts.app')

@section('content')
<div class="cantainer">
    <h2 class="shop-h2">Shop</h2>
    <div class="shop-add-text">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col-xl-3">
            <div class="col-xl-12">
                <form method="get" action="{{ route('filter.shop') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Search for title</label>
                        <input type="text" name="title_product" value="{{ request()->title_product }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter title">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Filter price</label>
                        <select class="form-control"  name="filter_price"  id="exampleFormControlSelect1">
                            <option selected disabled>Select filter</option>
                            <option>cheap at first</option>
                            <option>dear first</option>
                        </select>
                    </div>
                    @if(isset($brands))
                        @include('layouts.brand')
                    @endif
                    <button type="submit" class="btn btn-primary">Filter</button>
                </form>
                <a class="btn btn-danger reset" href="{{ route('shop') }}">Reset filter</a>
            </div>
        </div>
        <div class="col-xl-9">
            <div class="row">
                @foreach ($products as $product )
                <div class="col-xl-4">
                    <div class="card">
                        <a href="{{ route('get.product', $product) }}" class="btn btn-light"><img class="card-img-top" src=" {{ asset('storage') . '/'. $product->image }} "></a>
                        <div class="card-body">
                            <p class="price-prod-item">Price {{ $product->price }} $</p>
                            <p class="card-text brand"> {{ $product->brand }} </p>
                            <form action="{{ route('cart.add', $product) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-success">Add card</button>
                            </form>
                            <a href="{{ route('get.product', $product) }}" class="btn-light"><h5 class="card-title"> {{ $product->title_product }} </h5></a>
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
