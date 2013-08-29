<?php

register_sidebar();
register_sidebar(2);

add_theme_support( 'post-thumbnails' );

// name of the thumbnail, width, height, crop mode
add_image_size( 'post-image',  150, 150, true );
add_image_size( 'featured-image',  150, 150, true );

// display today and yesterday instead of date when applicable
function ff_rel_time() {
	$today = date_i18n("Ymd");
	$yesterday = date_i18n("Ymd", current_time( 'timestamp' ) - 86400);
	$mtdate = get_the_time('Ymd');
	if ($mtdate==$today) {
	echo ('Today');
	}
	elseif ($mtdate==$yesterday) {
	echo ('Yesterday');
	}
	else {
	the_time( get_option( 'date_format' ) );
	}
}



/**
 * Load javascripts used by the theme
 */

function custom_theme_js(){
	wp_register_script( 'infinite_scroll',  get_template_directory_uri() . '/js/jquery.infinitescroll.min.js', array('jquery'),null,true );
	if( ! is_singular() ) {
		wp_enqueue_script('infinite_scroll');
	}
}
add_action('wp_enqueue_scripts', 'custom_theme_js');

/**
 * Infinite Scroll
 */
function custom_infinite_scroll_js() {
	if( ! is_singular() ) { ?>
	<script>
	var infinite_scroll = {
		loading: {
			img: "<?php echo get_template_directory_uri(); ?>/js/ajax-loader.gif",
			msgText: "<?php _e( 'Loading the previous set of posts...', 'custom' ); ?>",
			finishedMsg: "<?php _e( 'All posts loaded.', 'custom' ); ?>"
		},
		"nextSelector":".navigation .nav-previous a",
		"navSelector":".navigation",
		"itemSelector":".news-wrapper",
		"contentSelector":"#news"
	};
	jQuery( infinite_scroll.contentSelector ).infinitescroll( infinite_scroll );
	</script>
	<?php
	}
}
add_action( 'wp_footer', 'custom_infinite_scroll_js',100 );



//    add_theme_support( 'post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'audio', 'chat', 'video')); 
// Add 3.1 post format theme support.



	add_action( 'init', 'create_post_type' );
	function create_post_type() {
	// Custom post type for absences
		register_post_type( 'absences',
			array(
			'labels' => array(
				'name' => __( 'Absences' ),
				'singular_name' => __( 'Absence' ),
				'add_new_item' => __( 'Add an Absence' ),
				'edit_item' => __( 'Edit Absence' ),
				'view_item' => __( 'View Absence' ),
			),
			'public' => true,
			'has_archive' => true,
		    'capabilities' => array(
		        'publish_posts' => 'manage_options',
		        'edit_posts' => 'manage_options',
		        'edit_others_posts' => 'manage_options',
		        'delete_posts' => 'manage_options',
		        'delete_others_posts' => 'manage_options',
		        'read_private_posts' => 'manage_options',
		        'edit_post' => 'manage_options',
		        'delete_post' => 'manage_options',
		        'read_post' => 'manage_options',
		    ),
			'menu_position' => 5,
   		 	'supports' => array( 'title', 'author' )
			)
		);

	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name' => _x( 'Absence type', 'taxonomy general name' ),
		'singular_name' => _x( 'Type', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search types' ),
		'all_items' => __( 'All status' ),
		'parent_item' => __( 'Parent type' ),
		'parent_item_colon' => __( 'Parent type:' ),
		'edit_item' => __( 'Edit Absence type' ),
		'update_item' => __( 'Update Absence type' ),
		'add_new_item' => __( 'Add New Absence type' ),
		'new_item_name' => __( 'New Absence type' ),
	); 	

	register_taxonomy( 'status', array( 'absences' ), array(
		'hierarchical' => true,
		'labels' => $labels, /* NOTICE: Here is where the $labels variable is used */
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'status' ),
	));


	}
	


/**
 * Tests if any of a post's assigned categories are descendants of target categories
 *
 * @param int|array $cats The target categories. Integer ID or array of integer IDs
 * @param int|object $_post The post. Omit to test the current post in the Loop or main query
 * @return bool True if at least 1 of the post's categories is a descendant of any of the target categories
 * @see get_term_by() You can get a category by name or slug, then pass ID to this function
 * @uses get_term_children() Passes $cats
 * @uses in_category() Passes $_post (can be empty)
 * @version 2.7
 * @link http://codex.wordpress.org/Function_Reference/in_category#Testing_if_a_post_is_in_a_descendant_category
 */
if ( ! function_exists( 'post_is_in_descendant_category' ) ) {
	function post_is_in_descendant_category( $cats, $_post = null ) {
		foreach ( (array) $cats as $cat ) {
			// get_term_children() accepts integer ID only
			$descendants = get_term_children( (int) $cat, 'category' );
			if ( $descendants && in_category( $descendants, $_post ) )
				return true;
		}
		return false;
	}
}

?>