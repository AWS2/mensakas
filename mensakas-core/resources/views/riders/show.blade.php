@extends('layouts.app')

@section('space')
    @include('layouts.secondNav', ['title' => 'Rider'])
@endsection

@section('script')

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
<!-- <script src="{{ asset('js/geolocation.js') }} " defer></script> -->
<script type="text/javascript">
function geolocation(){
  var id_rider = $('#id_rider').val();
  console.log(id_rider);
  $.ajax({
        type: 'GET',
        url: '/api/geolocation/'+id_rider,
        dataType: 'json',
        success: function(data) {
            localizacion(data.data[0]);
        }
  });

  function localizacion(data){
    latitude = parseFloat(data.latitude);
    longitude = parseFloat(data.longitude);
    console.log(latitude);
    console.log(longitude);
    if (isNaN(latitude) || isNaN(longitude)) {
        $('#map').text('The rider is out of service').css({"text-align":"center" , "line-height":"300px" , "font-size":"200%"});
    }else {
        var myLatLng = {lat: latitude, lng: longitude};
        var mapOptions = { zoom:15, center:myLatLng }

        var map = new google.maps.Map(document.getElementById('map'), mapOptions);

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'My location'
        });
    }
  }

  navigator.geolocation.getCurrentPosition(localizacion);
}

google.maps.event.addDomListener(window, 'load', geolocation);

</script>
@endsection

@section('content')

<div>
    <div class="row d-flex justify-content-center">
        <div class="col-6">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="first_name"><strong>Name:</strong></label>
                    <p id="first_name">{{$rider->first_name}}</p>
                </div>
                <div class="form-group col-md-6">
                    <label for="last_name"><strong>Last name:</strong></label>
                    <p id="last_name">{{$rider->last_name}}</p>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="username"><strong>Username:</strong></label>
                    <p id="username">{{$rider->username}}</p>
                </div>
                <div class="form-group col-md-6">
                    <label for="phone"><strong>Phone:</strong></label>
                    <p id="phone">{{$rider->phone}}</p>
                </div>
            </div>
            <input type="hidden" id='id_rider' name="" value="{{$rider->id}}">
            <div class="from-row" id="map" style="height: 300px; border-radius: 10px;">

            </div>
            <div class="mt-3 row">
                <div class="mr-2">
                    <a href="{{ URL::previous() }}" class="btn btn-success">Back</a>
                </div>
                <div class="mr-2">
                    <form action="{{route('riders.edit', ['rider'=>$rider])}}" method="get">
                        <button type="submit" value="Edit" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</button>
                    </form>
                </div>
                <div>
                    <form action="{{route('riders.destroy', ['rider'=>$rider])}}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i> Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
