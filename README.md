# PyroStreams Geocoder Field Type v1.1.0

This field type allows you to specify a geographic location which will be converted to latitude and longitude coordinates, these coordinates can then be used in the any Map API.
Geocoding is the process of converting addresses (like "1600 Amphitheatre Parkway, Mountain View, CA") into geographic coordinates (like latitude 37.423021 and longitude -122.083739), which you can use to place markers or position the map. This Geocoding Field Type provides a direct way to access a geocoder via an HTTP request. When this field type is added to a stream, you can specify an address, location or coordinates into the text field and this information will be returned and saved as longitude/latitude coordinates in real time.

Audience: This field type is intended for people who want to use geocoding data within maps provided by one of the Google Maps APIs.
For front-end usage examples, see [Front End Usage](http://github.com/HighwayofLife/PyroStreams-Geocoder-Field-Type/wiki/Front-End-Usage).

## Installation

 * [Download the latest release](http://github.com/HighwayofLife/PyroStreams-Geocoder-Field-Type/tags).
 * or clone the repo: `git clone git://github.com/HighwayofLife/PyroStreams-Geocoder-Field-Type.git`
 * Copy the contents of this directory to either `addons/<site-ref>/field_types/` or `addons/shared_addons/field_types/`

## Usage

After being assigned to a stream, you can specify any geographic location in the field and a map will appear showing the location. The geographic location is then saved as latitude and longitude coordinates.

This field type will return latitude and longitude variables for use in your templates:

	{{ field_slug:latitude }}
	{{ field_slug:longitude }}

## Documentation

 * [Documentation](http://github.com/HighwayofLife/PyroStreams-Geocoder-Field-Type/wiki)

## Bugs & Feature Requests

 * [Issue tracker](http://github.com/HighwayofLife/PyroStreams-Geocoder-Field-Type/issues)

## Contributing

 * [Fork us on github!](http://github.com/HighwayofLife/PyroStreams-Geocoder-Field-Type)
 * Send us a pull request

## Changelog

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

