@extends('layouts.app')

@section('space')
@include('layouts.secondNav',['title'=>'Simulator: Menu'])
@endsection

@section('script')
<script src="{{ asset('js/menuCarrito.js') }} " defer></script>
@endsection

@section('content')
<div class="container" style="background-color: white;">
    <div class="row">
        <div class="col-6 border">
            <label for="" class="h3 ml-5">Products:</label>
            <div class="row" name="products">
                @forelse ($business->products as $product)
                <div class="col-12 row" id="{{$product->id}}">
                    <div class="col-6" id="nameAndDescription-{{$product->id}}">
                        <p id="name-{{$product->id}}">
                            <strong>{{$product->productDescriptions->descriptionTranslations[0]->name ?? 'No name'}}</strong>
                        </p>
                        <p id="description-{{$product->id}}">
                            {{$product->productDescriptions->descriptionTranslations[0]->description ?? 'No description'}}
                        </p>

                    </div>
                    <div class="col-2">
                        <p id="price-{{$product->id}}" class="price"><strong>{{$product->price ?? '0'}}</strong></p>
                    </div>
                    <div class="col-3">
                        <input type="hidden" name="idProduct" value="{{$product->id}}">
                        <input type="button" value="-" class="btn btn-danger remove">
                        <label for="" class="ml-2 mr-2" id="label">0</label>
                        <input type="button" value="+" class="btn btn-success add">
                    </div>
                </div>
                @empty
                <p>Este restaurante no tiene productos actualmente</p>
                @endforelse
            </div>
        </div>
        <div class="col-6 border">
            <form method="POST"
                action="{{ route('simulator.comanda.saveOrder',['customer' => $customer, 'business' => $business]) }}">
                @csrf
                <div class="ml-5"><label for="" class="h3">Shopping cart:</label></div>
                <div id="ShoppingCart">
                </div>
                <label class="mr-2"><strong>TOTAL:</strong></label><label class="total">0</label>
                <input type="hidden" name="totalShopping" class="totalShopping" value="0">
                <div>
                    @csrf
                    <button class="btn btn-success" type="submit">Checkout</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection