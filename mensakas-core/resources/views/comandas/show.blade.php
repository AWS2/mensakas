@extends('layouts.app')

@section('space')
    @include('layouts.secondNav', ['title' => 'Order'])
@endsection

@section('content')
    
<div >
        <div class="col-6 mx-auto">
            <div class="h3" style="opacity:0.7">Comanda</div>
            <div class="form-row">
                <label for="ticket"><strong>Ticket:</strong></strong></label>
                <p id="ticket">{{$comanda->ticket_json}}</p>
            </div>
        </div>

        @if (isset($comanda->order->orderStatus))
            <div class="col-6 mx-auto">
                <div class="h3" style="opacity:0.7">Status</div>
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
            <div class="col-6 mx-auto">
                <div class="h3" style="opacity:0.7">Customer</div>
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
                        <form action="{{route('customers.show', ['customer'=>$comanda->customerAddress->customer->id])}}" method="get">
                            <input type="submit" value="View Customer" class="btn btn-success">
                        </form>
                    </div>
                </div>
            </div>
        @endif

        @if (isset($comanda->order->delivery->rider))
            <div class="col-6 mx-auto">
                <div class="h3" style="opacity:0.7">Rider</div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="username"><strong>Username:</strong></label>
                        <p id="username">{{ $comanda->order->delivery->rider->username }}</p>
                    </div>
                    <div class="form-group col-md-4">
                        <form action="{{route('riders.show', ['rider'=>$comanda->order->delivery->rider->id])}}" method="get">
                            <input type="submit" value="View Rider" class="btn btn-success">
                        </form>
                    </div>
                </div>
            </div>
        @endif

        @if (isset($comanda->order->payment))
            <div class="col-6 mx-auto">
                <div class="h3" style="opacity:0.7">Payment</div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="amount"><strong>Amount:</strong></label>
                        <p id="amount">{{ $comanda->order->payment->amount ?? 'not informed'}}</p>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="message"><strong>Status:</strong></label>
                        <p id="message">{{$comanda->order->payment->status ?? 'no additional info'}}</p>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="token"><strong>Token:</strong></label>
                        <p id="token">{{$comanda->order->payment->token ?? 'token not informed'}}</p>
                    </div>
                </div>
            </div>
        @endif
        
        <div class="col-6 mx-auto">
            <div class="row">
                <div class="mr-2">
                    <form action="{{route('comandas.edit', ['comanda'=>$comanda->id])}}" method="get">
                        <button type="submit" class="btn btn-warning">Edit</button>
                    </form>
                </div>
                <div>
                <form action="{{route('comandas.index')}}" method="get">
                    <button type="submit" class="btn btn-success">Back</button>
                </form>
                </div>
            </div>
        </div>
</div>

@endsection
