@extends('layouts.app')

@section('space')
@include('layouts.secondNav',['title'=>'Businesses near you'])
@endsection

@section('content')
<div class="col-3 mx-auto">
    @forelse ($busisnesses as $biz)
        @php($business = $biz->business )
        <div class="row my-4">
            <img src="{{$business->logo}}" alt="">
            <h3 class="mt-3">{{ $business->name }}</h3>
            <form action="{{route('simulator.business.businessMenu', ['business'=>$business->id])}}" method="get">
                <input type="submit" value="See Menu" class=" mt-3 ml-2">
            </form>
        </div>
    @empty
        <p>No hay restaurantes disponibles en tu zona</p>
    @endforelse
</div>

@endsection
