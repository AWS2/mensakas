@extends('layouts.app')

@section('space')
@include('layouts.secondNav',['title'=>'Simulator: Menu'])
@endsection

@section('script')
<script src="{{ asset('js/menuCarrito.js') }} " defer></script>
@endsection

@section('content')
<div class="container">

    <div class="border" style="background-color: white;">
        <div class="d-flex justify-content-center mt-5">
            <label for=""><strong>simulating payment information</strong></label>
        </div>
        <div class="d-flex justify-content-center mt-2 mb-5">
            <div class="spinner-border text-success" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
    <div class="row mt-3 ml-2">
        <div class="mr-2">
            <a href="{{ route('simulator.comanda.orderStatus',['order' => $order ?? '']) }}" class="btn btn-success">
                See status</a>
            </form>
        </div>
        <div>
            <form method="POST" action="{{ route('simulator.comanda.makePaid',['order' => $order ?? '']) }}">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <button class="btn btn-success" type="submit">PAY</button>
            </form>
        </div>
    </div>


</div>
@endsection