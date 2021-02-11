@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-xl-12 right-bott">
                <a class="btn btn-success admin" href="{{ route('addProduct') }}">Create product</a>
            </div>
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>
        <div class="row">
            @include('layouts/admin_menu')
            <div class="col-xl-9">
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
                                    <a href="edit/{{ $product->id }}" class="btn btn-primary">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                <a href="#" class="btn btn-danger" onclick="deleteConfirm('{{ $product->id }}')">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <form id="{{ $product->id }}" action="/admin/product/{{$product->id}}/delete" method="get"></form>
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
