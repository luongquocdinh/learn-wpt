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
						'name' => esc_html__('Sản Phẩm','milbon'),
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
  <label>Show in Slider</label>
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

  	update_post_meta($post->ID, "field_id", $_POST["field_id"]);
}

/**
 * CREATE COLLECTION POST TYPE
 */

add_action( 'init', 'create_brands_collection' );
function create_brands_collection () {
	register_post_type(
			'brands-collection',
			array(
				'labels' => array(
						'name' => esc_html__( 'Collection', 'brands' ),
						'singular_name' => esc_html__( 'Collection', 'brands' ),
						'add_new' => esc_html__( 'Add New', 'brands' ),
						'add_new_item' => esc_html__( 'Add New Item', 'brands' ),
						'edit_item' => esc_html__( 'Edit Item', 'brands' ),
						'new_item' => esc_html__( 'New Item', 'brands' ),
						'view_item' => esc_html__( 'View Item', 'brands' ),
						'search_items' => esc_html__( 'Search Collection', 'brands' ),
						'not_found' => esc_html__( 'No Collection Found', 'brands' ),
						'not_found_in_trash' => esc_html__( 'No Collection Found In Trash', 'brands' )
				),
				'description'	=> esc_html__( 'Create a Collection Brands', 'brands' ),
				'public'	=>	true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'publicly_queryable' => true,
				'has_archive' => true,
				'rewrite'            => array(
					'slug' => esc_html__('brands-collection','brands')
				),
				'menu_position'      => 5,
				'show_in_nav_menus'  => false,
				'menu_icon'          => 'dashicons-book',
				'hierarchical'       => false,
				'query_var'          => true,
				'capability_type' => 'post',
				'supports'           => array(
					'title', /* Text input field to create a post title. */
					'editor',
					'thumbnail', /* Displays a box for featured image. */
				),
				'register_meta_box_cb' => 'add_events_metaboxes_collection'
	));
}

add_action( 'init', 'create_brands_collection_taxonomies', 0 );


function create_brands_collection_taxonomies(){
	register_taxonomy(
		'collection_category',
		'brands-collection', array(
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

// Add metabox link in collection custom post type
function add_events_metaboxes_collection() {
	add_meta_box('wpt_events_location_collection', 'Links', 'wpt_events_location_collection', 'brands-collection', 'side', 'default');
}

// The Event Location Metabox
function wpt_events_location_collection() {
	global $post;

	echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' .
	wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

	$location = get_post_meta($post->ID, '_location', true);

	echo '<input type="text" name="_location" value="' . $location  . '" class="widefat" />';

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
						'name' => esc_html__('Tin Tức','milbon'),
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

function get_slug_category($pid, $taxonomy_name) {
	$category = array();
	$categories = get_the_terms($pid, $taxonomy_name);
	if(!empty($categories)){
		foreach ( $categories as $cat){
			array_push($category, $cat->slug);
		}
		// $post_categories = implode(', ', $category);
	}
	else{
		$category = '';
	}
	return $category;
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
if(!is_admin()){
	require_once ('mobile_detect.php');
	$mobile_detect  = new Mobile_Detect();

	function load_mobile() {
		if(is_home())
			$template_name = get_home_template();
		elseif(is_page())
			$template_name = get_page_template();
		elseif(is_single()) {
			$post_type = get_post_type() !== 'post'?'-'.get_post_type():'';
			$template_name = get_template_directory().'/single'.$post_type.'.php';
			foreach( (array) get_the_category() as $cat ) {
				if($cat->name === 'office'){
					if ( file_exists(TEMPLATEPATH . "/single-office.php") )
						$template_name = get_template_directory().'/single-office.php';
				}
			}
		} elseif (is_archive()) {
			$archive_type = get_queried_object()->name;
			if($archive_type == 'post')
				$archive_type = '';
			else
				$archive_type = '-'.$archive_type;
			$template_name = get_template_directory().'/archive'.$archive_type.'.php';
		}
		$template_name = str_replace('.php', '', $template_name);
		return $template_name.'-sp.php';
	}

	if($mobile_detect->isMobile())
		add_filter('template_include', 'load_mobile');
}

function editor_sp_version($post) {
	if(current_user_can('edit_page',$post->ID)) {
		$content = get_metadata('post', intval($post->ID), '_sp_page_content',true);
		wp_editor($content, '_sp_page_content');
	}else
		return;
}

function content_sp_page() {
	add_meta_box('slz_content_sp_page', __('Content for SP version', 'slz'), 'editor_sp_version', 'page', 'normal', 'high');
}

function save_content_sp_page($post_id) {
	if(!current_user_can('edit_page', $post_id))
		return;
	if(isset($_POST['_sp_page_content']))
		update_post_meta($post_id, '_sp_page_content', $_POST['_sp_page_content']);
}
//add metabox (editor) for sp content.
add_action('add_meta_boxes', 'content_sp_page');
add_action('save_post', 'save_content_sp_page');

//add metabox for collection - custom post type
function attachment_file_form($post) {
	if(current_user_can('edit_post', $post->ID)) :
		$attachment_file_id = get_post_meta($post->ID,'_attachment_file_id', true);
	?>
		<table class="form-table">
			<br>
			<tr class="form-field">
				<input id="slz-attachment" type="hidden" name="_attachment_file_id" readonly="readonly" value="<?php echo $attachment_file_id ?>" />
				<input id="slz-change-attachment" class="button"  type="button" value="Change attachment" />
				<input id="slz-remove-attachment" class="button" style="margin-left: 10px;" type="button" value="Remove attachment" />
				<?php if(!empty($attachment_file_id)): ?>
					<p id="attachment-title"><?php echo get_the_title($attachment_file_id); ?></p>
				<?php endif; ?>
			</tr>
			<tr>
				<div style="margin: auto" id="slz-thumbnail">
					<?php if(!empty($attachment_file_id)): ?>
					<iframe src='<?php echo wp_get_attachment_url($attachment_file_id); ?>' style='width:100%; height:500px' frameborder='0'></iframe>
					<?php endif; ?>
				</div>
			</tr>
		</table>
	<?php
	else:
		return;
	endif;
}

function add_script_media() {
	wp_enqueue_script( 'my_custom_script', get_template_directory_uri() . '/js/media-ajax.js' );
}

function add_attachment_file() {
	add_action('admin_enqueue_scripts', 'add_script_media');
	add_meta_box('slz_attachment_collection', __('PDF Catalog', 'slz'), 'attachment_file_form', 'brands-collection', 'normal', 'high');
}

function save_attachment_file($post_id) {
	if(!current_user_can('edit_post', $post_id))
		return;
	if(isset($_POST['_attachment_file_id']))
		update_post_meta($post_id, '_attachment_file_id', $_POST['_attachment_file_id']);
}

add_action('add_meta_boxes', 'add_attachment_file');
add_action('save_post', 'save_attachment_file');

// adding metabox to insert logo in singular view for brands - custom post type
function add_script_media_logo() {
	wp_enqueue_script( 'my_custom_script_logo', get_template_directory_uri() . '/js/attachement-logo-brand.js' );
}
function attachment_logo_brand($post) {
	if (current_user_can('edit_post', $post->ID)) :
		$attachment_logo_id = get_post_meta($post->ID,'_attachment_logo_id', true);
		?>
		<table class="form-table">
			<br />
			<tr class="form-field">
				<input id="attachment" type="hidden" name="_attachment_logo_id" readonly="readonly" value="<?php echo $attachment_logo_id ?>" />
				<input id="change-attachment" class="button"  type="button" value="Change attachment" />
				<input id="remove-attachment" class="button" style="margin-left: 10px;" type="button" value="Remove attachment" />
				<?php if(!empty($attachment_logo_id)): ?>
					<p id="attachment-title-logo"><?php echo get_the_title($attachment_logo_id); ?></p>
				<?php endif; ?>
			</tr>
			<tr>
				<div style="margin: auto" id="thumbnail-image">
					<?php if(!empty($attachment_logo_id)): ?>
						<img src='<?php echo wp_get_attachment_url($attachment_logo_id); ?>' style='width:100%; height:auto'>
					<?php endif; ?>
				</div>
			</tr>
		</table>
		<?php
	else:
		return;
	endif;
}
function add_logo_brands() {
	add_action('admin_enqueue_scripts', 'add_script_media_logo');
	add_meta_box('slz_logo_brand', __('Logo Brands', 'slz'), 'attachment_logo_brand', 'milbon-brands', 'normal', 'high');
}
add_action('add_meta_boxes', 'add_logo_brands');

function save_attachment_logo($post_id) {
	if(!current_user_can('edit_post', $post_id))
		return;
	if(isset($_POST['_attachment_logo_id']))
		update_post_meta($post_id, '_attachment_logo_id', $_POST['_attachment_logo_id']);
}

add_action('save_post', 'save_attachment_logo');


//adding metabox to insert big image in singular view for brands - custom post type

function attachment_image_form($post) {
	if(current_user_can('edit_post', $post->ID)) :
		$attachment_file_id = get_post_meta($post->ID,'_attachment_file_id', true);
		?>
		<table class="form-table">
			<br>
			<tr class="form-field">
				<input id="slz-attachment" type="hidden" name="_attachment_file_id" readonly="readonly" value="<?php echo $attachment_file_id ?>" />
				<input id="slz-change-attachment" class="button"  type="button" value="Change attachment" />
				<input id="slz-remove-attachment" class="button" style="margin-left: 10px;" type="button" value="Remove attachment" />
				<?php if(!empty($attachment_file_id)): ?>
					<p id="attachment-title"><?php echo get_the_title($attachment_file_id); ?></p>
				<?php endif; ?>
			</tr>
			<tr>
				<div style="margin: auto" id="slz-thumbnail-image">
					<?php if(!empty($attachment_file_id)): ?>
						<img src='<?php echo wp_get_attachment_url($attachment_file_id); ?>' style='width:100%; height:auto'>
					<?php endif; ?>
				</div>
			</tr>
		</table>
		<?php
	else:
		return;
	endif;
}

function add_image_brands() {
	add_action('admin_enqueue_scripts', 'add_script_media');
	add_meta_box('slz_image_brand', __('Images Brands', 'slz'), 'attachment_image_form', 'milbon-brands', 'normal', 'high');
}
add_action('add_meta_boxes', 'add_image_brands');


//// ADD DROPDOWN CATEGORY COLLECTION
add_action( 'add_meta_boxes', 'so_custom_meta_box' );

function so_custom_meta_box($post){
    add_meta_box('so_meta_box', 'Collection', 'custom_element_grid_class_meta_box', 'milbon-brands', 'normal' , 'high');
}

add_action('save_post', 'so_save_metabox');

function so_save_metabox(){ 
    global $post;
    if(isset($_POST['custom_element_grid_class'])){
         //UPDATE: 
        $meta_element_class = $_POST['custom_element_grid_class'];

        //END OF UPDATE

        update_post_meta($post->ID, 'custom_element_grid_class_meta_box', $meta_element_class);
        //print_r($_POST);
    }
}

function custom_element_grid_class_meta_box($post){
	$terms = get_terms( array(
		'taxonomy' => 'collection_category',
		'hide_empty' => false,
	) );
     //true ensures you get just one value instead of an array
    ?>   
    <label>Category:  </label>

    <select name="custom_element_grid_class" id="custom_element_grid_class">
	<?php
		$meta_element_class = get_post_meta($post->ID, 'custom_element_grid_class_meta_box', true);

		if( !empty( $terms ) ) {
			foreach ( $terms as $term ) {
			$value = esc_attr( $term->slug );
			
	?>
      <option value="<?php echo $value ?>" <?php if ($meta_element_class == $value) echo 'selected'?> >
	  	<?php echo esc_html( $term->name ) ?>
	  </option>
	<?php
		}
	}
	?>
    </select>
    <?php
}


//sidebar 
register_sidebar( array(
	'name' => __( 'Showcase Sidebar', 'twentyeleven' ),
	'id' => 'sidebar-1',
	'description' => __( 'The sidebar for the optional Showcase Template', 'twentyeleven' ),
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
) );
