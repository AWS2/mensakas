function updateGeolocation(){
  var id_rider = $('#id_rider').val();

  function localizacion(posicion){
    var latitude = posicion.coords.latitude;
    var longitude = posicion.coords.longitude;

    var myLatLng = {lat: latitude, lng: longitude};
    var mapOptions = {
      zoom:17,
      center:myLatLng
    }

    var map = new google.maps.Map(document.getElementById('map'), mapOptions);

    var marker = new google.maps.Marker({
      position: myLatLng,
      map: map,
      title: 'My location'
    });

    console.log(latitude);
    console.log(longitude);
    document.getElementById('lat').value = latitude;
    document.getElementById('lon').value = longitude;
  }

  function error(){
    output.innerHTML = "<p>No se pudo obtener tu ubicación</p>";
  }

  navigator.geolocation.getCurrentPosition(localizacion,error);
}

google.maps.event.addDomListener(window, 'load', updateGeolocation);

//refresh to 10 seconds
setInterval( function(){ updateGeolocation() },10000 );