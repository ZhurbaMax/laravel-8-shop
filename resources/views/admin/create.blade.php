@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            @include('layouts/admin_menu')
        <div class="col-9">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="/admin" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInputEmail1">Title product</label>
                    <input type="text" name="title_product" value="{{ old('title_product') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                    <input type="text" name="price" value="{{ old('price') }}"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Brand</label>
                    <input type="text" name="brand" value="{{ old('brand') }}"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <input type="text" name="description" value="{{ old('description') }}"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Category</label></br>
                    @foreach ($categories as $category )
                        <input type="checkbox" name="categories[]" value="{{ $category->id }}">
                        <label>{{ ucfirst($category->title_category) }}</label>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Upload image</label>
                    <input type="file"  name="image" class="form-control-file" id="exampleFormControlFile1">
                </div>
                <button type="submit" class="btn btn-primary">Add product</button>
            </form>
        </div>
    </div>
</div>
@endsection
