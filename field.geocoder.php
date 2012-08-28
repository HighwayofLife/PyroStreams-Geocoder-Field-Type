<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * PyroStreams Geocoder Field Type
 *
 * Generate longitude and latitude from a specified location
 *
 * @package		PyroStreams
 * @author		David Lewis
 * @copyright	Copyright (c) 2012, David Lewis
 */

class Field_geocoder
{

	public $field_type_slug			= 'geocoder';

	public $db_col_type				= 'varchar';

	public $version					= '1.0.0';

	public $author					= array('name' => 'David Lewis', 'url' => 'http://jedihorsemanship.com');

	// --------------------------------------------------------------------------

	/**
	 * Output form input
	 *
	 * @access	public
	 * @param $data	array
	 * @return	string
	 */
	public function form_output($data)
	{
		$options = array(
			'name'  => $data['form_slug'],
			'id'    => $data['form_slug'],
			'value' => $data['value'],
			'type'  => 'hidden',
		);

		$l_failed = $this->CI->lang->line('streams.geocoder.geocoder_error');

		$value = ($data['value']) ? 1 : 0;

		$js = <<<EOF
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script>
var geocoder, map, marker;

function initialize() {
	geocoder = new google.maps.Geocoder();
	var latlng = new google.maps.LatLng(46.40040890, -117.00118890);
	var mapOptions = {
		zoom: 5,
		center: latlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	map = new google.maps.Map(document.getElementById('{$data['form_slug']}_map'), mapOptions);
	if ($value) {
		mapLocation();
	}
}

function mapLocation() {
	var address = $('#{$data['form_slug']}_input').val();
	if (!address) {
		return;
	}
	geocoder.geocode({ 'address': address }, function(results, status) {
		if (status == google.maps.GeocoderStatus.OK) {
			if (marker) {
				marker.setMap(null);
			}
			loc = results[0].geometry.location;
			$('#{$data['form_slug']}').val(loc.toUrlValue());
			$('#{$data['form_slug']}_error').text('');
			map.setCenter(loc);
			map.setZoom(9);
			marker = new google.maps.Marker({
				map: map,
				title: address,
				position: loc
			});
		} else {
			$('#{$data['form_slug']}_error').text('$l_failed: ' + status);
		}
	});
}

$(document).ready(function() {
	initialize();
	$('#{$data['form_slug']}_input')
		.data('timeout', null)
		.keyup(function() {
			clearTimeout($(this).data('timeout'));
			$(this).data('timeout', setTimeout(mapLocation, 600));
		});
});

</script>
<div id="{$data['form_slug']}_map" class="stream_map" style="width: 450px; height: 300px;"></div>
<div id="{$data['form_slug']}_error" class="stream_map_error"></div>
EOF;
		$options_input = array(
			'id'    => $data['form_slug'].'_input',
			'value' => $data['value'],
			'type'  => 'text',
		);
		return form_input($options).form_input($options_input).$js;
	}

	// --------------------------------------------------------------------------

	/**
	 * Tag output variables
	 *
	 * Outputs 'latitude' & 'longitude' variables
	 *
	 * @access 	public
	 * @param	string
	 * @param	array
	 * @return	array
	 */
	public function pre_output_plugin($input)
	{
		if ( ! $input) return null;
	
		$pieces = explode(',', $input);

		if (count($pieces) != 2) return null;

		return array('latitude' => trim($pieces[0]), 'longitude' => $pieces[1]);
	}

}
