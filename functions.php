<?php

// load the childtheme stylesheet
function ct_include_style () {
	if ( !is_admin() ) {
		wp_enqueue_style( 'christatimmer', get_stylesheet_uri() );
	}
}
add_action( 'wp_enqueue_scripts', 'ct_include_style' );

function ct_theme_setup() {
	load_child_theme_textdomain( 'christatimmer', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'ct_theme_setup' );

// remove the masonry script that comes with the Fran theme
function ct_dequeue_masonry () {
	if ( !is_admin() ) {
		if ( is_front_page() ) {
			wp_dequeue_script( 'masonry' );
			wp_dequeue_script( 'masonry-init' ); 
		}
	}
}
add_action( 'wp_print_scripts', 'ct_dequeue_masonry' );

// sort classes and courses by menu_order
function ct_class_order( $query ) {
	if ( !is_admin() && $query -> is_main_query() && post_type_exists( 'class' ) ) {
		// Get the post type from the query
		$post_type = isset( $query -> query['post_type'] );
		// if it's one of our custom ones
		if ( $post_type == 'class' || $query -> is_tax( 'course' ) ) {
			$query -> set( 'orderby', 'menu_order' );
			$query -> set( 'order', 'ASC' );
		}
	}
}
add_filter( 'pre_get_posts', 'ct_class_order' );

/**
 * This will remove the username requirement on the registration form
 * and use the email address as the username.
 */
function jp_rcp_user_registration_data( $user ) {
	rcp_errors()->remove( 'username_empty' );
	$user['login'] = $user['email'];
	return $user;
}

add_filter( 'rcp_user_registration_data', 'jp_rcp_user_registration_data' );

/**
 * Require first and last names during registration
 * 
 * @param array $posted Array of information sent to the form.
 * 
 * @return void
 */
function ag_rcp_require_first_and_last_names( $posted ) {
	if ( is_user_logged_in() ) {
		return;
	}
	
	if ( empty( $posted['rcp_user_first'] ) ) {
		rcp_errors()->add( 'first_name_required', __( 'Please enter your first name', 'christatimmer' ), 'register'  );
	}

	if ( empty( $posted['rcp_user_last'] ) ) {
		rcp_errors()->add( 'last_name_required', __( 'Please enter your last name', 'christatimmer' ), 'register'  );
	}
}

add_action( 'rcp_form_errors', 'ag_rcp_require_first_and_last_names' );