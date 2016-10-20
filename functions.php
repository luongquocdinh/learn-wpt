<?php
add_theme_support( 'post-thumbnails' );


/**
* SOLAZU : EDIT FROM HERE
**/


/**
 * CREATE LINK POST TYPE
 */

add_action( 'init', 'create_milbon_links' );
function create_milbon_links () {
	register_post_type('milbon-links',
			array(
				'labels' => array(
						'name' => esc_html__('Links','milbon'),
						'singular_name' => esc_html__('Link','milbon'),
						'add_new'   => esc_html__( 'Add New', 'milbon' ),
						'add_new_item'  => esc_html__( 'Add New Link', 'milbon' ),
						'edit'               => esc_html__( 'Edit', 'milbon' ),
						'edit_item'          => esc_html__( 'Edit Link', 'milbon' ),
						'new_item'           => esc_html__( 'New Link', 'milbon' ),
						'view'               => esc_html__( 'View Link', 'milbon' ),
						'view_item'          => esc_html__( 'View Link', 'milbon' ),
						'search_items'       => esc_html__( 'Search Link', 'milbon' ),
						'not_found'          =>  esc_html__( 'No Link Found', 'milbon' ),
						'not_found_in_trash' => esc_html__( 'No Link Found In Trash', 'milbon' )
				),
				'description'        => esc_html__( 'Create a Link', 'milbon' ),
				'public' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'publicly_queryable' => true,
				'has_archive' => true,
				'rewrite'            => array(
					'slug' => esc_html__('link','milbon')
				),
				'menu_position'      => 5,
				'show_in_nav_menus'  => false,
				'menu_icon'          => 'dashicons-admin-links',
				'hierarchical'       => false,
				'query_var'          => true,
				'supports'           => array(
					'title', /* Text input field to create a post title. */
					'editor',
					'thumbnail', /* Displays a box for featured image. */
				),
				'register_meta_box_cb' => 'add_events_metaboxes_links'
		));
}


/**
* CREATE CUSTOM LINKS TAXONOMIES
**/

add_action( 'init', 'create_milbon_link_taxonomies', 0 );


function create_milbon_link_taxonomies(){
	register_taxonomy(
		'link_category',
		'milbon-links', array(
			'labels' => array(
				'name' => 'Category',
				'add_new_item' => 'Add New Case Category',
				'new_item_name' => "New Case Category"
			),
			'show_ui' => true,
			'show_tagcloud' => true,
			'hierarchical' => true
		)
	);
}

// Add category default in Link Post Type

if (file_exists (ABSPATH.'/wp-admin/includes/taxonomy.php')) {
  require_once (ABSPATH.'/wp-admin/includes/taxonomy.php');
  $hairdesign = array (
	  'cat_name' => 'HairDesign',
	  'category_description' => 'Hair Design',
	  'category_nicename' => 'hairdesign-slug',
	  'category_parent' => '',
	  'taxonomy' => 'link_category'
	);

	$hairdesign_id = wp_insert_category($hairdesign);

	$brand = array (
	  'cat_name' => 'Brand',
	  'category_description' => 'Brand',
	  'category_nicename' => 'brand-slug',
	  'category_parent' => '',
	  'taxonomy' => 'link_category'
	);

	$brand_id = wp_insert_category($brand);

	$group = array (
		'cat_name' => 'Group',
		'category_description' => 'Group',
	  'category_nicename' => 'group-slug',
	  'category_parent' => '',
	  'taxonomy' => 'link_category'
	);

	$group_id = wp_insert_category($group);

	$distribute = array (
		'cat_name' => 'Distribute',
		'category_description' => 'Distribute',
	  'category_nicename' => 'distribute-slug',
	  'category_parent' => '',
	  'taxonomy' => 'link_category'
	);

	$distribute_id = wp_insert_category($distribute);
}
/**
 * CREATE META BOX LINKS POST TYPE
 */

add_action( 'add_meta_boxes', 'add_events_metaboxes_links' );

// Add the Events Meta Boxes
function add_events_metaboxes_links() {
	add_meta_box('wpt_events_location_links', 'Links', 'wpt_events_location_links', 'milbon-links', 'side', 'default');
	add_meta_box('wpt_japan_title_links', 'Japan Title', 'wpt_japan_title_links', 'milbon-links', 'side', 'default');
}

// The Event Location Metabox
function wpt_events_location_links() {
	global $post;

	echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' .
	wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

	$location = get_post_meta($post->ID, '_location', true);

	echo '<input type="text" name="_location" value="' . $location  . '" class="widefat" />';

}

function wpt_japan_title_links() {
	global $post;

	echo '<input type="hidden" name="brandmeta_noncename" id="brandmeta_noncename" value="' .
	wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

	$location = get_post_meta($post->ID, '_title_japanese', true);

	echo '<input type="text" name="_title_japanese" value="' . $location  . '" class="widefat" />';
}

// Save the Metabox Data
function wpt_save_events_meta($post_id, $post) {

	if ( isset($_POST['eventmeta_noncename']) && !wp_verify_nonce( $_POST['eventmeta_noncename'], plugin_basename(__FILE__) )) {
	return $post->ID;
	}

	$events_meta = array();
	if ( !current_user_can( 'edit_post', $post->ID ))
		return $post->ID;

	if(isset($_POST['_location'])){
		$events_meta['_location'] = $_POST['_location'];
	}

	foreach ($events_meta as $key => $value) {
		if( $post->post_type == 'revision' ) return;
		$value = implode(',', (array)$value);
		if(get_post_meta($post->ID, $key, FALSE)) {
			update_post_meta($post->ID, $key, $value);
		} else {
			add_post_meta($post->ID, $key, $value);
		}
		if(!$value) delete_post_meta($post->ID, $key);
	}

}

add_action('save_post', 'wpt_save_events_meta', 1, 2);


/**
 * CREATE BRAND POST TYPE
 */

add_action( 'init', 'create_milbon_brands' );
function create_milbon_brands () {
	register_post_type('milbon-brands',
			array(
				'labels' => array(
						'name' => esc_html__('Brands','milbon'),
						'singular_name' => esc_html__('Brand','milbon'),
						'add_new'   => esc_html__( 'Add New', 'milbon' ),
						'add_new_item'  => esc_html__( 'Add New Brand', 'milbon' ),
						'edit'               => esc_html__( 'Edit', 'milbon' ),
						'edit_item'          => esc_html__( 'Edit Brand', 'milbon' ),
						'new_item'           => esc_html__( 'New Brand', 'milbon' ),
						'view'               => esc_html__( 'View Brand', 'milbon' ),
						'view_item'          => esc_html__( 'View Brand', 'milbon' ),
						'search_items'       => esc_html__( 'Search Brand', 'milbon' ),
						'not_found'          =>  esc_html__( 'No Brand Found', 'milbon' ),
						'not_found_in_trash' => esc_html__( 'No Brand Found In Trash', 'milbon' )
				),
				'description'        => esc_html__( 'Create a brand', 'milbon' ),
				'public' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'publicly_queryable' => true,
				'has_archive' => true,
				'rewrite'            => array(
					'slug' => esc_html__('brand','milbon')
				),
				'menu_position'      => 5,
				'show_in_nav_menus'  => false,
				'menu_icon'          => 'dashicons-book',
				'hierarchical'       => false,
				'query_var'          => true,
				'supports'           => array(
					'title', /* Text input field to create a post title. */
					'excerpt',
					'editor',
					'thumbnail', /* Displays a box for featured image. */
				),
				'register_meta_box_cb' => 'add_events_metaboxes_brands'
		));
}



/**
* CREATE CUSTOM BRAND TAXONOMIES
**/

add_action( 'init', 'create_milbon_brand_taxonomies', 0 );


function create_milbon_brand_taxonomies(){
	register_taxonomy(
		'brand_category',
		'milbon-brands', array(
			'labels' => array(
				'name' => 'Category',
				'add_new_item' => 'Add New Case Category',
				'new_item_name' => "New Case Category"
			),
			'show_ui' => true,
			'show_tagcloud' => true,
			'hierarchical' => true
		)
	);
}

add_action( 'add_meta_boxes', 'add_events_metaboxes_brands' );

// Add the Events Meta Boxes
function add_events_metaboxes_brands() {
	add_meta_box('wpt_events_checkbox_brands', 'Checked', 'wpt_events_checkbox_brands', 'milbon-brands', 'normal', 'high');
}

function wpt_events_checkbox_brands () {
	global $post;

	$custom = get_post_custom($post->ID);
  $field_id = $custom["field_id"][0];
  ?>
  <label>Check for yes</label>
  <?php $field_id_value = get_post_meta($post->ID, 'field_id', true);
  if($field_id_value == "yes") $field_id_checked = 'checked="checked"'; ?>
    <input type="checkbox" name="field_id" value="yes" <?php echo $field_id_checked; ?> />
  <?php
}

// Save Meta Details
add_action('save_post', 'save_details');

function save_details(){
 	global $post;

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
	  return $post->ID;
	}
	if(isset($_POST["field_id"]))
  		update_post_meta($post->ID, "field_id", $_POST["field_id"]);
}
/**
 * CREATE NEWS POST TYPE
 */

add_action( 'init', 'create_milbon_news' );
function create_milbon_news () {
	register_post_type(
			'milbon-news',
			array(
				'labels' => array(
						'name' => esc_html__('News','milbon'),
						'singular_name' => esc_html__('News','milbon'),
						'add_new'   => esc_html__( 'Add New', 'milbon' ),
						'add_new_item'  => esc_html__( 'Add New Item', 'milbon' ),
						'edit_item'          => esc_html__( 'Edit Item', 'milbon' ),
						'new_item'           => esc_html__( 'New Item', 'milbon' ),
						'view_item'          => esc_html__( 'View Item', 'milbon' ),
						'search_items'       => esc_html__( 'Search News', 'milbon' ),
						'not_found'          =>  esc_html__( 'No News Found', 'milbon' ),
						'not_found_in_trash' => esc_html__( 'No News Found In Trash', 'milbon' )
				),
				'description'        => esc_html__( 'Create a Milbon News', 'milbon' ),
				'public' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'publicly_queryable' => true,
				'has_archive' => true,
				'rewrite'            => array(
					'slug' => esc_html__('milbon-news','milbon')
				),
				'menu_position'      => 5,
				'show_in_nav_menus'  => false,
				'menu_icon'          => 'dashicons-testimonial',
				'hierarchical'       => false,
				'query_var'          => true,
				'capability_type' => 'post',
				'supports'           => array(
					'title', /* Text input field to create a post title. */
					'editor',
					'thumbnail', /* Displays a box for featured image. */
				)
		));
}


/**
* CREATE CUSTOM NEWS TAXONOMIES
**/

add_action( 'init', 'create_milbon_news_taxonomies', 0 );


function create_milbon_news_taxonomies(){
	register_taxonomy(
		'news_category',
		'milbon-news', array(
			'labels' => array(
				'name' => 'Category',
				'add_new_item' => 'Add New Case Category',
				'new_item_name' => "New Case Category"
			),
			'show_ui' => true,
			'show_tagcloud' => true,
			'hierarchical' => true
		)
	);
}

add_action( 'add_meta_boxes', 'add_events_metaboxes_news' );

// Add the Events Meta Boxes
function add_events_metaboxes_news() {
	add_meta_box('wpt_events_location_news', 'Links', 'wpt_events_location_news', 'milbon-news', 'side', 'default');
}

// The Event Location Metabox
function wpt_events_location_news() {
	global $post;

	echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' .
	wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

	$location = get_post_meta($post->ID, '_location', true);

	echo '<input type="text" name="_location" value="' . $location  . '" class="widefat" />';

}



add_filter('excerpt_length', 'my_excerpt_length');
function my_excerpt_length($length) {
	return 140;
}

function get_featured_url($pid){
	$image_id = get_post_thumbnail_id($pid);
	$image_url = wp_get_attachment_image_src($image_id,'single-post-thumbnail');
	echo  $image_url[0];
}


function get_first_cateogry($pid, $taxonomy_name){
	$category = array();
	$categories = get_the_terms($pid, $taxonomy_name);
	if(!empty($categories)){
		foreach ( $categories as $cat){
			array_push($category, $cat->name);
		}
		$post_categories = implode(', ', $category);
	}
	else{
		$post_categories = '';
	}
	echo $post_categories;
}

/*
 * Add meta box for Brand
 */

add_action( 'add_meta_boxes', 'add_brands_metaboxes_links' );
function add_brands_metaboxes_links() {
	add_meta_box('wpt_brands_titles_japan', 'Title', 'wpt_brands_titles_japan', 'milbon-brands', 'side', 'default');
	add_meta_box('wpt_brands_link', 'Link', 'wpt_brands_link', 'milbon-brands', 'side', 'default');
}

function wpt_brands_titles_japan() {
	global $post;

	echo '<input type="hidden" name="brandmeta_noncename" id="brandmeta_noncename" value="' .
	wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

	$location = get_post_meta($post->ID, '_title_japanese', true);

	echo '<input type="text" name="_title_japanese" value="' . $location  . '" class="widefat" />';

}

function wpt_brands_link() {
	global $post;

	echo '<input type="hidden" name="brandmeta_linkname" id="brandmeta_linkname" value="' .
	wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

	$location = get_post_meta($post->ID, '_link', true);

	echo '<input type="text" name="_link" value="' . $location  . '" class="widefat" />';
}

function wpt_save_brands_meta($post_id, $post) {

	if ( isset($_POST['brandmeta_noncename']) && !wp_verify_nonce( $_POST['brandmeta_noncename'], plugin_basename(__FILE__) )) {
	return $post->ID;
	}

	if ( !current_user_can( 'edit_post', $post->ID ))
		return $post->ID;

	$events_meta = array();
	if(isset($_POST['_title_japanese']))
		$events_meta['_title_japanese'] = $_POST['_title_japanese'];

	foreach ($events_meta as $key => $value) {
		if( $post->post_type == 'revision' ) return;
		$value = implode(',', (array)$value);
		if(get_post_meta($post->ID, $key, FALSE)) {
			update_post_meta($post->ID, $key, $value);
		} else {
			add_post_meta($post->ID, $key, $value);
		}
		if(!$value) delete_post_meta($post->ID, $key);
	}

}

function wpt_save_brands_link ($post_id, $post) {
	if ( isset($_POST['brandmeta_linkname']) &&  !wp_verify_nonce( $_POST['brandmeta_linkname'], plugin_basename(__FILE__) )) {
	return $post->ID;
	}

	if ( !current_user_can( 'edit_post', $post->ID ))
		return $post->ID;

	$events_meta = array();
	if(isset($_POST['_link']))
		$events_meta['_link'] = $_POST['_link'];

	foreach ($events_meta as $key => $value) {
		if( $post->post_type == 'revision' ) return;
		$value = implode(',', (array)$value);
		if(get_post_meta($post->ID, $key, FALSE)) {
			update_post_meta($post->ID, $key, $value);
		} else {
			add_post_meta($post->ID, $key, $value);
		}
		if(!$value) delete_post_meta($post->ID, $key);
	}
}
add_action('save_post', 'wpt_save_brands_meta', 1, 2);
add_action('save_post', 'wpt_save_brands_link', 1, 2);

// Add template for single post base on category
function create_single_post_template($t) {
	foreach( (array) get_the_category() as $cat ) {
		if($cat->name === 'office'){
			if ( file_exists(TEMPLATEPATH . "/single-office.php") )
				return TEMPLATEPATH . "/single-office.php";
		}
	}
	return $t;
}
add_filter('single_template', 'create_single_post_template');

//Add meta box - that allow add slider short code with office post
function slz_meta_box_office_slider($id_post) {
    $slider_shortcode =  get_metadata('post', intval($id_post->ID), '_office_slider_shortcode_milbon', true);

    if (empty($slider_shortcode) || $slider_shortcode === false)
        update_post_meta($id_post, '_office_slider_shortcode_milbon', NULL);

	echo ('<label for="shortcode">Slider Shortcode: </label>');
    echo "<input id='shortcode' name='_slider_shortcode' value='".$slider_shortcode."'>";
}
function office_slider_shortcode() {
	global $post;
    if(is_admin())
        add_meta_box('slz_meta_box_office_slider', __('Office Post Slider Shortcode', 'slz'), 'slz_meta_box_office_slider', 'post', 'normal', 'high');
}

add_action('add_meta_boxes', 'office_slider_shortcode');

function update_office_slider_shortcode($post_id) {
	if(isset($_POST['_slider_shortcode'])){
		$slider_shortcode = sanitize_text_field($_POST['_slider_shortcode']);
		update_post_meta($_POST['post_ID'], '_office_slider_shortcode_milbon', $slider_shortcode);
	}
}

add_action('save_post', 'update_office_slider_shortcode');