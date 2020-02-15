@extends('layouts.app')

@section('space')
@include('layouts.secondNav',['title'=>'Menu'])
@endsection

@section('content')
<div>
    @forelse ($business->products as $product)
        <div>
            <p>{{ $product->id }}</p>
        </div>
    @empty
        <p>Este restaurante no tiene productos actualmente</p>
    @endforelse
</div>

@endsection
