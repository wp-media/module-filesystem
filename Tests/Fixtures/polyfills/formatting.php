<?php

if ( ! function_exists( 'get_rocket_parse_url' ) ) {
	/**
	 * Extract and return host, path, query and scheme of an URL
	 *
	 * @since 2.11.5 Supports UTF-8 URLs
	 * @since 2.1 Add $query variable
	 * @since 2.0
	 *
	 * @param string $url The URL to parse.
	 *
	 * @return array Components of an URL
	 */
	function get_rocket_parse_url( $url ) { // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals
		if ( ! is_string( $url ) ) {
			return;
		}

		$encoded_url = preg_replace_callback(
			'%[^:/@?&=#]+%usD',
			function( $matches ) {
				return rawurlencode( $matches[0] );
			},
			$url
		);

		$url      = wp_parse_url( $encoded_url );
		$host     = isset( $url['host'] ) ? strtolower( urldecode( $url['host'] ) ) : '';
		$path     = isset( $url['path'] ) ? urldecode( $url['path'] ) : '';
		$scheme   = isset( $url['scheme'] ) ? urldecode( $url['scheme'] ) : '';
		$query    = isset( $url['query'] ) ? urldecode( $url['query'] ) : '';
		$fragment = isset( $url['fragment'] ) ? urldecode( $url['fragment'] ) : '';

		/**
		 * Filter components of an URL
		 *
		 * @since 2.2
		 *
		 * @param array Components of an URL
		 */
		return (array) apply_filters(
			'rocket_parse_url',
			[
				'host'     => $host,
				'path'     => $path,
				'scheme'   => $scheme,
				'query'    => $query,
				'fragment' => $fragment,
			]
		);
	}
}

if ( ! function_exists( 'rocket_extract_url_component' ) ) {
	/**
	 * Extract a component from an URL.
	 *
	 * @since  2.11
	 * @author Remy Perona
	 *
	 * @param string $url       URL to parse and extract component of.
	 * @param string $component URL component to extract using constant as in parse_url().
	 *
	 * @return string extracted component
	 */
	function rocket_extract_url_component( $url, $component ) {
		return _get_component_from_parsed_url_array( wp_parse_url( $url ), $component );
	}
}
