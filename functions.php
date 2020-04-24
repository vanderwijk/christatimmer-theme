<?php

// load the childtheme stylesheet
function ct_include_style () {
	if ( !is_admin() ) {
		wp_enqueue_style( 'christatimmer', get_stylesheet_uri() );
	}
}
add_action( 'wp_enqueue_scripts', 'ct_include_style' );

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

function ct_favicon() { ?>
<link rel="shortcut icon" href="/wp-content/themes/christatimmer/img/favicon.ico" >
<?php }
add_action('wp_head', 'ct_favicon');

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

// check if trial has expired
function trial_active() {

	global $current_user; 

	get_currentuserinfo();
	
	if ( $current_user ) {
		$registration_date = $current_user->user_registered;

		if ( ! empty( $registration_date ) ) {
			$registration_date_timestamp = strtotime($registration_date);
			$expiration_date = date("Y-m-d H:i:s", strtotime("+1 month", $registration_date_timestamp));
			$expiration_date_timestamp = strtotime($expiration_date);
			$current_date_timestamp = time();

			if ( $current_date_timestamp < $expiration_date_timestamp ) {
				return true;
			} else {
				return false;
			}
		}
	}

}