@extends('layouts.app')

@section('space')
@include('layouts.secondNav',['title'=>'Simulator: Menu'])
@endsection

@section('script')
<script src="{{ asset('js/menuCarrito.js') }} " defer></script>
@endsection

@section('content')
<div class="container">
    <a href="{{ route('simulator.comanda.orderStatus',['order' => $order ?? '']) }}" class="btn btn-success">
        See status</a>
    </form>
    <form method="POST" action="{{ route('simulator.comanda.makePaid',['order' => $order ?? '']) }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <button class="btn btn-success" type="submit">PAY</button>
    </form>
</div>
@endsection