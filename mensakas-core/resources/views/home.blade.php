@extends('layouts.app')

@section('content')

<div class="mt-5 pt-5 border">
    <div class="card-deck ml-3 mr-3 pt-4">

        <div class="card border" onclick="location.href='/users'">
            <a href="/users">
                <img src="https://image.flaticon.com/icons/svg/476/476863.svg" width="200" height="200" class="card-img-top" alt="...">
            </a>
            <div class="card-body mx-auto">
                <strong><h5 class="">USERS</h5></strong>
            </div>
        </div>
        <div class="card onclick=location.href='/businesses'">
            <a href="/businesses">
                <img src="https://image.flaticon.com/icons/svg/123/123403.svg" width="200" height="200" class="card-img-top" alt="...">
            </a>
            <div class="card-body mx-auto">
            <h5 class="card-title ">BUSINESSES</h5>
            </div>
        </div>
        <div class="card onclick=location.href='/products'">
            <a href="/products">
                <img src="https://image.flaticon.com/icons/svg/1046/1046788.svg" width="200" height="200" class="card-img-top" alt="...">
            </a>
            <div class="card-body mx-auto">
            <h5 class="card-title">PRODUCTS</h5>

            </div>
        </div>
        <div class="card onclick=location.href='/orders'">
            <a href="/orders">
                <img src="https://image.flaticon.com/icons/svg/950/950258.svg" width="200" height="200" class="card-img-top" alt="...">
            </a>
            <div class="card-body mx-auto">
            <h5 class="card-title">ORDERS</h5>

            </div>
        </div>
        <div class="card onclick=location.href='/delivers'">
            <a href="/delivers">
                <img src="https://image.flaticon.com/icons/svg/2467/2467098.svg" width="200" height="200" class="card-img-top" alt="...">
            </a>
            <div class="card-body mx-auto">
            <h5 class="card-title ">DELIVERS</h5>
            </div>
        </div>
    </div>
</div>
@endsection
