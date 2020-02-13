@extends('layouts.app')

@section('space')
    @include('layouts.secondNav', ['title' => 'Edit Order'])
@endsection

@section('content')

<div>
    <form action="{{route('comandas.update', ['comanda'=>$comanda])}}" method="post">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="h3" style="opacity:0.7">Comanda</div>
                <label for="ticket"><strong>Ticket:</strong></strong></label>
                <div class="form-row">
                    <textarea name="ticket_json" id="ticket"  cols=50 rows=10>{{$comanda->ticket_json}}</textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6 mx-auto">
                    <div class="h3" style="opacity:0.7">Status</div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="message"><strong>Message:</strong></label>
                        <input type="text" name="message" id="message" value="{{$comanda->order->orderStatus->message ?? ''}}">
                        </div>
                        <div class="form-group col-md-4">
                            {{-- <label for="status"><strong>Status:</strong></label> --}}
                            {{-- <input name="status" id="status">{{ $comanda->order->orderStatus->status->status ?? 'status not info'}}</p> --}}
                            <input type="hidden" name="status_id" value="1">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 mx-auto row">
                <div class="mr-2">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                </form>
                <div >
                <form action="{{route('customers.index')}}" method="get">
                    <button type="submit" class="btn btn-success">Back</button>
                </form>
            </div>
        </div>
    </form>
</div>
@endsection