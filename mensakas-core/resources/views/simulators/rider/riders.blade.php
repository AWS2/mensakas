@extends('layouts.app')

@section('space')
@include('layouts.secondNav', ['title' => 'Simulator: select a rider'])
@endsection

@section('script')
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
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
            navigator.geolocation.getCurrentPosition(localizacion);
        }

        google.maps.event.addDomListener(window, 'load', updateGeolocation);

        $(document).ready(getAllDataRidersAPI);

        function getAllDataRidersAPI(){
            $.ajax({
                type: 'GET',
                url: '/api/rider',
                dataType: 'json',
                success: function(data) {
                    var jsonDataRiders = data['data'];
                    addDataTable(jsonDataRiders);
                }
            });
        }

        function addDataTable (jsonDataRiders) {
            $.each(jsonDataRiders,function(index, value) {
                if (value.active == 1) {
                    $('#tr'+value.id).append('<td>'+value.first_name+'</td>');
                    $('#tr'+value.id).append('<td>'+value.last_name+'</td>');
                    $('#tr'+value.id).append('<td>'+value.username+'</td>');
                }else if (value.active == 0){
                    $('#tr'+value.id).toggle();
                }
            });
        }
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
            <tr id="tr{{$rider['id']}}">
                <td>
                    <form action="{{route('simulator.rider.updateGeolocation', ['rider'=>$rider['id']])}}" method="post">
                        <input type="hidden" class="lat" name="lat" value="">
                        <input type="hidden" class="lon" name="lon" value="">
                        <input type="hidden" class="id" name="id_rider_v" value="{{$rider['id']}}">
                        <button type="submit" class="btn btn-success">Geo</button>
                    </form>
                </td>
                <td>
                    <form action="{{route('simulator.rider.jobs', ['rider'=>$rider])}}" method="get">
                        <button type="submit" class="btn btn-success">Select</button>
                    </form>

                </td>
            </tr>
            @endforeach
        </table>
    </div>

</div>
@endsection
