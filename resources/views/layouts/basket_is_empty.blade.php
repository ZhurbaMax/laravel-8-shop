@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="h2 mt-5 mb-5" style="text-align: center" > basket is empty </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="text-body" > Your cart is empty, continue shopping in the: <a href="{{ route('shop') }}">store</a></div>
        </div>
    </div>
@endsection
