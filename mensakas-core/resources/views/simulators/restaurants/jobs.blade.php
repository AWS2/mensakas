@extends('layouts.app')

@section('space')
@include('layouts.secondNav', ['title' => 'Simulator: unprepared orders'])
@endsection

@section('content')
<div class="table d-flex justify-content-center">
    <div class="">
        <table>
            <tr>
                <td></td>
                <td><strong>#</strong></td>
                <td><strong>Customer Email</strong></td>
                <td><strong>Order Status</strong></td>
                <td><strong>Amount</strong></td>
                <td><strong>Additional Message</strong></td>
            </tr>
            @foreach($orders as $order)
            <tr>
                <td>
                    <form action="{{route('simulator.restaurant.order', ['business'=>$business, 'order'=>$order])}}"
                        method="get">
                        <button type="submit" class="btn btn-success">Select</button>
                    </form>
                </td>
                <td>{{ $order->id }}</td>
                <td>{{$order->comanda->customerAddress->customer->email ?? 'deleted user'}}</td>
                <td>{{$order->orderStatus->status->status ?? 'without status'}}</td>
                <td>{{$order->payment->amount ?? ''}}</td>
                <td>{{$order->orderStatus->message ?? ''}}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection