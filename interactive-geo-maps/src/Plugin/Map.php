<?php

namespace Saltus\WP\Plugin\Saltus\InteractiveMaps\Plugin;

use Saltus\WP\Plugin\Saltus\InteractiveMaps\Core;
use Saltus\WP\Plugin\Saltus\InteractiveMaps;
/**
 * Create Map
 */
class Map {
    public $core;

    /** Options for Map CPT */
    public $options;

    /** Current Map ID */
    public $map_id;

    /** Meta fields */
    public $meta;

    /**
     * Define Assets
     *
     * @param Core $core This plugin's instance.
     */
    public function __construct( Core $core ) {
        $this->core = $core;
    }

    /**
     * Setup proper data needed to render map
     *
     * @param [type] $id
     * @return void
     */
    public function setup( $atts ) {
        $id = (int) $atts['id'];
        $options = get_option( 'interactive-maps' );
        $map_meta = $this->get_meta( $id );
        $main_meta = [
            'regions'      => [],
            'roundMarkers' => [],
        ];
        $this->options = $options;
        $this->map_id = $id;
        if ( empty( $map_meta['map'] ) ) {
            $main_meta['map'] = 'worldLow';
        }
        // Make sure its an array for other operations
        if ( !is_array( $map_meta ) ) {
            $map_meta = [];
        }
        // start with map meta
        if ( !empty( $map_meta ) ) {
            $main_meta = $map_meta;
            // make sure it's an array, so the merge doesn't fail
            if ( !is_array( $map_meta['regions'] ) ) {
                $map_meta['regions'] = [];
            }
            if ( !is_array( $map_meta['roundMarkers'] ) ) {
                $map_meta['roundMarkers'] = [];
            }
            $main_meta['regions'] = $map_meta['regions'];
            $main_meta['roundMarkers'] = $map_meta['roundMarkers'];
        }
        // regions
        if ( isset( $atts['regions'] ) ) {
            $json_meta = json_decode( '[' . $atts['regions'] . ']', true );
            if ( json_last_error() === 0 ) {
                $main_meta['regions'] = array_merge( $main_meta['regions'], $json_meta );
            }
        }
        // markers
        if ( isset( $atts['roundmarkers'] ) ) {
            $json_meta = json_decode( '[' . $atts['roundmarkers'] . ']', true );
            if ( json_last_error() === 0 ) {
                $main_meta['roundMarkers'] = array_merge( $main_meta['roundMarkers'], $json_meta );
            }
        }
        // in case we use this shortcode for demo purposes, the map that will render might ne in the URL
        if ( isset( $atts['demo'] ) && isset( $_GET['map'] ) ) {
            $main_meta['map'] = sanitize_text_field( $_GET['map'] );
        }
        $meta = $this->prepare_meta( $main_meta, $id );
        if ( !is_array( $meta ) ) {
            $meta = [];
        }
        $performance = [
            'animations' => ( isset( $options['animations'] ) ? $options['animations'] : true ),
            'lazyLoad'   => ( isset( $options['lazyLoad'] ) ? $options['lazyLoad'] : false ),
        ];
        $meta['performance'] = $performance;
        // default zoom
        $meta['zoomMaster'] = ( isset( $options['zoomMaster'] ) ? $options['zoomMaster'] : false );
        $this->meta = $meta;
    }

    /**
     * Prepare meta data to include the proper arguments.
     *
     * @param array $meta
     * @param int $id
     *
     * @return array
     */
    public function prepare_meta( array $meta, int $id ) {
        if ( empty( $meta ) ) {
            return [];
        }
        if ( $id < 1 ) {
            return [];
        }
        $meta['id'] = $id;
        $meta['container'] = 'map_' . $id;
        $meta['title'] = get_the_title( $id );
        $meta = apply_filters( 'igm_add_meta', $meta );
        if ( empty( $meta['regions'] ) ) {
            $meta['regions'] = [];
        }
        if ( empty( $meta['roundMarkers'] ) ) {
            $meta['roundMarkers'] = [];
        }
        if ( empty( $meta['visual'] ) ) {
            $meta['visual'] = [];
        }
        // make sure map height is not empty or 0
        $meta['visual']['paddingTop'] = ( isset( $meta['visual']['paddingTop'] ) && !empty( $meta['visual']['paddingTop'] ) && $meta['visual']['paddingTop'] !== '0' ? $meta['visual']['paddingTop'] : '56.25' );
        // check if we need to process regions conversion
        if ( isset( $meta['regions'] ) && (!isset( $this->options['dictionary'] ) || isset( $this->options['dictionary'] ) && $this->options['dictionary']) ) {
            $meta['regions'] = $this->process_regions_dictionary( $id, $meta['regions'] );
        }
        $render_tooltip_mode = false;
        if ( !empty( $this->options['tooltip_render_html'] ) ) {
            $render_tooltip_mode = (bool) $this->options['tooltip_render_html'];
        }
        $meta['regions'] = ( isset( $meta['regions'] ) ? $this->tooltip_nl2br( $id, $meta['regions'], $render_tooltip_mode ) : [] );
        $meta['regions'] = $this->set_region_source( $meta['regions'] );
        $meta['roundMarkers'] = ( isset( $meta['roundMarkers'] ) ? $this->tooltip_nl2br( $id, $meta['roundMarkers'], $render_tooltip_mode ) : [] );
        if ( !empty( $meta['map'] ) ) {
            $meta['urls'] = [$meta['map']];
            $meta = apply_filters( 'igm_prepare_meta', $meta );
            $meta['urls'] = $this->convert_source_urls( $meta['urls'] );
        }
        $combine = ( isset( $meta['combineRegions']['enabled'] ) ? $meta['combineRegions']['enabled'] : false );
        // merge entries with same ID
        if ( $combine ) {
            $merge_order = ( isset( $meta['combineRegions']['mergeOrder'] ) ? $meta['combineRegions']['mergeOrder'] : [
                0 => '',
            ] );
            $meta['regions'] = $this->merge_regions_with_same_id( $meta['regions'], $merge_order );
        }
        do_action( 'igm_prepare_meta_actions', $meta, 10 );
        // set map url
        $meta = $this->set_map_url( $meta );
        return $meta;
    }

    /**
     * Merge regions with the same ID, flattening them and
     * combining the content.
     *
     * @param array $regions The list of regions
     * @param array $order   The priority of each source
     * @return array The list of merged regions.
     */
    public function merge_regions_with_same_id( array $regions, array $order ) {
        if ( !is_array( $regions ) ) {
            return $regions;
        }
        $i = 0;
        // add a value to each source, DESC
        foreach ( $order as $key => $_ ) {
            $order[$key] = $i++;
        }
        // iterate the list of regions to sort the sources
        $sorted_regions = [];
        foreach ( $regions as $entry ) {
            if ( !isset( $entry['id'] ) ) {
                continue;
            }
            $id = $entry['id'];
            $pos = 0;
            if ( !empty( $order[$entry['source']] ) ) {
                $pos = $order[$entry['source']];
            }
            // per id and per source
            $sorted_regions[$id][$pos][] = $entry;
        }
        // overwrite the sources, but merge the content.
        $merged_list = [];
        foreach ( $sorted_regions as $key => $sources ) {
            ksort( $sources );
            // merge common sources
            $merged_sources_list = [];
            foreach ( $sources as $source => $common ) {
                $merged_source = [];
                foreach ( $common as $common_source_entry ) {
                    $merged_source = $this->merge_entries( $merged_source, $common_source_entry );
                }
                $merged_sources_list[$source] = $merged_source;
            }
            // merge different sources
            $merged_entries = [];
            for ($count = count( $order ) - 1; $count >= 0; $count--) {
                if ( empty( $merged_sources_list[$count] ) ) {
                    continue;
                }
                $merged_entries = $this->merge_entries( $merged_entries, $merged_sources_list[$count], true );
            }
            $merged_list[$key] = $merged_entries;
        }
        return array_values( $merged_list );
    }

    /**
     * Merge two regions, and combine the content
     *
     * @param array $a The "main" region
     * @param array $b The new region
     * @param bool $reverse_content Merge direction of the content
     *
     * @return array The merged region
     */
    private function merge_entries( array $a, array $b, bool $reverse_content = false ) {
        $merged_content = '';
        if ( !empty( $a['content'] ) ) {
            $merged_content = $a['content'];
        }
        $separator = '';
        if ( !empty( $merged_content ) && !empty( $b['content'] ) ) {
            $separator = '<div class="igm_combined_content_separator"></div>';
        }
        if ( !empty( $b['content'] ) ) {
            // aaa <sep> bbb
            $format = '%1$s %2$s %3$s';
            if ( $reverse_content ) {
                $format = '%3$s %2$s %1$s';
            }
            $merged_content = sprintf(
                $format,
                $merged_content,
                $separator,
                $b['content']
            );
        }
        $res = $b;
        $res['content'] = $merged_content;
        return $res;
    }

    /**
     * Convert tooltip line breaks to br
     *
     * @param int $id
     * @param array  $entries
     * @return array $entries
     */
    private function tooltip_nl2br( int $id, array $entries = [], $html_mode = false ) {
        if ( empty( $entries ) ) {
            return $entries;
        }
        if ( $html_mode === true ) {
            return $entries;
        }
        foreach ( $entries as $k => &$entry ) {
            if ( isset( $entry['tooltipContent'] ) && $entry['tooltipContent'] !== '' ) {
                // Ensure tooltipContent is a string before processing
                if ( is_string( $entry['tooltipContent'] ) ) {
                    if ( !$id ) {
                        $entry['tooltipContent'] = stripslashes( str_replace( "\r\n", '<br>', $entry['tooltipContent'] ) );
                    } else {
                        $entry['tooltipContent'] = nl2br( $entry['tooltipContent'] );
                    }
                } else {
                    // Handle the case where tooltipContent is not a string
                    // Option 1: Convert to a string (e.g., by imploding an array)
                    // $entry['tooltipContent'] = implode(", ", (array)$entry['tooltipContent']);
                    // Option 2: Skip processing or apply alternative processing
                    // For example, skipping:
                    // continue;
                }
            }
        }
        return $entries;
    }

    /**
     * Add region source to regions without source.
     *
     * @param array $entries A list of regions.
     *
     * @return array A list of regions with the input source.
     */
    private function set_region_source( array $entries ) {
        if ( empty( $entries ) ) {
            return $entries;
        }
        foreach ( $entries as $key => $entry ) {
            if ( isset( $entry['source'] ) ) {
                continue;
            }
            $entries[$key]['source'] = 'manual_entry';
        }
        return $entries;
    }

    /**
     * Convert region names to region codes based on saved data
     *
     * @param array $id        post id
     * @param array $regions   regions data
     * @return array $regions  converted regions data
     */
    public function process_regions_dictionary( int $id, array $regions = [] ) {
        if ( !$id || empty( $regions ) ) {
            return $regions;
        }
        // get dictionary data
        $data = get_post_meta( $id, 'map_regions_info', true );
        $regions_data = ( isset( $data['regionData'] ) ? $data['regionData'] : '' );
        if ( $regions_data !== '' ) {
            $json = json_decode( $regions_data, true );
            $json_lower = array_change_key_case( $json );
            $ids = array_values( $json_lower );
            // to delete
            $delk = [];
            foreach ( $regions as $k => &$region ) {
                if ( isset( $region['id'] ) && !is_numeric( $region['id'] ) && $region['id'] !== '' ) {
                    // special cases
                    $search = ['USA', 'United States of America', 'United States Virgin Islands'];
                    $replace = ['United States', 'United States', 'US Virgin Islands'];
                    $region['id'] = str_replace( $search, $replace, $region['id'] );
                    if ( array_key_exists( strtolower( $region['id'] ), $json_lower ) ) {
                        $region['id'] = $json_lower[strtolower( $region['id'] )];
                    }
                    // check for groups?
                    if ( strpos( $region['id'], ',' ) ) {
                        $arr = explode( ',', $region['id'] );
                        $temp = '';
                        foreach ( $arr as $reg ) {
                            if ( array_key_exists( strtolower( $reg ), $json_lower ) ) {
                                $temp .= $json_lower[strtolower( $reg )] . ',';
                            } else {
                                $temp .= $reg . ',';
                            }
                        }
                        $region['id'] = rtrim( $temp, ',' );
                    }
                    // if this id doesn't exist in the list of available regions, maybe unset this entry?
                    if ( !in_array( $region['id'], $ids ) ) {
                        array_push( $delk, $k );
                    }
                }
            }
            // delete unwanted
            if ( !empty( $delk ) ) {
                foreach ( $delk as $key ) {
                    // let's not delete if they have a comma, might be a group!
                    if ( !strpos( $regions[$key]['id'], ',' ) ) {
                        unset($regions[$key]);
                    }
                }
                $regions = array_values( $regions );
            }
        }
        return $regions;
    }

    /**
     * Convert map names into urls and create a reference array
     *
     * @param array $maps Map names
     * @return array List of urls
     */
    public function convert_source_urls( array $maps ) {
        if ( empty( $maps ) ) {
            return;
        }
        $urls = [];
        foreach ( $maps as $name ) {
            if ( empty( $name ) ) {
                continue;
            }
            if ( 'custom' === $name ) {
                continue;
            }
            $urls[$name] = $this->get_url_from_name( $name );
        }
        return $urls;
    }

    /**
     * Get url for map data based on provided name
     *
     * @param string $name
     * @param bool $json_mode - to return the url of the json file or js file
     */
    public function get_url_from_name( string $name, bool $json_mode = false ) {
        // addon maps
        if ( strpos( $name, 'http' ) === 0 ) {
            return $name;
        }
        $base_url = apply_filters( 'igm_amcharts_geodata_url', 'https://cdn.amcharts.com/lib/4/geodata/' );
        // maps built by cmoreira
        if ( strpos( $name, 'custom_' ) === 0 ) {
            $base_url = plugins_url( '/src/geodata/', $this->core->file_path );
        }
        if ( $json_mode ) {
            return $base_url . 'json/' . $name . '.json';
        }
        return $base_url . $name . '.js';
    }

    /**
     * Get map_info meta data
     *
     * @param int $id map id
     *
     * @return mixed map meta data
     */
    public function get_meta( int $id ) {
        return get_post_meta( $id, 'map_info', true );
    }

    /**
     * Set meta mapURL value to full url
     *
     * @param array $meta
     *
     * @return array
     */
    private function set_map_url( array $meta ) {
        if ( empty( $meta['map'] ) ) {
            return $meta;
        }
        if ( $meta['map'] !== 'custom' ) {
            $meta['mapURL'] = esc_url( $this->get_url_from_name( $meta['map'], false ) );
            if ( strpos( $meta['map'], 'http' ) === 0 ) {
                $meta['useGeojson'] = true;
            }
        }
        return $meta;
    }

    /**
     * Render html for the map and enqueue necessary assets
     *
     * @param array $atts Shortcode attributes
     * @param Core $core  The plugin core
     *
     * @return string html code for the map container
     */
    public function render( array $atts, Core $core ) {
        // reset filters, they might have been added by other maps
        remove_all_filters( 'igm_mapbox_before' );
        remove_all_filters( 'igm_mapbox_after' );
        remove_all_filters( 'igm_mapbox_classes' );
        $this->setup( $atts );
        $id = (int) $atts['id'];
        $assets = new Assets($core);
        $assets->load_map_scripts( $this->meta );
        $assets->load_map_styles();
        $before = apply_filters( 'igm_mapbox_before', '', $id );
        $after = apply_filters( 'igm_mapbox_after', '', $id );
        // for developers use
        $before = apply_filters( 'igm_map_before', $before, $id );
        $after = apply_filters( 'igm_map_after', $after, $id );
        $height = ( isset( $this->meta['visual']['paddingTop'] ) ? floatval( $this->meta['visual']['paddingTop'] ) : '56.25' );
        $heightMobile = ( isset( $this->meta['visual']['paddingTopMobile'] ) ? floatval( $this->meta['visual']['paddingTopMobile'] ) : '' );
        $max_width = ( isset( $this->meta['visual']['maxWidth'] ) && '' !== $this->meta['visual']['maxWidth'] && '0' !== $this->meta['visual']['maxWidth'] ? floatval( $this->meta['visual']['maxWidth'] ) : '2200' );
        $map_classes = apply_filters( 'igm_mapbox_classes', 'map_box' );
        // add percentage values
        $height = $height . '%';
        $heightMobile = ( $heightMobile !== '' ? $heightMobile . '%' : '' );
        $html = sprintf(
            '<div class="map_wrapper" id="map_wrapper_%6$s">
				<div class="%1$s" style="max-width:%2$s">%3$s
					<div class="map_aspect_ratio" style="padding-top:%4$s" data-padding-top="%4$s" data-padding-top-mobile="%5$s">
						<div class="map_container">
							<div class="map_render map_loading" id="map_%6$s"></div>
						</div>
					</div>
				</div>%7$s
			</div>',
            $map_classes,
            $max_width . 'px',
            $before,
            $height,
            $heightMobile,
            $id,
            $after
        );
        // remove tabs  maybe also remove line breaks in the future?
        $html = trim( preg_replace( '/\\t+/', '', $html ) );
        if ( isset( $_GET['debug'] ) ) {
            $html .= sprintf( '<pre>%s</pre>', wp_json_encode( $this->meta, JSON_PRETTY_PRINT ) );
        }
        $html = apply_filters( 'igm_map_after', $html, $id );
        return $html;
    }

}
