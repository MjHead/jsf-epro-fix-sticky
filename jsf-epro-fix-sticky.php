<?php
/*
 * Plugin Name: JetSmartFilters + Elementor Pro sticky posts
 * Plugin URI: https://github.com/MjHead/jsf-epro-fix-sticky
 * Description: Fix the issue with sticky posts when using JetSmartFilters and Elementor Pro widgets.
 * Version: 1.0.0
 * Author: Mjhead
 * Author URI: https://github.com/MjHead
 * License:     GPL-3.0+
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 */

/**
 * Check if the query has JetSmartFilters applied and doesn't ignore sticky posts.
 * If so, hook into pre_get_posts to modify the query.
 *
 * @param array $query_args
 * @return array
 */
function jsf_epro_maybe_hook_sticky_handler( $query_args ) {
	if (
		empty( $query_args['ignore_sticky_posts'] )
		&& ! empty( $query_args['jet_smart_filters'] )
	) {
		add_action( 'pre_get_posts', 'jsf_epro_sticky_handler', 999 );
	}

	return $query_args;
}

add_action( 'elementor/query/query_args', 'jsf_epro_maybe_hook_sticky_handler', 999 );

/**
 * Modify the query to ensure sticky posts are included.
 *
 * @param WP_Query $query
 */
function jsf_epro_sticky_handler( &$query ) {

	// Only apply to queries that have JetSmartFilters applied
	$jet_smart_filters = $query->get( 'jet_smart_filters' );
	if ( empty( $jet_smart_filters ) ) {
		return;
	}

	$query->is_home = true;

	// Remove the handler to apply it only to required query
	remove_filter( 'pre_get_posts', 'jsf_epro_sticky_handler', 999 );
}