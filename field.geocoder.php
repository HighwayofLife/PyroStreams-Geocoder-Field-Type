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
class Field_geocoder {

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
	public function form_output($data) {
	  $value = json_decode($data['value']);
		$options = array(
			'name'  => $data['form_slug'],
			'id'    => $data['form_slug'],
			'value' => $data['value'],
			'type'  => 'hidden',
		);

		$html = '<span id="'.$data['form_slug'].'_msg" class="stream_map_msg"></span>';
		$html .= '<div id="'.$data['form_slug'].'_map" class="stream_map"></div>';

		$options_input = array(
			'id'    => $data['form_slug'].'_input',
			// jhubb81 added name attribute to generated address_input to allow for proper javascript validation
			'name'	=> $data['form_slug'].'_input',
      # Check if addres exists to maintain backward compatibility
			'value' => (!empty($value->address)) ? $value->address : $data['value'],
			'type'  => 'text',
		);

		return form_input($options).form_input($options_input).$html;
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
	public function pre_output_plugin($input) {
		if ( ! $input) return null;

		$location = json_decode($input);

    # Maintain backward compatability
		if (!is_object($location)) {
      $pieces = explode(',', $input);
      if (count($pieces) != 2) return null;

      $array = array(
        'lat'     => $pieces[0],
        'lng'     => $pieces[1],
        'address' => null,
      );

      $location = (object) $array;
    }

		$data = array(
		    'latitude'  => $location->lat,
		    'longitude' => $location->lng,
		    'lat'       => $location->lat,
		    'lng'       => $location->lng,
		    'address'   => $location->address,
		);

		return $data;
	}

  /**
   * Event
   *
   * Load assets
   *
   * @access public
   * @param $field object
   * @return void
   */
   public function event($field) {
        $this->CI->type->add_misc('<script src="//maps.google.com/maps/api/js?sensor=false"></script>');
        $this->CI->type->add_js('geocoder', 'geocoder.js');
        $this->CI->type->add_css('geocoder', 'geocoder.css');
        $this->CI->type->add_misc('<script type="text/javascript">
$(document).ready(function() {
    initialize("'.$field->field_slug.'");
    $(".tabs").bind("tabsshow", function(event, ui) {
        google.maps.event.trigger(map, "resize");
        mapLocation();
    });
});
</script>');
        }
}
