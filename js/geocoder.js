var geocoder, map, marker, field_slug;

function initialize(form_slug) {
  field_slug = form_slug;
  geocoder = new google.maps.Geocoder();
  var latlng = new google.maps.LatLng(40, -100);
  var mapOptions = {
    zoom: 3,
    center: latlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  map = new google.maps.Map(document.getElementById(field_slug+'_map'), mapOptions);

  var input = $('#'+field_slug+'_input');

  input.data('timeout', null)
    .keyup(function() {
      clearTimeout($(this).data('timeout'));
      $(this).data('timeout', setTimeout(mapLocation, 600));
  });

  mapLocation();
}

function mapLocation() {
  var address = $('#'+field_slug+'_input').val();
  if (!address) {
    return;
  }

  geocoder.geocode({ 'address': address }, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      if (marker) {
        marker.setMap(null);
      }

      loc = results[0].geometry.location;
      updateMarkerPosition(loc);
      map.setCenter(loc);
      map.setZoom(9);
      marker = new google.maps.Marker({
        map: map,
        draggable: true,
        position: loc
      });

      google.maps.event.addListener(marker, 'dragend', function() {
        updateMarkerPosition(marker.getPosition());
      });
    } else {
      $('#'+field_slug+'_msg').addClass('msg_error').text('Obtaining location failed: '+status);
    }
  });
}

function updateMarkerPosition(loc) {
  $('#'+field_slug).val(loc.toUrlValue());
  $('#'+field_slug+'_msg').removeClass('msg_error').text('Updated location: '+loc.toUrlValue());
}

