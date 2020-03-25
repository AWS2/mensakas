@extends('layouts.app')

@section('space')
@include('layouts.secondNav', ['title' => 'Simulator: select a rider'])
@endsection

@section('script')
    <script>
        function updateGeolocation(){
            function localizacion(posicion){
                var latitude = posicion.coords.latitude;
                var longitude = posicion.coords.longitude;

                console.log(latitude);
                console.log(longitude);
                $('.lat').val(latitude);
                $('.lon').val(longitude);
            }

            function error(){
              output.innerHTML = "<p>No se pudo obtener tu ubicación</p>";
            }

            navigator.geolocation.getCurrentPosition(localizacion,error);
        }

        google.maps.event.addDomListener(window, 'load', updateGeolocation);
    </script>
@endsection

@section('content')
<div class="table d-flex justify-content-center">

    <div class="">
        <table>
            <tr>
                <td></td>
                <td></td>
                <td><strong>Name</strong></td>
                <td><strong>Last name</strong></td>
                <td><strong>Username</strong></td>
            </tr>

            @foreach($riders as $rider)
            <tr>
                <td>
                    <form action="{{route('simulator.rider.createGeolocation', ['rider'=>$rider['id']])}}" method="post">
                        <input type="hidden" class="lat" name="lat" value="">
                        <input type="hidden" class="lon" name="lon" value="">
                        <button type="submit" class="btn btn-success">Geo</button>
                    </form>
                </td>
                <td>
                    <form action="{{route('simulator.rider.jobs', ['rider'=>$rider])}}" method="get">
                        <button type="submit" class="btn btn-success">Select</button>
                    </form>

                </td>
                <td>{{$rider->first_name}}</td>
                <td>{{$rider->last_name}}</td>
                <td>{{$rider->username}}</td>
            </tr>
            @endforeach
        </table>
    </div>

</div>
@endsection
