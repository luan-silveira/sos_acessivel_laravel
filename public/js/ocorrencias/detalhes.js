function initMap() {

  var position = {lat: -25.344, lng: 131.036};

  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 4, center: position});

  var marker = new google.maps.Marker({position: position, map: map});
}