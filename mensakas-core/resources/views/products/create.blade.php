@extends('layouts.app')

@section('script')
<script src="{{ asset('js/productsCreate.js') }} " defer></script>
@endsection

@section('space')
@include('layouts.secondNav', ['title' => 'New Product'])
@endsection

@section('content')

<form action="{{route('products.store')}}" method="post" id="create">
{{ csrf_field() }}

<div class="row">
    <div class="col-6">
        <div class="h4 ml-4 mb-4" style="opacity: 0.7;">
            Details
        </div>
        <div class="form-row ml-5">
            <div class=" col-md-4">
                <label for="business"><strong>Business:</strong></label>
                <input list="businessList" name="business_id">
                <datalist id="businessList">
                    @foreach ($businesses as $business)
                    <option value="{{ $business->id }}">{{ $business->name }} </option>
                    @endforeach
                </datalist>
            </div>
            <div class=" col-md-3">
                <label for="price"><strong>Price:</strong></label>
                <input type="number" name="price" id="price" min="0.01" max="999.99" step="0.01">
            </div>
            <div class=" col-md-3">
                <label for="avalible"><strong>Status:</strong></label>
                <select id="avalible" name="avalible">
                    <option value="1">Avalible</option>
                    <option value="0">Out stock</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="h4 ml-4 mb-4" style="opacity: 0.7;">
            Description
        </div>
        <div class="form-row d-flex justify-content-center">
            <div class="form-group col-md-2">
                <label for="language"><strong>language:</strong></label>
                <select id="language" name="language_id">
                    @foreach ($languages as $language)
                    <option value="{{$language->id}}">{{$language->language}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="name"><strong>Product name:</strong></label>
                <input type="text" name="name" id="name">
            </div>
            <div class="form-group col-md-4 row ">
                <label for="description" class="ml-2"><strong>Product description:</strong></label>
                <textarea name="description" id="description" cols="20" rows="2"></textarea>
            </div>
        </div>
    </div>
</div>
<div class=" h4 mt-5 ml-4" style="opacity: 0.7;">
        Additional
    </div>
<div class="row col-10 ml-5 mt-5"> 
    <div class="form-group col-3 ">
        <label for="category"><strong>Category:</strong></label>
        <input list="category" name="category" id="categoryInput">
        <datalist id="category">
            @foreach ($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->tagTranslations[0]->tag_name}} </option>
            @endforeach
        </datalist>
    </div>
    <div class="col-4" id="extraDiv">
        <div class="form-group col-10">
            <label for="extra"><strong>Extra of product:</strong></label>
            <input list="extra" name="mainProduct" id="extraInput">
            <datalist id="extra">
                @foreach ($products as $product)
                <option value="{{ $product->id }}">
                    {{ $product->productDescriptions->descriptionTranslations[0]->name ?? ''}} </option>
                @endforeach
            </datalist>
        </div>
    </div>
</div>
<div class="col-7 row mt-5 ml-3">
    <div class="mr-2">
        <button type="submit" form="create" class="btn btn-primary">Create</button>
    </div>
    <div class="mr-2">
            <a href="{{ URL::previous() }}" class="btn btn-success">Back</a>
    </div>
</div>
</form>


    <!-- <form action="{{route('products.store')}}" method="post" id="create">
    {{ csrf_field() }}
        <div class="row">
            <div class="col-6">
                <div class="form-row d-flex justify-content-center">
                    <div class=" col-md-4">
                        <label for="business"><strong>Business:</strong></label>
                        <input list="businessList" name="business_id">
                        <datalist id="businessList">
                            @foreach ($businesses as $business)
                            <option value="{{ $business->id }}">{{ $business->name }} </option>
                            @endforeach
                        </datalist>
                    </div>
                    <div class=" col-md-3">
                        <label for="price"><strong>Price:</strong></label>
                        <input type="number" name="price" id="price" min="0.01" max="999.99" step="0.01">
                    </div>
                    <div class=" col-md-3">
                        <label for="avalible"><strong>Status:</strong></label>
                        <select id="avalible" name="avalible">
                            <option value="1">Avalible</option>
                            <option value="0">Out stock</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="h4 ml-4" style="opacity: 0.7;">Description</div>
                <div class="form-row d-flex justify-content-center">
                    <div class="form-group col-md-2">
                        <label for="language"><strong>language:</strong></label>
                        <select id="language" name="language_id">
                            @foreach ($languages as $language)
                            <option value="{{$language->id}}">{{$language->language}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="name"><strong>Product name:</strong></label>
                        <input type="text" name="name" id="name">
                    </div>
                    <div class="form-group col-md-5 row">
                        <label for="description"><strong>Product description:</strong></label>
                        <textarea name="description" id="description" cols="30" rows="2"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 ml-4">
                <div class=" h4" style="opacity: 0.7;">Additional</div>
                <div class="row col-12">
                    <div class="form-group col-4 ">
                        <label for="category"><strong>Category:</strong></label>
                        <input list="category" name="category" id="categoryInput">
                        <datalist id="category">
                            @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->tagTranslations[0]->tag_name}} </option>
                            @endforeach
                        </datalist>
                    </div>
                    <div class="col-4" id="extraDiv">
                        <div class="form-group col-10">
                            <label for="extra"><strong>Extra of product:</strong></label>
                            <input list="extra" name="mainProduct" id="extraInput">
                            <datalist id="extra">
                                @foreach ($products as $product)
                                <option value="{{ $product->id }}">
                                    {{ $product->productDescriptions->descriptionTranslations[0]->name ?? ''}} </option>
                                @endforeach
                            </datalist>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
    <div class="col-7 row mt-3 mx-auto">
        <div class="mr-2">
            <button type="submit" form="create" class="btn btn-primary">Create</button>
        </div>
        <div class="mr-2">
            <a href="{{ URL::previous() }}" class="btn btn-success">Back</a>
        </div>
        </form>
    </div> -->

@endsection