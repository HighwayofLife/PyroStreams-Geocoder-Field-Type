# PyroStreams Geocoder Field Type v1.2.1

This field type allows you to specify a geographic location which will be converted to latitude and longitude coordinates, these coordinates can then be used in the any Map API.
Geocoding is the process of converting addresses (like "1600 Amphitheatre Parkway, Mountain View, CA") into geographic coordinates (like latitude 37.423021 and longitude -122.083739), which you can use to place markers or position the map. This Geocoding Field Type provides a direct way to access a geocoder via an HTTP request. When this field type is added to a stream, you can specify an address, location or coordinates into the text field and this information will be returned and saved as longitude/latitude coordinates in real time.

Audience: This field type is intended for people who want to use geocoding data within maps provided by one of the Google Maps APIs.
For front-end usage examples, see [Front End Usage](http://github.com/HighwayofLife/PyroStreams-Geocoder-Field-Type/wiki/Front-End-Usage).

## Geocoder Field Type

Specify any geographic location in the field and a map will appear showing the location. The geographic location is then saved as an address with latitude and longitude coordinates.

## Parameters

_This field type has no parameters_

## Output

<table>
 <thead>
  <tr>
   <th>Parameter</th>
   <th>Example</th>
  </tr>
 </thead>
 <tbody>
  <tr>
   <td>`{{ field_slug:address }}`</td>
   <td>Full formatted address as returned by Google. e.g.: Portland, OR, USA</td>
  </tr>
  <tr>
   <td>`{{ field_slug:latitude }}`</td>
   <td>The latitude coordinates. e.g.: 45.5234515</td>
  </tr>
  <tr>
   <td>`{{ field_slug:lat }}`</td>
   <td>Latitude. Same as above, but shorthand.</td>
  </tr>
  <tr>
   <td>`{{ field_slug:longitude }}`</td>
   <td>The longitude coordinates. e.g.: -122.6762071</td>
  </tr>
  <tr>
   <td>`{{ field_slug:lng }}`</td>
   <td>Longitude. Same as above, but shorthand.</td>
  </tr>
</tbody>
</table>

## Documentation

 * [Documentation](http://github.com/HighwayofLife/PyroStreams-Geocoder-Field-Type/wiki)

## Installation

 * [Download the latest release](http://github.com/HighwayofLife/PyroStreams-Geocoder-Field-Type/tags).
 * or clone the repo: `git clone git://github.com/HighwayofLife/PyroStreams-Geocoder-Field-Type.git`
 * Copy the contents of this directory to either `addons/<site-ref>/field_types/` or `addons/shared_addons/field_types/`

## Bugs & Feature Requests

 * [Issue tracker](http://github.com/HighwayofLife/PyroStreams-Geocoder-Field-Type/issues)

## Contributing

 * [Fork us on github!](http://github.com/HighwayofLife/PyroStreams-Geocoder-Field-Type)
 * Send us a pull request

## Changelog

_1.2.1 - September 20, 2013_
* [Fix] Coordinates would not display latitude and longitude. Issue #7 (Thanks to Brian Humes)

_1.2.0 - April 4, 2013_

* [Feature] Now supports saving formatted address along with lat,lng coordinates
* This new feature is backward compatible with v1.1.0 and earlier of the geocoder field type

_1.1.0 - April 3, 2013_

* [Improvement] Support PyroCMS v2.2 (kerastraight)
* [Improvement] Hungarian Language (Peter Varga)
* [Improvement] SSL (HTTPS) Support for the Google Maps API JS
* [Improvement] Hard-coded language replaced by OK / Error icons (Peter Varga)
* [Fix] Tab loading properly refreshes the Google map (Peter Varga)

_1.0.1 - September 4, 2012_

* Add support for field slugs: latitude and longitude (Adam Fairholm)
* Create CSS and JS files for geocoder
* Add the ability to drag the marker
* Message feedback on success and errors

_1.0.0 - August 27, 2012_

* Initial release

## Contributors

 * [David Lewis](http://github.com/HighwayofLife) (Author)
 * [Adam Fairholm](http://github.com/adamfairholm)
 * [Peter Varga](http://github.com/peet86)
 * [kerastraight](http://github.com/kerastraight)

