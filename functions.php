<?php
add_theme_support( 'post-thumbnails' );
add_action( 'after_setup_theme', 'meisho_setup' );

if ( ! function_exists( 'meisho_setup' ) ):

function meisho_setup() {
	require( get_template_directory() . '/inc/widgets.php' );
}
endif;


function twentyeleven_widgets_init() {

	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'twentyeleven' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );


	register_sidebar( array(
		'name' => __( 'Footer Area One', 'twentyeleven' ),
		'id' => 'sidebar-3',
		'description' => __( 'An optional widget area for your site footer', 'twentyeleven' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Area Two', 'twentyeleven' ),
		'id' => 'sidebar-4',
		'description' => __( 'An optional widget area for your site footer', 'twentyeleven' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Area Three', 'twentyeleven' ),
		'id' => 'sidebar-5',
		'description' => __( 'An optional widget area for your site footer', 'twentyeleven' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'twentyeleven_widgets_init' );

/**
 * Count the number of footer sidebars to enable dynamic classes for the footer
 */
function twentyeleven_footer_sidebar_class() {
	$count = 0;

	if ( is_active_sidebar( 'sidebar-3' ) )
		$count++;

	if ( is_active_sidebar( 'sidebar-4' ) )
		$count++;

	if ( is_active_sidebar( 'sidebar-5' ) )
		$count++;

	$class = '';

	switch ( $count ) {
		case '1':
			$class = 'one';
			break;
		case '2':
			$class = 'two';
			break;
		case '3':
			$class = 'three';
			break;
	}

	if ( $class )
		echo 'class="' . $class . '"';
}


function meisho_body_classes( $classes ) {

	if ( function_exists( 'is_multi_author' ) && ! is_multi_author() )
		$classes[] = 'single-author';

	if ( is_singular() && ! is_home() && ! is_page_template( 'showcase.php' ) && ! is_page_template( 'sidebar-page.php' ) )
		$classes[] = 'singular';

	return $classes;
}
add_filter( 'body_class', 'meisho_body_classes' );

function mk_parse_query($query) {
  if ($query->query_vars['post_type'] == 'meisho_event') {
        set_query_var( 'posts_per_page', 5);
  }elseif ($query->query_vars['post_type'] == 'news') {
        set_query_var( 'posts_per_page', 10);
  }elseif ($query->query_vars['post_type'] == 'meisho_recommended') {
        set_query_var( 'posts_per_page', 10);
  }
}

add_filter('pre_get_posts','mk_parse_query',1);

//Start of Paganavi
function wp_corenavi($wp_query) {
global $wp_rewrite;
$pages = '';
$max = $wp_query->max_num_pages;
if (!$current = get_query_var('paged')) $current = 1;
$current_a = $_GET['current'];
$a['base'] = ($wp_rewrite->using_permalinks()) ? user_trailingslashit( trailingslashit( remove_query_arg( 'current', remove_query_arg( 's', get_pagenum_link( 1 )) ) ) . 'page/%#%/', 'paged' ) : @add_query_arg('paged','%#%');
if( !empty($current_a) )
$a['base'] = $a['base'].'?current='.$current_a;
if( !empty($wp_query->query_vars['s']) ) $a['add_args'] = array( 's' => get_query_var( 's' ) );
$a['total'] = $max;
$a['current'] = $current;

$total = 1; //1 - display the text "Page N of N", 0 - not display
$a['mid_size'] = 5; //how many links to show on the left and right of the current
$a['end_size'] = 1; //how many links to show in the beginning and end
$a['prev_text'] = '&laquo; 前へ'; //text of the "Previous page" link
$a['next_text'] = '次へ &raquo;'; //text of the "Next page" link

if ($max > 1) echo '<div class="pagenavi">';
echo $pages . paginate_links($a);
if ($max > 1) echo '</div>';
}//End of Paganavi


function list_posts_by_taxonomy( $post_type, $taxonomy, $get_terms_args = array(), $wp_query_args = array() ){
    $tax_terms = get_terms( $taxonomy, $get_terms_args );
    if( $tax_terms ){
        foreach( $tax_terms  as $tax_term ){
            $query_args = array(
                'post_type' => $post_type,
                "$taxonomy" => $tax_term->slug,
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'ignore_sticky_posts' => true,
                'orderby' => 'name',
				'order' => 'ASC'
            );
            $query_args = wp_parse_args( $wp_query_args, $query_args );

            $my_query = new WP_Query( $query_args );
            if( $my_query->have_posts() ) { ?>
				<h3 id="<?php echo $tax_term->slug; ?>" class="h3_title"><?php echo $tax_term->name; ?></h3>
				<ul class="company_list clearFix">
					 <?php $i=0; while ($my_query->have_posts()) : $my_query->the_post(); ?>
					 <?php $i++; ?>
                    <li <?php if($i%2==0) echo 'class="odd"'; ?>><a target="_blank" <?php $member_url = esc_html( get_post_meta( get_the_ID(), 'member_url', true ) ); if($member_url!='') echo 'href="'.$member_url.'"';?>  title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
					<?php endwhile; ?>

				</ul>
                <?php
            }
            wp_reset_query();
        }
    }
}


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
						'name' => esc_html__('Post Links','milbon'),
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
}

// The Event Location Metabox
function wpt_events_location_links() {
	global $post;

	echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' .
	wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

	$location = get_post_meta($post->ID, '_location', true);

	echo '<input type="text" name="_location" value="' . $location  . '" class="widefat" />';

}

// Save the Metabox Data
function wpt_save_events_meta($post_id, $post) {

	if ( !wp_verify_nonce( $_POST['eventmeta_noncename'], plugin_basename(__FILE__) )) {
	return $post->ID;
	}

	if ( !current_user_can( 'edit_post', $post->ID ))
		return $post->ID;

	$events_meta['_location'] = $_POST['_location'];

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

?>

<?php
/**
 * CREATE BRAND POST TYPE
 */
?>
<?php
add_action( 'init', 'create_milbon_brands' );
function create_milbon_brands () {
	register_post_type('milbon-brands',
			array(
				'labels' => array(
						'name' => esc_html__('Post Brands','milbon'),
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
						'name' => esc_html__('Mibon News','milbon'),
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


function get_first_cateogry($pid, $post_type){
	$categories = get_the_terms($pid, $post_type);
	foreach ( $categories as $cat){
		echo $cat->name;
	}
}

/*
 * Add meta box for Brand
 */

add_action( 'add_meta_boxes', 'add_brands_metaboxes_links' );
function add_brands_metaboxes_links() {
	add_meta_box('wpt_brands_titles_japan', 'Title', 'wpt_brands_titles_japan', 'milbon-brands', 'side', 'default');
}

function wpt_brands_titles_japan() {
	global $post;

	echo '<input type="hidden" name="brandmeta_noncename" id="brandmeta_noncename" value="' .
	wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

	$location = get_post_meta($post->ID, '_title_japanese', true);

	echo '<input type="text" name="_title_japanese" value="' . $location  . '" class="widefat" />';

}

function wpt_save_brands_meta($post_id, $post) {

	if ( !wp_verify_nonce( $_POST['brandmeta_noncename'], plugin_basename(__FILE__) )) {
	return $post->ID;
	}

	if ( !current_user_can( 'edit_post', $post->ID ))
		return $post->ID;

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
add_action('save_post', 'wpt_save_brands_meta', 1, 2);