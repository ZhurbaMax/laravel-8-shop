@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="h2 mt-5 mb-5 category-admin" >Edit categories </div>
        </div>
    </div>
    <div class="row">
        @include('layouts/admin_menu')
        <div class="col-xl-9 admin-content">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                @foreach ($categoryUp as $catUp)
            <form method="post" action="{{ route('category.update', $catUp->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="exampleInputEmail1">Title Category</label>
                    <input type="text" name="title_category" value="{{ $catUp->title_category }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Desc category</label>
                    <input type="text" name="desc" value="{{ $catUp->desc}}"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Alias category</label>
                    <input type="text" name="alias" value="{{ $catUp->alias }}"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Upload image category</label>
                    <input type="file"  name="img_category" class="form-control-file" id="exampleFormControlFile1">
                </div>
                <button type="submit" class="btn add-product">Update product</button>
            </form>
                @endforeach
        </div>
    </div>
@endsection
