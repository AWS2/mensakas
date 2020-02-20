@extends('layouts.app')

@section('space')
@include('layouts.secondNav', ['title' => 'Product #'.$product->id])
@endsection

@section('content')

<div>
    <div class="col-6 mx-auto">
        <div class="row">
            <div class="form-group col-md-6">
                <label for="price"><strong>Price:</strong></strong></label>
                <p id="price">{{$product->price}}</p>
            </div>
            <div class="form-group col-md-6">
                <label for="status"><strong>Status:</strong></strong></label>
                <p id="status">
                    @if ($product->avalible)
                    Avalible
                    @else
                    Out Stock
                    @endif
                </p>
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
                <label for="businessname"><strong>Name:</strong></label>
                <p id="businessname">{{ $product->business->name }}</p>
            </div>
            <div class="form-group col-md-4">
                <form action="{{route('businesses.show', ['business'=> $product->business->id])}}" method="get">
                    <button type="submit" class="btn btn-success fa fa-search btn-block"> Business Info</button>
                </form>
            </div>
        </div>
    </div>

    @if (isset($product->productTags) && !$product->productTags->isEmpty())
    <div class="col-6 mx-auto border-top">
        <div class="h3 mt-2" style="opacity:0.7">Category</div>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="riderphone"><strong>Id:</strong></label>
                <p id="riderphone">{{ $product->productTags[0]->tag->id }}</p>
            </div>
            <div class="form-group col-md-4">
                <label for="category"><strong>Category:</strong></label>
                <p id="category">{{ $product->productTags[0]->tag->tagTranslations[0]->tag_name ?? '' }}</p>
            </div>
        </div>
    </div>
    @endif

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
            <div class="mr-2">
                <a href="{{ URL::previous() }}" class="btn btn-success">Back</a>
            </div>
            <div>
                <form action="{{route('products.edit', ['product'=>$product->id])}}" method="get">
                    <button type="submit" value="Edit" class="btn btn-warning"><i class="fa fa-pencil"></i>
                        Edit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection