@extends('layouts.app')

@section('space')
@include('layouts.secondNav', ['title' => 'Simulator: geolocation rider'])
@endsection

@section('script')
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
        <a href="{{ URL::previous() }}" class="btn btn-success">Back</a>
    </div>

    <input type="hidden" id="lat" name="lat" value="">
    <input type="hidden" id="lon" name="lon" value="">
</div>

@endsection
