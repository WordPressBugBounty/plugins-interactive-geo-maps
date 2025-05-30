=== MapGeo - Interactive Geo Maps ===
Contributors: interactivegeomaps, freemius
Tags: map, interactive map, world map, travel map, us map
Requires at least: 5.0
Tested up to: 6.8
Requires PHP: 7.0
Stable tag: 1.6.26
Donate link: https://interactivegeomaps.com
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Create interactive vector maps of the world, continents, any country in the world and specific regions, including individual US state county maps.

== Description ==

Create interactive maps with regions and coloured markers. You can display the world map, continent maps and single country maps.

[Demo](https://interactivegeomaps.com/features) | [Admin Demo](https://demo.tastewp.com/interactive-geo-maps) | [Maps](https://interactivegeomaps.com/maps/) | [Documentation](https://interactivegeomaps.com/documentation/) | [Pro](https://interactivegeomaps.com/pricing/)

= More than 250 vector maps available =
- World map (with and without Antarctica)
- World map divided by continents (different variations)
- Maps of continents and regions (Africa, Asia, Caribbean, Central America, Europe, Latin America, Middle East, North America, Oceania, South America )
- US States divided by counties (California, Texas, Florida, New York and all the others)
- Mexico county maps
- Canada county maps
- Most countries in the world, including United States of America (USA), Germany, France, United Kingdom (UK), Netherlands, Spain, Australia, Italy, Poland, South Africa, Brazil, India, Japan and many others.
- Some countries with different map variations like France, divided by regions or departments, Portugal divided by districts or municipalities, among others.

Create your first interactive map in minutes! Use it to display your visited countries map, travel map, office locations, projects map, representatives map, statistics map, data visualization map or any other thing!

[Browse Full List of Maps](https://interactivegeomaps.com/maps/)

= Features =
- Create as many maps as you want
- Responsive and cross-device
- Color countries
- Add round coloured markers
- Set hover color change
- Set click actions, like open a new window
- Choose from different map projections (Mercator, Miller, NaturalEarth1, among others)
- Select which regions to display in a map
- Exclude specific regions from a map
- Display HTML tooltips on hover
- Zoom controls and Pan

= Pro only Features =
- Colour regions and markers individually
- Change initial zoom and center
- Cluster markers
- Add Legend
- Custom images as markers
- Vector icons as markers
- Text Labels
- Display content on click outside the map
- Display content in a lightbox
- Group regions
- Create heatmaps (choropleth maps)
- Add lines connecting markers
- Overlay different maps (have US states map on world map for example)
- Populate map automatically from existing categories or Tags
- Advanced zoom options

[Features Examples](https://interactivegeomaps.com/features/) | [Go Pro](https://interactivegeomaps.com/pricing/)

The plugin generates interactive, responsive, touch-enabled SVG maps which are embedded directly into your HTML5 pages and compatible with all modern browsers and devices.

= Privacy Information & External Services =
This plugin will build the maps using the [amcharts visualization library](https://www.amcharts.com/javascript-charts/) which provides hundreds of different maps. The plugin loads some files from their CDN to build the map and display it on your page. You won't need to have a amcharts account for the maps to work. More information about their [amcharts Privacy Policy](https://www.amcharts.com/privacy-policy/).
When you first install the plugin, you can choose to [opt-in to share non-sensitive data with Freemius](https://interactivegeomaps.com/docs/opt-in-to-non-sensitive-diagnostic-tracking/), a framework we use to collect data about your WordPress installation that will help us improve the plugin. This is optional and the plugin will still work if you don't opt-in. It will not collect any data from your visitors.

== Frequently Asked Questions ==
= Do I need an amcharts account or license for the plugin to work? =
No, you won't need any license or specific account. The plugin will work out of the box.

= Do I need a Google Maps API Key for the plugin to work? =
No, you won't need one. The plugin will not use the Google Maps API. However you can add a Google Maps API Key in the settings of the plugin to enable geocoding when adding markers and therefore get the latitude and longitude directly in the plugin's administration.

= Where can I get coordinates for a marker? =
You can get the latitude and longitude needed to a add a marker to a map using sites like [GetLatLong](https://getlatlong.net/) or [LatLong.net](https://www.latlong.net/) or any other similar website. Optionally, you can add a Google Maps API Key in the settings page of the plugin and this will enable you to get the coordinates directly in the map administration panel, when adding a maker. In this case, Google's geocoding service is only used in the administration to get the coordinates, it won't be used when the map displays in your pages.

= Where can I learn how to use the plugin? =
You can visit the [documentation pages on the official website](https://interactivegeomaps.com/documentation/).

= The map is not displaying when using WP Rocket! =
You can visit this [article on how to use the plugin together with WP Rocket](https://interactivegeomaps.com/docs/using-wp-rocket-and-interactive-geo-maps/).

== Screenshots ==
1. World map example
2. Add HTML Tooltips to your maps
3. USA Map
4. US county maps example
5. World Map with coloured countries
6. Single country map
7. Administration 01
8. Administration 02
9. Administration 03
10. Administration 04

== Changelog ==

= 1.6.26 =
Update Freemius SDK to v2.12.0
Fixed bug with translation loading too early, causing a warning with php v.6.8.1

= 1.6.25 =
Security Improvements

= 1.6.24 =
Minor Improvements

= 1.6.23 =
Update Freemius SDK

= 1.6.22 =
Update Freemius SDK to v2.10.0
Fixed bug with translation loading too early, causing a warning with php v.6.7.1

= 1.6.21 =
Update Freemius SDK to v2.9.0
Update the misspelling for Rhode Island.

= 1.6.20 =
Update Freemius SDK to v2.8.0
Update docker compose commands.
Add bash scripts to help with linting.

= 1.6.19 =
Fix a bug with lightbox not displaying.

= 1.6.18 =
Small code improvements and bug fixes.
Freemius SDK update to v.2.7.2

= 1.6.17 =
Fix external search dropdown grouped label properties always showing region ids.
Update title of the settings page header.

= 1.6.16 =
Small code improvements and bug fixes.

= 1.6.15 =
Plugin rebranded name and icon added.
Small code improvements and bug fixes.

= 1.6.14 =
Small code improvements and bug fixes.

= 1.6.13 =
Fix issue with hover groups
Prevent js error on some scenarios

= 1.6.12 =
Freemius SDK update to v.2.6.2

= 1.6.11 =
Fix issue with hover on groups
Update plugin author and owner
Freemius SDK update to v.2.6.1
Fixed issues with footer content in page builders

= 1.6.10 =
Fix issue with clusters not displaying in 'all' filter
Improve search shortcode text
Remove code that prevented search from working on custom sources
Prevents error of undefined that stopped clusters from working in edg
Halve the zoom effect when drilling down

= 1.6.9 =
Fix Dropdown missing id
Update dependencies

= 1.6.8 =
Replace placeholders in content on proMap.php to allow proper merge
Keep original region name for labels in grouped regions
Replace remember tabs feature
Add space to separate elements
Selectable Lat. and Long. values with triple click

= 1.6.7 =
New Feature: add ?image parameter to single map pages to return image
Fix error that displayed on existing free maps when going Pro
Fix localization issues
Correct issues with clustered markers in drilldown and live filter
Add more checks for content filters
Replace placeholders in content

= 1.6.6 =
Fix translation path
Update dependencies

= 1.6.5 =
Fix php error when bulk deleting maps
Fix issue where tooltip from group wouldn't hide when select() was used
Add new filter for Live Filter map titles
Do not allow empty capability string, default to 'page'

= 1.6.4 =
New Feature to select existing marker for lines
New feature for highlight legend
Fix Errors on external dropdown
Fix zoom on events
Fix moving overlay elements to front

= 1.6.3 =
Update requirements

= 1.6.2 =
UAE label update to include complete name
Allow custom maps to add auto labels in a different event
Allow customJS only for "customize" cap and remove sanitize
Add more option to include regions in legend
Several placeholders improvement
Several legend fixes
Merge markers/regions with the same location.
Update vendors

= 1.6.1 =
Fix Free settings for tooltip
Correct Tennessee name in map list
Update dependencies

= 1.6.0 =
Version update

= 1.5.19 =
Improve meta texts
Update dependencies

= 1.5.18 =
Wrap text in tooltip by default
Add option for tooltip render mode
New map of spain added

= 1.5.17 =
[PRO] Allow multiple searchable properties from custom source.

= 1.5.16 =
Elementor fix
Disable wpautop
[PRO] Merge region content
[PRO] Improvements to auto labels - for custom maps
[PRO] Draggable-cursor

= 1.5.15 =
[PRO] New feature introducing Auto labels positioning
[PRO] Zoom on click improvements

= 1.5.14 =
Freemius SDK update to 2.5.5
Tested up to WordPress 6.2
Improvements when using transparent hover color
PHP 8.2 compatibility improvements
Plugin size reduction
[Pro] Fixed tooltips improvements
[Pro] Display map list improvements

= 1.5.13 =
[Pro] Prevent self map shortcode to run in actions
[Pro] Remove empty placeholders on action content template for spreadsheets

= 1.5.12 =
Map height option improvement
[Pro] Region automatic labels improvements
[Pro] Fix issues with second clicks/taps
[Pro] Fixed issues with dropdown filter

= 1.5.11 =
Empty map height issue fixed
Security Update
[Pro] Hold click actions on mobile - bug fix
[Pro] Fix live filter bug introduced in last update
[Pro] Fix grouping bug
[Pro] Fullscreen button issue on Firefox fixed
[Pro] Added option to reset auto labels positions

= 1.5.11 =
Empty map height issue fixed
Security Update
[Pro] Hold click actions on mobile - bug fix
[Pro] Fix live filter bug introduced in last update
[Pro] Fix grouping bug
[Pro] Fullscreen button issue on Firefox fixed
[Pro] Added option to reset auto labels positions

= 1.5.10 =
PHP compatibility improvements

= 1.5.9 =
Security Update

= 1.5.8 =
New maps: Mauritius, 2022 version of U.S. Congressional District maps & other map fixes
New amcharts version by default: 4.10.29
Freemius SDK update
[Pro] Changes to the way the search dropdown works

= 1.5.7 =
Bug fixes in mobile map height
Improvements in region names to code conversion
Freemius Library Update - v2.4.5
PHP 8.1 compatibility improvements
Grouping regions fixes
[Pro] Bug fixes related with the way select/fixed tooltip worked
[Pro] Live filter bug fixes


= 1.5.6 =
Tested with WP version 6.0
Small improvements to map edit screen
[Pro] Missing settings issue improved
[Pro] Pre-implementation of labels background



= 1.5.5 =
New Maps: Africa Morocco, Latvia 2021, Taiwan, Spain Provinces, France Departments (mainland + overseas)
Merges region entries with same ID
Codestar Framework Update
Option to set different map height on mobile
Edit screen tabs now remember position after update
[Pro] Action Content Template option for Other Data Sources
[Pro] Color Gradient beta support added

= 1.5.4 =
Freemius SDK Update

= 1.5.3 =
Security Update in Clone Feature
[Pro] Improvements to js methods

= 1.5.2 =
[Pro] Improvements when using JSON preview
[Pro] Group hover/hit improvements
[Pro] Improvements on markers auto labels
[Pro] Improvements on globe projection
[Pro] Improvements on globe projection

= 1.5.1 =
[Pro] Improvements when using JSON preview
[Pro] Group hover/hit improvements
[Pro] Improvements on markers auto labels

= 1.5.0 =
Codestar Framework Update
New JS public methods added

= 1.4.12 =
[Pro] Google Spreadsheets feature added as old JSON method is now deprecated
[Pro] Prepare plugin for Post Types & Meta Fields Addon

= 1.4.11 =
New Maps: Lesotho, Liberia, Regions of Uganda, French Polynesia, Province map of Ireland, World outline (whole world as a single polygon).
[Pro] Heatmap legend improvements
[Pro] Map list with label coming from dot notation property
[Pro] Custom legend html encoding bug fix
[Pro] Initial default active and hover colour option
[Pro] Bug fix on external zoom controls for mobile with drilldown enabled
[Pro] Region hover bug fix when tooltips are set to fixed
[Pro] Zoom on Click for markers zoom level improvements
[Pro] Sort dropdown entries alphabetically

= 1.4.10 =
[Pro] Improved zoom effect for click action to open specific map
[Pro] Toggle between series using legend will now clear action content also
[Pro] Drilldown on congressional districts fix
Changed amcharts CDN url
Projection fixes for USA Territories map

= 1.4.9 =
New Maps: Côte d'Ivoire (Ivory Coast), Uganda and Province map of Italy
[Pro] Include markers in display-map-list shortcode
[Pro] Drilldown issue fixed for Congo DR

= 1.4.8 =
Option to overwrite meta in shortcode parameter
[Pro] Bug fix on external list shortcode html
[Pro] Bug fix on drilldown for Canada and Mexico regions
[Pro] Responsive auto region labels
[Pro] Lightbox on mobile bug fix
[Pro] Action to display page content below & scroll (beta)
[Pro] Rotate icon markers option
[Pro] Allow image markers to change size on zoom

= 1.4.7 =
* [Pro] Option to set base map to always display (when drilldown/filter is enabled)
* [Pro] Option to set self-hosted amcharts library
* [Pro] Multiple Bug Fixes

= 1.4.6 =
* New Maps: Afghanistan and India/Asia map version
* [Pro] Bug fix on actions triggered by external dropdown
* [Pro] Better options for "content on the right" visuals
* [Pro] UAE drilldown bug fix
* [Pro] Option to include count in external live filter for overlay maps


= 1.4.5 =
* New Maps: Jordan and USA States divided by congressional districts
* Workaround for WP-Rocket minification issue
* [Pro] Option to change marker and label sizes on smaller screens
* Option to disable live preview
* [Pro] Lightbox mobile issue fixed

= 1.4.4 =
* Add CSS class when loading
* Freemius WordPress SDK update
* [Pro] Lightbox height for iframe bug fix
* [Pro] Bug fix on overlay maps with repeated regions
* [Pro] HomeButton bug fix on Firefox
* [Pro] Option to set tooltips to display on click or be always visible
* [Pro] Tooltips from overlay maps will inherit rules from original maps
* [Pro] Option to set background colour of content container

= 1.4.3 =
* [Pro] Mobile size option for round markers and vector icons
* [Pro] Auto labels in regions option to read from custom source
* [Pro] Bug fix on overlay maps with grouped regions

= 1.4.2 =
* [Pro] Home button now resets also click action content
* [Pro] Placeholders can now be used in Action content
* [Pro] Dropdown option for Live Filter
* [Pro] External Dropdown search bug fix
* [Pro] Custom actions bug on overlay maps fixed
* [Pro] Actions fixed to accept cyrillic characters

= 1.4.1 =
* [Pro] External custom legend option
* Fixed shortcode issue on cloned maps

= 1.4.0 =
* Freemius WordPress SDK update
* [Pro] bug fix on live filter with grouped regions

= 1.3.6 =
* New Maps: Timor-Leste, Trinidad and Tobago, Falkland Islands, Guam, Northern Mariana, Montserrat, Grenada, Martinique, Saint Barthélemy, U.S. Virgin Islands, British Virgin Islands, Guadeloupe, Turks and Caicos Islands, Haiti.
* [Pro] improvements on the overlay code
* [Pro] external dropdown improvements when using overlay maps

= 1.3.5 =
* [Pro] Option to set action content of json source
* [Pro] Drilldown fix for Serbia

= 1.3.4 =
* Release Bump
* [Pro] Legend text color option

= 1.3.3 =
* Small change in maps model to allow filters to work better
* [Pro] Zoom on Click fix for South Africa in higher definition maps.
* [Pro] Option to disable hover color on heatmaps

= 1.3.2 =
* [Pro] Option to hold click action on mobile, to display tooltip
* [Pro] Click action to drilldown to specific map

= 1.3.1 =
* [Pro] Option to disable tooltips on mobile

= 1.3.0 =
* New maps: Iraq and India2020

= 1.2.13 =
* [Pro] Convert lat and lon to float when coming from JSON
* [Pro] Pass the action content through the_content filter

= 1.2.12 =
* [Pro] Prevent actions code to run on admin
* [Pro] Legend improvements (disable cutoff)
* Fix bug when URLs included "&" characters

= 1.2.11 =
* Limit pan behaviour
* [Pro] Zoom to clicked region improvements
* [Pro] Allow JSON for custom taxonomy query
* [Pro] Allow to use different source for label in external dropdown

= 1.2.10 =
* [Pro] zoom to cluster markers improvements

= 1.2.9 =
* [Pro] Auto Labels bug fix
* Saltus framework updates

= 1.2.8 =
* Code improvements to prevent conflicts
* [Pro] Marker actions bug fix
* [Pro] Drilldown bug fix

= 1.2.7 =
* Code Improvements - Saltus Framework update

= 1.2.6 =
* [Pro] Cluster Markers improvements

= 1.2.5 =
* Bug fix in admin screen
* [Pro] Heatmap ranges for markers
* [Pro] Marker clusters improvements

= 1.2.4 =
* New maps: Norway, Montenegro, Iran and South Sudan
* [Pro] Overlay bug fixed
* [Pro] Option to enable visual map (OpenStreetMaps) for coordinates fields

= 1.2.3 =
* Grouped Regions bug fix
* Asia map default zoom fix

= 1.2.2 =
* Bug fixes
* New setting options and reviewed labels
* Warning when click action is not selected

= 1.2.1 =
* [Pro] Legend bug fixed
* [Pro] JSON source improvements

= 1.2.0 =
* Elementor Widget added
* Better assets loading in admin
* Marker selection tap bug solved
* [Pro] Allow heatmap value reference to have dot notation

= 1.1.13 =
* Allow files to load async - beta
* [Pro] Custom taxonomy as map regions source

= 1.1.12 =
* Fixed bug causing bulk editing to be broken
* [Pro] overlay map options are not now sortable

= 1.1.11 =
* [Pro] trigger custom action on custom json data source bug fixed
* [Pro] allow styles when sanitizing action content
* [Pro] improve group hover behaviour on Select
* [Pro] extra options for JSON data source
* Added better javascript methods to maps manager object
* Improve sanitizing meta info on save

= 1.1.9 =
* [Pro] label position bug fixed

= 1.1.8 =
* New maps: UK Countries (consists of England, Scotland, Wales, North Ireland, with Ireland for shape consistency), World Timezones, British Indian Ocean Territory, Cayman Islands, Cocos (Keeling) Islands, Comoros.
* Update to amcharts v4.9.10
* [Pro] Option have external dropdown

= 1.1.7 =
* [Pro] Improved fullscreen behaviour
* [Pro] Option to have external/bigger zoom controls on mobile
* [Pro] Option to set custom tooltip Template for each series of data
* [Pro] Option load specific amcharts version and setup locale

= 1.1.6 =
* Live preview improvements
* [Pro] Touch devices options - drag grip and tap to activate
* [Pro] Bug fix on labels, preventing actions from running
* [Pro] Fullscreen feature improvements
* [Pro] Option to allow empty overlay

= 1.1.5 =
* [Pro] Button to expand the map full screen
* [Pro] Fix bug on display content actions
* [Pro] Callback function added

= 1.1.4 =
* Workaround New Zealand and Russia default projections offset
* New maps: Bahamas, Eritrea, Ethiopia, Gambia, Ghana, Guinea Bissau, Guyana, Kuwait, Laos, Libya, Luxembourg, Madagascar, Mozambique, Myanmar, Niger, North Macedonia, Rwanda, Sierra Leone, Suriname, Togo, Turkmenistan.
* [Pro] Option to display live filter of overlay maps
* [Pro] Labels improvements and bug fixes
* [Pro] Bug fix for click action not being triggered in some markers
* [Pro] Bug fix for Legend not highting markers

= 1.1.3 =
* [Pro] Option to add label below round markers and icon markers automatically
* [Pro] Active state color option for regions
* [Pro] Custom json as source for regions
* [Pro] Custom Legend Option
* [Pro] Labels bug fixed
* [Pro] Group regions fix
* [Pro] Marker Pro Actions bug fix
* Allow decimal values on border width option

= 1.1.2 =
* Translation improvements
* [Pro] Render shortcodes in tooltip

= 1.1.1 =
* New Maps for Cuba, Jamaica, Uruguay and Mexican county maps
* [Pro] Customize tooltip shadow options

= 1.1.0 =
* Improved compatibility with Elementor
* [Pro] Custom Action bug fixed

= 1.0.9 =
* Improved loading of assets to workaround cache
* Added Actions to help adding markers and regions
* Forced amcharts version to 4.8.0 (4.8.1 introduced a hover bug)

= 1.0.8 =
* Improved group hover
* Added new maps (Canada regions and other world maps)
* [Pro] Fix group hover bug
* [Pro] Improved Lightbox feature

= 1.0.7 =
* Fix conflict with Async Javascript plugin
* [Pro] Improved feature to drag auto Labels
* [Pro] Fixed bug when initial zoom was changed
* [Pro] Fixed bug with Albers projection
* [Pro] Better handling of Pro Actions

= 1.0.6 =
* Upgrade option introduced
* Remove drag/resize on mobile

= 1.0.5 =
* Freemius OptIn added
* Zoom in preview bug fix
* Map List Update

= 1.0.4 =
* Disable drag when zoom is disabled
* Gutenberg block bug fix (ccs class)
* Small code improvements

= 1.0.3 =
* Extra maps for Portugal added
* Tooltip improvements to handle images
* Preview bugs fixed

= 1.0.2 =
* Zoom Controls added (Settings > Map Features )
* Automatic line breaks in tooltips
* Option to enable rich editor for the tooltip (Settings > Editing )

= 1.0.1 =
* Gutenberg Block
* Map Image Preview
* PHP 7 compatibility

= 1.0 =
* Initial Release

== Credits ==
* [amcharts](https://www.amcharts.com/)
* [jsonTree](http://github.com/summerstyle/jsonTreeViewer)
* [autocomplete](https://kraaden.github.io/autocomplete/)
* [unDraw](https://undraw.co/) - Banner Illustrations
* [Codestar Framework](http://codestarframework.com/)
* [Extended CPTs](https://github.com/johnbillion/extended-cpts)
