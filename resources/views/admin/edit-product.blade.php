@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
                @include('layouts/admin_menu')
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <div class="col-9">
                    <h3 class="center-title">Edit <span class="span-title">  {{ $prodUp->title_product }}</span></h3>
                    <form action="{{ route('edit.update', $prodUp->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $prodUp->id_product }}" >
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title product</label>
                            <input type="text" name="title_product" value="{{ $prodUp->title_product }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Price</label>
                            <input type="text" name="price" value="{{ $prodUp->price }}" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Brand</label>
                            <input type="text" name="brand" value="{{ $prodUp->brand }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <input type="text" name="description" value="{{ $prodUp->description }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Category</label></br>
                            @foreach ( $categories as $category )
                                <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                                       @foreach($prodUp->categories as $categorOLd)
                                           @if($category->id == $categorOLd->pivot->category_id)checked @endif
                                       @endforeach
                                >
                                <label>{{ ucfirst($category->title_category) }}</label>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <img class="card-img-edit" src=" {{ asset('storage') . '/'. $prodUp->image }} ">
                            <label for="exampleFormControlFile1">Upload image</label>
                            <input type="file"  name="image" value="{{ $prodUp->image }}" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                        <button type="submit" class="btn btn-primary">Update product</button>
                    </form>
                </div>
        </div>
    </div>
@endsection
