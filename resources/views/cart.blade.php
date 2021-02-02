@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-12">
                <div class="h2 mt-5 mb-5" style="text-align: center" > Card </div>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
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
                    <th scope="row">1</th>
                    <td>{{ $product->title_product }}</td>
                    <td>{{ $product->price }} $</td>
                    <td><img class="card-img-top cart-img" src="{{ asset('storage') . '/'. $product->image }}"></td>
                    <td> 1 </td>
                    <td>
                        <form method="post" class="item-form">
                            <input type="hidden" name="id_delete"  value="" class="form-control" >
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
@endsection
