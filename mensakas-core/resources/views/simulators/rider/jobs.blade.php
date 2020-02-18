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
                <td><strong>Customer Email</strong></td>
                <td><strong>Order Status</strong></td>
                <td><strong>Additional Message</strong></td>
            </tr>
            @foreach($orders as $comanda)
            <tr>
                <td>
                    <form action="{{route('simulator.rider.setjob', ['order'=>$comanda-,'rider'=>$rider])}}"
                        method="post">
                        @csrf
                        <button type="submit" class="btn btn-success fa fa-search"></button>
                    </form>
                </td>
                <td>{{$comanda->customerAddress->customer->email ?? 'deleted user'}}</td>
                <td>{{$comanda->order->orderStatus->status->status ?? 'without status'}}</td>
                <td>{{$comanda->order->orderStatus->message ?? ''}}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
