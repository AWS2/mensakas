@extends('layouts.app')

@section('space')
@include('layouts.secondNav', ['title' => 'Order'])
@endsection

@section('script')
  @if ($order->orderStatus->status_id == 2)
  <script src="{{asset('js/business/accept.js')}}" defer></script>
  @endif
@endsection

@section('content')

@php($comanda = $order->comanda)
<div class="modal fade" id="loadingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <img src="{{ asset('spin-1s-200px.svg') }}" alt="Loading" style="margin: 0 auto">
  </div>
</div>
<div>
    <div class="col-6 mx-auto">
        <div class="h3" style="opacity:0.7">Comanda</div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="ticket"><strong>Ticket:</strong></strong></label>
                <p id="ticket">{{$comanda->ticket_json}}</p>
            </div>
        </div>
    </div>

    @if (isset($order->orderStatus))
    <div class="col-6 mx-auto border-top">
        <div class="h3 mt-2" style="opacity:0.7">Status</div>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="status"><strong>Status:</strong></label>
                <p id="status">{{ $order->orderStatus->status->status ?? 'status not info'}}</p>
            </div>
            <div class="form-group col-md-4">
                <label for="message"><strong>Message:</strong></label>
                <p id="message">{{$order->orderStatus->message ?? 'no additional info'}}</p>
            </div>
            <div class="form-group col-md-4">
                <label for="time"><strong>Time:</strong></label>
                <p id="time">{{$order->estimate_time ?? 'no additional info'}}</p>
            </div>
        </div>
        @if ($order->orderStatus->status_id == 1)
        <div class="form-group col-md-4">
            <p id="waiting">Waiting customer payment</p>
        </div>
        @elseif($order->orderStatus->status_id == 2)
        <form action="{{route('simulator.restaurant.preparing', ['business'=>$business,'order'=>$order])}}"
            method="post" id="acceptForm">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <input type="time" name="time" required>
            <button type="button" class="btn btn-success" id="acceptBtn">Start order!</button>
        </form>
        @elseif($order->orderStatus->status_id == 3)
        <p id="waiting">Waiting the rider</p>
        @elseif($order->orderStatus->status_id == 4)
        <p id="waiting">Order delivery</p>
        @elseif($order->orderStatus->status_id == 5)
        <p id="waiting">Delivered</p>
        @endif
    </div>
    @endif

    @if (isset($comanda->customerAddress->customer))
    <div class="col-6 mx-auto border-top mt-4">
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

    @if (isset($order->delivery->rider))
    <div class="col-6 mx-auto border-top">
        <div class="h3 mt-2" style="opacity:0.7">Rider</div>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="username"><strong>Username:</strong></label>
                <p id="username">{{ $order->delivery->rider->username }}</p>
            </div>
            <div class="form-group col-md-4">
                <label for="riderphone"><strong>Phone:</strong></label>
                <p id="riderphone">{{ $order->delivery->rider->phone }}</p>
            </div>
            <div class="form-group col-md-4">
                <form action="{{route('riders.show', ['rider'=>$order->delivery->rider->id])}}" method="get">
                    <button type="submit" class="btn btn-success fa fa-search btn-block"> Rider Info</button>
                </form>
            </div>
        </div>
    </div>
    @endif

    <div class="col-6 mx-auto">
        <div class="row mt-2 ml-1">
            <div class="mr-2">
                <a href="{{ URL::previous() }}" class="btn btn-success">Back</a>
            </div>
        </div>
    </div>
</div>

@endsection