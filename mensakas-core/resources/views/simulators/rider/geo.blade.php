@extends('layouts.app')

@section('space')
@include('layouts.secondNav', ['title' => 'Simulator: geolocation rider'])
@endsection

@section('script')
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
    <!-- <script src="{{ asset('js/updateGeolocation.js') }}"></script> -->
    <script type="text/javascript">

          function updateGeolocation(){

            function localizacion(posicion){
              var latitude = posicion.coords.latitude;
              var longitude = posicion.coords.longitude;
              $('.lat').val(latitude);
              $('.lon').val(longitude);

              var myLatLng = {lat: latitude, lng: longitude};
              var mapOptions = {zoom:17, center:myLatLng};

              var map = new google.maps.Map(document.getElementById('map'), mapOptions);

              var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: 'My location'
              });

            }

            navigator.geolocation.getCurrentPosition(localizacion);
          }

        google.maps.event.addDomListener(window, 'load', updateGeolocation);

        //refresh to 10 seconds
        setInterval( function(){ updateGeolocation() },10000 );
    </script>
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

    <form action="{{route('simulator.rider.updateGeolocation', ['rider'=>$rider['id']])}}" method="post" id='formulario'>
        <input type="hidden" class="lat" name="lat" >
        <input type="hidden" class="lon" name="lon" >
        <input type="hidden" class="id" name="id_rider_v" value="{{$rider['id']}}">
    </form>


</div>
@endsection
