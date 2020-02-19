@extends('layouts.app')

@section('space')
@include('layouts.secondNav',['title'=>'Estado del pedido'])
@endsection

@section('content')
<link href="{{ asset('css/orderStatus.css') }}" rel="stylesheet">
<div class="container px-1 px-md-4 py-5 mx-auto">
    <div class="card">
        <div class="row d-flex justify-content-between px-3 top">
            <div class="d-flex">
                <h5>ORDER <span class="text-primary font-weight-bold">#{{$order->id}}</span></h5>
            </div>
            <div class="d-flex flex-column text-sm-right">
                <p class="mb-0">Expected Arrival: <span>{{$order->estimate_time ?? 'Not informed yet'}}</span></p>
            </div>
        </div> <!-- Add class 'active' to progress -->
        <div class="row d-flex justify-content-center">
            <div class="col-12">
                @switch($order->orderStatus->status_id)
                @case(2)
                <ul id="progressbar" class="text-center">
                    <li class="active step0"></li>
                    <li class="step0"></li>
                    <li class="step0"></li>
                    <li class="step0"></li>
                </ul>
                @break
                @case(3)
                <ul id="progressbar" class="text-center">
                    <li class="active step0"></li>
                    <li class="active step0"></li>
                    <li class="step0"></li>
                    <li class="step0"></li>
                </ul>
                @break
                @case(4)
                <ul id="progressbar" class="text-center">
                    <li class="active step0"></li>
                    <li class="active step0"></li>
                    <li class="active step0"></li>
                    <li class="step0"></li>
                </ul>
                @break
                @case(5)
                <ul id="progressbar" class="text-center">
                    <li class="active step0"></li>
                    <li class="active step0"></li>
                    <li class="active step0"></li>
                    <li class="active step0"></li>
                </ul>
                @break
                @default
                <ul id="progressbar" class="text-center">
                    <li class="step0"></li>
                    <li class="step0"></li>
                    <li class="step0"></li>
                    <li class="step0"></li>
                </ul>

                @endswitch
            </div>
        </div>
        <div class="row justify-content-between top">
            <div class="row d-flex icon-content"> <img class="icon"
                    src="https://image.flaticon.com/icons/svg/1019/1019709.svg">
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Order<br>Confirmed</p>
                </div>
            </div>
            <div class="row d-flex icon-content"> <img class="icon"
                    src="https://image.flaticon.com/icons/svg/649/649395.svg">
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Order<br>preparing</p>
                </div>
            </div>
            <div class="row d-flex icon-content"> <img class="icon"
                    src="https://image.flaticon.com/icons/svg/1920/1920607.svg">
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Order<br>En Route</p>
                </div>
            </div>
            <div class="row d-flex icon-content"> <img class="icon"
                    src="https://image.flaticon.com/icons/svg/1647/1647680.svg">
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Order<br>Arrived</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection