@extends('layouts.app')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">

  function acceptOrder(element, id_rider, id_order) {
    $.ajax({
      type: 'GET',
      url: '/acceptOrder',
      data: {
        id_rider: id_rider,
        id_order: id_order
      },
      datatype: 'json',
      success: function () {
        alert("Order accepted!");
      },
      fail: function() {
        alert("Sorry, this action isn't possible now. Try again in a few minutes.");
      }
    });
  }

  $(document).ready(updateInfo);

  function updateInfo(){
      $("#info").load(location.href+" #info>*","");
  }

  setInterval(updateInfo, 2500);
</script>
@section('space')
@include('layouts.secondNav', ['title' => 'Simulador: select a job'])
@endsection

@section('content')
<div id="info" class="table d-flex justify-content-center">
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
                    {{-- <form action="{{route('simulator.rider.setjob')}}" method="post"> --}}

                        {{-- <input type="hidden" name="rider_id" value="{{$rider->id}}"> --}}
                        {{-- <input type="hidden" name="order_id" value="{{$order->id}}"> --}}
                        <button type="submit" class="btn btn-success" onclick="acceptOrder(this, {{$rider->id}}, {{$order->id}})">Accept</button>
                    {{-- </form> --}}
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
