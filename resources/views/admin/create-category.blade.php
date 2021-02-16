@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-xl-12">
                <div class="h2 mt-5 mb-5 category-admin" >Add categories </div>
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
                <form method="post" action="{{ route('admin.category.create') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title Category</label>
                        <input type="text" name="title_category" value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Desc category</label>
                        <input type="text" name="desc" value=""  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alias category</label>
                        <input type="text" name="alias" value=""  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Upload image category</label>
                        <input type="file"  name="img_category" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                    <button type="submit" class="btn add-product">Add product</button>
                </form>
            </div>
        </div>
@endsection
