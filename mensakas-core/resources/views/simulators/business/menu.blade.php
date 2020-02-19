@extends('layouts.app')

@section('space')
@include('layouts.secondNav',['title'=>'Menu'])
@endsection

@section('script')
<script src="{{ asset('js/menuCarrito.js') }} " defer></script>
@endsection

@section('content')
<div class="row">
    <div class="col-6 border">
        <label for="" class="h3 ml-5">Products:</label>
        <div class="border row" name="products">
            @forelse ($business->products as $product)
                <div class="col-12 row" id="{{$product->id}}">
                    <div class="col-6" id="nameAndDescription">
                        <p id="name"><strong>{{$product->productDescriptions->descriptionTranslations[0]->name}}</strong></p>
                        <p id="description">{{$product->productDescriptions->descriptionTranslations[0]->description}}</p>
                        
                    </div>
                    <div class="col-2">
                        <p id="price"><strong>{{$product->price}}</strong></p>
                    </div>
                    <div class="col-3">
                        
                        <input type="button" value="-" class="btn btn-danger" onclick="addProduct({{$product->id}})">
                        <label for="" class="ml-2 mr-2">0</label>
                        <input type="button" value="+" class="btn btn-success"> 
                    </div>
                </div>
                @empty
                    <p>Este restaurante no tiene productos actualmente</p>
                @endforelse    
        </div>
    </div>
    <div class="col-6 border">
        <div class="ml-5"><label for="" class="h3">Shopping cart:</label></div>
        <div name="ShoppingCart"></div>
    </div>
</div>
@endsection
