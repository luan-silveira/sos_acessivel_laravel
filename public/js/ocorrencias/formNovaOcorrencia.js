$('#id_classificacao').on('change', function(e){
    console.log(e);
    var id_classificacao = e.target.value;

    $.get("ajax/" + id_classificacao, function(data) {
        console.log(data);
        $('#id_tipo').empty();
        $.each(data, function(index, obj){
            $('#id_tipo').append('<option value="' + obj.id + '">'+ obj.descricao + '</option>');
        });
    });
});

//-- GOOGLE MAPS API - GEOLOCALIZAÇÃO


function initMap() {

    var position = {lat: 0, lng: 0 };
    // The map, centered at position
    var map = new google.maps.Map(
            document.getElementById('mapa'), {zoom: 16, center: position});
    // The marker, positioned at position
    var marker = new google.maps.Marker({position: position, map: map, draggable: true});
    var infoWindow = new google.maps.InfoWindow;

      // Try HTML5 geolocation.
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {

          setLatLng(position.coords.latitude, position.coords.longitude);

          var pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
          };

          marker.setPosition(pos);
          map.setCenter(pos);
        }, function() {
          handleLocationError(true, infoWindow, map.getCenter());
        });
      } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
      }
      
      google.maps.event.addListener(marker, 'dragend', function (evt) {
            setLatLng(evt.latLng.lat(), evt.latLng.lng());
        });
  }


function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(browserHasGeolocation ?
                        'Error: The Geolocation service failed.' :
                        'Error: Your browser doesn\'t support geolocation.');
  infoWindow.open(map);
}

function setLatLng(lat, lng){
    $('#latitude').val(lat.toFixed(6));
    $('#longitude').val(lng.toFixed(6));
}

   
