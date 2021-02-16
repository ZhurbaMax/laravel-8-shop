@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="h2 mt-5 mb-5 category-admin" > Categories </div>
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>
    </div>
    <div class="row">
            @include('layouts/admin_menu')
        <div class="col-xl-9 admin-content">
            <div class="ordeer-total">
                <h5>Categories: <span class="total-price"></span></h5>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Category</th>
                                <th scope="col">Description</th>
                                <th scope="col">Image</th>
                                <th scope="col">Alias</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($categoryes as $category )
                                <tr>
                                    <td>{{ $category->title_category }}</td>
                                    <td>{{ $category->desc  }}</td>
                                    <td><img class="card-img-top cart-img" src="{{ asset('storage') . '/'. $category->img_category }}"></td>
                                    <td>{{ $category->alias  }}</td>
                                    <td class="table-buttons">
                                        <a href="/admin/category/{{ $category->id }}" class="btn btn-primary">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger" onclick="deleteConfirm('{{ $category->id }}')">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <form id="{{ $category->id }}" action="/admin/category/{{$category->id}}/delete" method="get"></form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                <a class="btn add-product" href="{{ route('admin.category.add') }}">Add category</a>
            </div>
        </div>
    </div>
@endsection
