@extends('layouts.app')

@section('space')
@include('layouts.secondNav',['title'=>'Businesses near you'])
@endsection

@section('content')
<div class="col-6 mx-auto">
    @forelse ($busisnesses as $business)
        <div class="row mb-4">
            <img src="{{$business->logo}}" alt="" class="col-4 rounded p-4"> 
            <h3 class="my-auto col-4">{{ $business->name }}</h3>
            <form class=" my-auto col-4" action="{{route('simulator.business.businessMenu', ['business'=>$business->id])}}" method="get">
                <input type="submit" value="See Menu" class="btn btn-link mt-3 ml-2">
            </form>
        </div>
    @empty
        <p>No hay restaurantes disponibles en tu zona</p>
    @endforelse
</div>

@endsection
