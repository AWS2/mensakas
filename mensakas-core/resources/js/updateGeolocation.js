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


function updateGeo() {
  var longitude = $('.lon').val();
  var latitude = $('.lat').val();
  var id_rider = $('.id').val();
  $.ajax({
    type: 'POST',
    url: 'api/geolocation/'+id_rider,
    beforeSend: function (xhr) {
      var token = $('meta[name="csrf_token"]').attr('content');
      if (token) {
        return xhr.setRequestHeader('X-CSRF-TOKEN', token);
      }
    },
    data: {
      '_method': 'PUT',
      'latitude': latitude,
      'longitude': longitude
    },
    success: function (data) {
        console.log(data);
    }
  });
}
setInterval( function(){ updateGeo() },10000);
