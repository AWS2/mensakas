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
