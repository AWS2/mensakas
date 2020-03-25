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

google.maps.event.addDomListener(window, 'load', geolocation);
