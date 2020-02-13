@extends('layouts.app')

@section('content')
<div class="table d-flex justify-content-center">
    <div class="">
        <table>
            <tr>
                <td></td>
                <td><strong>Customer Email</strong></td>
                <td><strong>Order Status</strong></td>
                <td><strong>Deliverer</strong></td>
                <td></td>
            </tr>
            @foreach($comandas as $comanda)
            <tr>
                <td>
                    <form action="{{route('comandas.show', ['comanda'=>$comanda->id])}}" method="get">
                        <input type="submit" value="+" class="btn btn-success">
                    </form>
                </td>
                <td>{{$comanda->customerAddress->customer->email ?? 'deleted user'}}</td>
                <td>{{$comanda->order->orderStatus->status->status ?? 'without status'}}</td>
                <td>{{$comanda->order->delivery->rider->username ?? ''}}</td>
                <td>
                    <form action="{{route('comandas.edit', ['comanda'=>$comanda->id])}}" method="get">
                        <input type="submit" value="Edit" class="btn btn-warning">
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
