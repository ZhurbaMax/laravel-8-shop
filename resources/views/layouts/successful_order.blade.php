@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="h2 mt-5 mb-5" style="text-align: center" > Congratulations !!! </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="text-body" >
                <p> Your order has been successfully sent</p>
                <p>Continue shopping <a href="{{ route('shop') }}">store</a></p>
            </div>

        </div>
    </div>
@endsection
