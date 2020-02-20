@extends('layouts.app')

@section('space')
    @include('layouts.secondNav', ['title' => 'Orders'])
@endsection

@section('content')
<div class="table d-flex justify-content-center">
    <div class="">
        <table>
            <tr>
                <td></td>
                <td><strong>Customer Email</strong></td>
                <td><strong>Order Status</strong></td>
                <td><strong>Rider</strong></td>
                <td><strong>Amount</strong></td>
                <td><strong>Additional Message</strong></td>
                <td></td>
            </tr>
            @foreach($comandas as $comanda)
            <tr>
                <td>
                    <form action="{{route('comandas.show', ['comanda'=>$comanda->id])}}" method="get">
                        <button type="submit" class="btn btn-success fa fa-search"></button>
                    </form>
                </td>
                <td>{{$comanda->customerAddress->customer->email ?? 'deleted user'}}</td>
                <td>{{$comanda->order->orderStatus->status->status ?? 'without status'}}</td>
                <td>{{$comanda->order->delivery->rider->username ?? ''}}</td>
                <td>{{$comanda->order->payment->amount ?? ''}}</td>
                <td>{{$comanda->order->orderStatus->message ?? ''}}</td>
                <td>
                    <form action="{{route('comandas.edit', ['comanda'=>$comanda->id])}}" method="get">
                        <button type="submit" value="Edit" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</button>                        
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
