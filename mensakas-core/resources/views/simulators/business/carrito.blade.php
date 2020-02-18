@extends('layouts.app')

@section('space')
@include('layouts.secondNav',['title'=>'Cesta'])
@endsection

<!-- @section('script')
<script src="{{ asset('js/productsCreate.js') }} " defer></script>
@endsection -->

@section('content')

<div class="row">
    <div class="col-6 border">
        <label for="" class="h3 ml-5">Products:</label>
        <div class="border row">
            <div class="col-6">
                <p><strong>Product Name</strong></p>
                <p>Product Description</p>
            </div>
            <div class="col-2">
                <p><strong>Price</strong></p>
            </div>
            <div class="col-3">
            <input type="button" value="+" class="btn btn-success">
            <label for="" class="ml-2 mr-2">0</label>
            <input type="button" value="-" class="btn btn-danger">
                
            </div>
        </div>
    </div>
    <div class="col-6 border">
    <div class="ml-5"><label for="" class="h3">Shopping cart:</label></div>
    </div>
</div>

@endsection