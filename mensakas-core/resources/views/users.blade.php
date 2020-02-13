@extends('layouts.app')

@section('space')
    @include('layouts.secondNav', ['title' => 'Users Menu'])
@endsection

@section('content')

<div class="mt-5 pt-5 border">
    <div class="card-deck ml-3 mr-3 pt-4">
        <div class="card onclick=location.href='/customers'">
            <a href="/customers">
                <img src="https://image.flaticon.com/icons/svg/950/950258.svg" width="200" height="200" class="card-img-top" alt="...">
            </a>
            <div class="card-body mx-auto">
            <h5 class="card-title">CUSTOMERS</h5>
            </div>
        </div>
        <div class="card onclick=location.href='/riders'">
            <a href="/riders">
                <img src="https://image.flaticon.com/icons/svg/738/738000.svg " width="200" height="200" class="card-img-top" alt="...">
            </a>
            <div class="card-body mx-auto">
            <h5 class="card-title ">RIDERS</h5>
            </div>
        </div>
    </div>
</div>
@endsection
