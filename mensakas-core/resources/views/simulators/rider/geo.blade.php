@extends('layouts.app')

@section('space')
@include('layouts.secondNav', ['title' => 'Simulator: geolocation rider'])
@endsection

@section('script')
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
    <script src="{{ asset('js/updateGeolocation.js') }}"></script>
@endsection

@section('content')

<div>
    <div class="row d-flex justify-content-center">
            <h3>Rider: {{$rider->first_name}}</h3>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-6">
            <input type="hidden" id='id_rider' name="" value="{{$rider->id}}">
            <div class="from-row" id="map" style="height: 300px; border-radius: 10px;"></div>
        </div>
    </div>
    <div class="row d-flex justify-content-center" style="margin-top:15px">
        <form action="{{route('simulator.rider.endGeolocation', ['rider'=>$rider['id']])}}" method="post">
            <button type="submit" class="btn btn-success">End</button>
        </form>
    </div>


    <input type="hidden" class="lat" name="latitude" >
    <input type="hidden" class="lon" name="longitude" >
    <input type="hidden" class="id" name="id_rider_v" value="{{$rider['id']}}">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">



</div>
@endsection
