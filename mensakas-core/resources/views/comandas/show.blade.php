@extends('layouts.app')

@section('content')
    
<div >
    <div class="row">
        <div class="form-row">
            <div class="col-6 mx-auto">
                <div class="h3" style="opacity:0.7">Comanda</div>
                <label for="ticket"><strong>Ticket:</strong></strong></label>
                <p id="ticket">{{$comanda->ticket_json}}</p>
            </div>
        </div>
        @if (isset($comanda->customerAddress->customer))
            <div class="col-6 mx-auto">
                <div class="h3" style="opacity:0.7">Customer</div>
                <div class="form-row">
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
            
        <div class="col-10 mx-auto row">
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

@endsection
