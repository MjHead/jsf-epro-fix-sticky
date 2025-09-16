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
function jsf_epro_maybe_hook_sticky_handler( $query_args ) {
	var_dump( $query_args );
	return $query_args;
}

add_action( 'elementor/query/query_args', 'jsf_epro_maybe_hook_sticky_handler', 999 );