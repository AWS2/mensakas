@extends('layouts.app')

@section('space')
@include('layouts.secondNav', ['title' => 'Simulador: select a job'])
@endsection

@section('content')
<div class="table d-flex justify-content-center">
    <div class="">
        <table>
            <tr>
                <td></td>
                <td></td>
                <td><strong>Customer Address</strong></td>
                <td><strong>Time</strong></td>
                <td><strong>Order Status</strong></td>
                <td><strong>Additional Message</strong></td>
            </tr>
            @foreach($orders as $order)
            <tr>
                <td>
                    <form action="{{route('simulator.rider.setjob')}}" method="post">
                        @csrf
                        <input type="hidden" name="rider_id" value="{{$rider->id}}">
                        <input type="hidden" name="order_id" value="{{$order->id}}">
                        <button type="submit" class="btn btn-success">Accept</button>
                    </form>
                </td>
                <td>#{{$order->id}}</td>
                <td>{{$order->comanda->customerAddress->street ?? 'user address'}}</td>
                <td>{{$order->estimate_time}}</td>
                <td>{{$order->orderStatus->status->status ?? 'without status'}}</td>
                <td>{{$order->orderStatus->message ?? ''}}</td>
            </tr>
            @endforeach
        </table>

    </div>
</div>
@endsection