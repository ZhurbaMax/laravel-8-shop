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
                                    <a href="edit/{{ $product->id }}" class="btn btn-primary">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                <a class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                        <button type="button" class="btn btn-danger">
                                            <a href="/admin/product/{{$product->id}}/delete" class="modal-link"> Yes</a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </tbody>
                </table>
                <div class="paginate">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
@endsection
