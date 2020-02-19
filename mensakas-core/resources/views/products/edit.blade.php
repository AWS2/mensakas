@extends('layouts.app')

@section('space')
@include('layouts.secondNav', ['title' => 'Edit product #'.$product->id])
@endsection

@section('content')

<div>
    <form action="{{route('products.update', ['product'=>$product])}}" method="post">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="col-6 mx-auto">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="price"><strong>Price:</strong></label>
                    <input type="number" name="price" id="price" min="0.01" max="999.99" step="0.01"
                        value="{{$product->price}}">
                </div>
                <div class="form-group col-md-6">
                    <label for="status"><strong>Status:</strong></label>
                    <select id="avalible" name="avalible">
                        <option value="1">Avalible</option>
                        <option value="0">Out stock</option>
                    </select>
                </div>
            </div>
        </div>

        @if (isset($product->product))
        <div class="col-6 mx-auto border-top">
            <div class="row mt-4">
                <div class="form-group row">
                    <label for="mainProduct"><strong>This product is an extra of :</strong></label>
                    <p class="mr-3" id="mainProduct">#{{ $product->product->id}},
                        {{$product->product->productDescriptions->descriptionTranslations[0]->name}}</p>
                    <form action="{{route('products.show', ['product'=> $product->product->id])}}" method="get">
                        <button type="submit" class="btn btn-success fa fa-search btn-block"> Main product Info</button>
                    </form>
                </div>
            </div>
        </div>
        @endif
        @if (!$extras->isEmpty())
        <div class="col-6 mx-auto border-top">
            <div class="mt-4">
                <div class="form-group row">
                    <label for="mainProduct"><strong>This product have this extras:</strong></label>
                </div>
                @foreach ($extras as $extra)
                <div class="form-group row">
                    <p class="mr-3" id="extraof">#{{ $extra->id}},
                        {{$extra->productDescriptions->descriptionTranslations[0]->name ??''}}</p>
                    <form action="{{route('products.show', ['product'=> $extra->id])}}" method="get">
                        <button type="submit" class="btn btn-success fa fa-search btn-block"> Product Info</button>
                    </form>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <div class="col-6 mx-auto border-top">
            <div class="h3 mt-2" style="opacity:0.7">Business</div>
            <div class="row">
                <div class="form-group col-md-5 mr-3">
                    <label for="business"><strong>Business:</strong></label>
                    <input list="businessList" name="business_id" value="{{$product->business_id}}">
                    <datalist id="businessList">
                        @foreach ($businesses as $business)
                        <option value="{{ $business->id }}">{{ $business->name }} </option>
                        @endforeach
                    </datalist>
                </div>
            </div>
        </div>

        <div class="col-6 mx-auto border-top">
            <div class="h3 mt-2" style="opacity:0.7">Category</div>
            <div class="row">
                <label for="category"><strong>Category:</strong></label>
                <input list="category" name="category" id="categoryInput" value="{{$product->productTags[0]->tag->id}}">
                <datalist id="category">
                    @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->tagTranslations[0]->tag_name}} </option>
                    @endforeach
                </datalist>
            </div>
        </div>
        @if (isset($product->productDescriptions))
        <div class="col-6 mx-auto border-top">
            <div class="h3 mt-2" style="opacity:0.7">Description</div>
            @foreach ($product->productDescriptions->descriptionTranslations as $descriptionTranslate)
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="language"><strong>Language:</strong></label>
                    <p id="language">{{$descriptionTranslate->language->language}}</p>
                </div>
                <div class="form-group col-md-4">
                    <label for="descname"><strong>Name:</strong></label>
                    <p id="descname">{{ $descriptionTranslate->name }}</p>
                </div>
                <div class="form-group col-md-4">
                    <label for="description"><strong>Description:</strong></label>
                    <p id="description">{{ $descriptionTranslate->description }}</p>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        <div class="col-6 mx-auto">
            <div class="row mt-2">
                <div>
                    <button type="submit" value="Edit" class="btn btn-primary mr-2">
                        Update</button>
                </div>
                <div class="mr-2">
                    <a href="{{ URL::previous() }}" class="btn btn-success">Back</a>
                </div>
            </div>
        </div>
    </form>
</div>


@endsection