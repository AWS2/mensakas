@extends('layouts.app')

@section('space')
    @include('layouts.secondNav', ['title' => 'Rider'])
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
            <div class="from-row" id="map" style="height: 300px; border-radius: 10px;">
              @section('script')
                  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
                  <script>
                      function main(){

                        function localizacion(posicion){
                          //var latitude = posicion.coords.latitude;
                          //var longitude = posicion.coords.longitude;
                          var latitude = 41.355825;
                          var longitude = 2.077628;

                          var myLatLng = {lat: latitude, lng: longitude};
                          var mapOptions = {
                            zoom:15,
                            center:myLatLng
                          }

                          var map = new google.maps.Map(document.getElementById('map'), mapOptions);

                          var marker = new google.maps.Marker({
                            position: myLatLng,
                            map: map,
                            title: 'My location'
                          });
                        }

                        function error(){
                          output.innerHTML = "<p>No se pudo obtener tu ubicación</p>";
                        }

                        navigator.geolocation.getCurrentPosition(localizacion,error);
                      }

                      google.maps.event.addDomListener(window, 'load', main);
                  </script>
              @endsection
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
