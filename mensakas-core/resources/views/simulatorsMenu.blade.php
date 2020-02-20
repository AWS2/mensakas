@extends('layouts.app')

@section('space')
@include('layouts.secondNav', ['title' => 'Simulator Menu'])
@endsection

@section('content')

<div class="mt-5 pt-5 border">
    <div class="card-deck ml-3 mr-3 pt-4">
        <div class="card onclick=location.href='/simulator/comanda'">
            <a href="/simulator/comanda">
                <img src="https://image.flaticon.com/icons/svg/2467/2467098.svg" width="200" height="200"
                    class="card-img-top" alt="...">
            </a>
            <div class="card-body mx-auto">
                <h5 class="card-title">COMANDA</h5>
            </div>
        </div>
        <div class="card onclick=location.href='/simulator/restaurants'">
            <a href="/simulator/restaurants">
                <img src="https://image.flaticon.com/icons/svg/950/950258.svg" width="200" height="200"
                    class="card-img-top" alt="...">
            </a>
            <div class="card-body mx-auto">
                <h5 class="card-title ">BUSINESS</h5>
            </div>
        </div>
        <div class="card onclick=location.href='/simulator/rider'">
            <a href="/simulator/rider">
                <img src="https://image.flaticon.com/icons/svg/738/738000.svg " width="200" height="200"
                    class="card-img-top" alt="...">
            </a>
            <div class="card-body mx-auto">
                <h5 class="card-title ">RIDERS</h5>
            </div>
        </div>
    </div>
</div>
@endsection