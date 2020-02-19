@extends('layouts.app')

@section('space')
@include('layouts.secondNav', ['title' => 'Simulator: Order Status'])
@endsection

@section('content')

@php($comanda = $order->comanda)

@if (isset($comanda->order->orderStatus))
<div class="col-6 mx-auto border-top">
    <div class="h3 mt-2" style="opacity:0.7">Status</div>
    <div class="row">
        <div class="form-group col-md-4">
            <label for="status"><strong>Status:</strong></label>
            <p id="status">{{ $comanda->order->orderStatus->status->status ?? 'status not info'}}</p>
        </div>
        <div class="form-group col-md-4">
            <label for="message"><strong>Message:</strong></label>
            <p id="message">{{$comanda->order->orderStatus->message ?? 'no additional info'}}</p>
        </div>
    </div>
</div>
@endif

@if (isset($comanda->customerAddress->customer))
<div class="col-6 mx-auto border-top">
    <div class="h3 mt-2" style="opacity:0.7">Customer</div>
    <div class="row">
        <div class="form-group col-md-4">
            <label for="mail"><strong>Customer email:</strong></label>
            <p id="mail">{{ $comanda->customerAddress->customer->email }}</p>
        </div>
        <div class="form-group col-md-4">
            <label for="address"><strong>Address:</strong></label>
            <p id="address">{{$comanda->customerAddress->street}} {{$comanda->customerAddress->city}}</p>
        </div>
        <div class="form-group col-md-4">
            <form action="{{route('customers.show', ['customer'=>$comanda->customerAddress->customer->id])}}"
                method="get">
                <button type="submit" class="btn btn-success fa fa-search btn-block"> Customer Info</button>
            </form>
        </div>
    </div>
</div>
@endif

<div class="col-6 mx-auto">
    <div class="row">

        @if ($order->orderStatus->status_id <= 2) <div>
            The business does not start preapring the order yet
    </div>
    @elseif($order->orderStatus->status_id == 3)
    <div>
        <form action="{{route('simulator.rider.changeStatus', ['comanda'=>$comanda->id])}}" method="post">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <input type="hidden" name="order_id" value="{{$order->id}}">
            <input type="hidden" name="status_id" value="4">
            <button type="submit" value="Edit" class="btn btn-success">Collected!</button>
        </form>
    </div>
    @elseif($order->orderStatus->status_id == 4)
    <div>
        <form action="{{route('simulator.rider.changeStatus', ['comanda'=>$comanda->id])}}" method="post">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <input type="hidden" name="order_id" value="{{$order->id}}">
            <input type="hidden" name="status_id" value="5">
            <button type="submit" value="Edit" class="btn btn-success">Delivered!</button>
        </form>
    </div>
    @else
    <div>Order delivered!</div>
    @endif
</div>
</div>

@endsection