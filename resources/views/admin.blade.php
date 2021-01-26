@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-12 right-bott">
                <button type="button" class="btn btn-success"><a href="{{ route('addProduct') }}">Create product</a></button>
            </div>
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-3">
                <ul class="list-group">
                    <li class="list-group-item"><a href="{{ route('admin') }}">List product</a></li>
                </ul>
            </div>
            <div class="col-9">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Desript</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 0;?>
                    @foreach ($products as $product )
                        <?php $count++;?>
                        <tr>
                            <th scope="row">{{$count}}</th>
                            <td>{{ $product->title_product }}</td>
                            <td>{{ $product->brand }}</td>
                            <td>{{ $product->description }} </td>
                            <td class="table-buttons">
                                <a href="edit/{{ $product->id_product }}" class="btn btn-primary">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href="/admin/product/{{$product->id_product}}/delete" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="paginate">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
@endsection
