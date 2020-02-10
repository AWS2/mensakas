@extends('layouts.app')

@section('content')

<div class="mt-5 pt-5 border">
    <div class="card-deck ml-3 mr-3 pt-4">

        <div class="card border" onclick="location.href='/users'">
            <a href="/users">
                <img src="https://picsum.photos/200/200?random=1" width="200" height="200" class="card-img-top" alt="...">
            </a>
            <div class="card-body mx-auto">
                <strong><h5 class="">USERS</h5></strong>
                <!-- <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
            </div>
        </div>
        <div class="card onclick=location.href='/businesses'">
            <a href="/businesses">
                <img src="https://picsum.photos/200/200?random=2" width="200" height="200" class="card-img-top" alt="...">
            </a>
            <div class="card-body mx-auto">
            <h5 class="card-title ">BUSINESSES</h5>
            <!-- <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p> -->
            </div>
        </div>
        <div class="card onclick=location.href='/products'">
            <a href="/products">
                <img src="https://picsum.photos/200/200?random=3" width="200" height="200" class="card-img-top" alt="...">
            </a>
            <div class="card-body mx-auto">
            <h5 class="card-title">PRODUCTS</h5>
            <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p> -->

            </div>
        </div>
        <div class="card onclick=location.href='/orders'">
            <a href="/orders">
                <img src="https://picsum.photos/200/200?random=4" width="200" height="200" class="card-img-top" alt="...">
            </a>
            <div class="card-body mx-auto">
            <h5 class="card-title">ORDERS</h5>
            <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p> -->

            </div>
        </div>
        <div class="card onclick=location.href='/delivers'">
            <a href="/delivers">
                <img src="https://picsum.photos/200/200?random=2" width="200" height="200" class="card-img-top" alt="...">
            </a>
            <div class="card-body mx-auto">
            <h5 class="card-title ">DELIVERS</h5>
            <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p> -->

            </div>
        </div>
    </div>
</div>
@endsection
