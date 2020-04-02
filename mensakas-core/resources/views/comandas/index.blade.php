@extends('layouts.app')

@section('space')
@include('layouts.secondNav', ['title' => 'Orders'])
@endsection

@section('script')
<script src="{{ asset('js/allOrders.js') }}"></script>
@endsection

@section('content')
<div class="table d-flex justify-content-center">
  <div class="">
    <table>
      <tr id="header">
        <td></td>
        <td><strong>Customer Email</strong></td>
        <td><strong>Order Status</strong></td>
        <td><strong>Rider</strong></td>
        <td><strong>Amount</strong></td>
        <td><strong>Additional Message</strong></td>
      </tr>
      <!-- generated with js -->

    </table>
  </div>
</div>
@endsection
