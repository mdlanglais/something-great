<?php

/*-------------------------------------------------------------------------*/
/*                           ADD THEME SUPPORT                             */
/*-------------------------------------------------------------------------*/

add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('automatic-feed-links');
add_theme_support('title-tag');
add_theme_support('custom-header');
add_theme_support('custom-background');
add_editor_style('css/editor-style.css');

if (!isset($content_width)) $content_width = 900;

add_action ('after_setup_theme', 'wpse_add_title_support');
apply_filters('document_title_separator', '|');
apply_filters( 'document_title_parts', 'site,title');
function wpse_add_title_support() {
	add_theme_support( 'title-tag' );
}

// Remove default Wordpress admin bar styling
add_action('get_header', 'remove_admin_login_header');
function remove_admin_login_header() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}

$defaults = array(
	'before'           => '<p>' . __('Pages:', 'something-great'),
	'after'            => '</p>',
	'link_before'      => '',
	'link_after'       => '',
	'next_or_number'   => 'number',
	'separator'        => ' ',
	'nextpagelink'     => __('Next page', 'something-great'),
	'previouspagelink' => __('Previous page', 'something-great'),
	'pagelink'         => '%',
	'echo'             => 1
);
wp_link_pages( $defaults );

// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');

/*-------------------------------------------------------------------------*/
/*                      REGISTER WIDGETS AND MENUS                         */
/*-------------------------------------------------------------------------*/

add_action( 'widgets_init', 'theme_slug_widgets_init' );
function theme_slug_widgets_init() {

	if (function_exists('register_sidebar')) {
		register_sidebar(array(
			'name' => __('Sidebar', 'something-great'),
			'id'   => 'sidebar',
			'description'   => __('This is a widgetized area displaying an optional sidebar.', 'something-great'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>'
		));
		register_sidebar(array(
			'name' => __('Google Map', 'something-great'),
			'id'   => 'map',
			'description'   => __('This is a widgetized area displaying an optional google map.', 'something-great'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>'
		));
		register_sidebar(array(
			'name' => __('Footer About Us', 'something-great'),
			'id'   => 'footer-about',
			'description'   => __('This is a widgetized area displaying an About Us content area in the footer.', 'something-great'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>'
		));
		register_sidebar(array(
			'name' => __('Footer Contact Us', 'something-great'),
			'id'   => 'footer-contact',
			'description'   => __('This is a widgetized area displaying a Contact Us area in the footer.', 'something-great'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>'
		));
	}

}

if (function_exists('register_nav_menu'))
{
    register_nav_menu('primary-menu', 'Primary Menu');
	register_nav_menu('footer-menu', 'Footer Menu');
	register_nav_menu('sidebar-menu', 'Sidebar Menu');
	register_nav_menu('social-menu', 'Social Icons Menu');
}

/*-------------------------------------------------------------------------*/
/*                         BOOTSTRAP WP NAVWALKER                          */
/*-------------------------------------------------------------------------*/

class BS3_Walker_Nav_Menu extends Walker_Nav_Menu {
	/**
	 * Traverse elements to create list from elements.
	 *
	 * Display one element if the element doesn't have any children otherwise,
	 * display the element and its children. Will only traverse up to the max
	 * depth and no ignore elements under that depth. It is possible to set the
	 * max depth to include all depths, see walk() method.
	 *
	 * This method shouldn't be called directly, use the walk() method instead.
	 *
	 * @since 2.5.0
	 *
	 * @param object $element Data object
	 * @param array $children_elements List of elements to continue traversing.
	 * @param int $max_depth Max depth to traverse.
	 * @param int $depth Depth of current element.
	 * @param array $args
	 * @param string $output Passed by reference. Used to append additional content.
	 * @return null Null on failure with no changes to parameters.
	 */
	function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
		$id_field = $this->db_fields['id'];
 
		if ( isset( $args[0] ) && is_object( $args[0] ) )
		{
			$args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
 
		}
 
		return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}
 
	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param int $current_page Menu item ID.
	 * @param object $args
	 */
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		if ( is_object($args) && !empty($args->has_children) )
		{
			$link_after = $args->link_after;
			$args->link_after = ' <b class="caret"></b>';
		}
 
		parent::start_el($output, $item, $depth, $args, $id);
 
		if ( is_object($args) && !empty($args->has_children) )
			$args->link_after = $link_after;
	}
 
	/**
	 * @see Walker::start_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of page. Used for padding.
	 */
	function start_lvl(&$output, $depth = 0, $args = array()) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"dropdown-menu list-unstyled\">\n";
	}
}

add_filter('nav_menu_link_attributes', function($atts, $item, $args) {
	if ($args->has_children)
	{
		$atts['data-toggle'] = 'dropdown';
		$atts['class'] = 'dropdown-toggle';
	}
 
	return $atts;
}, 10, 3);

/*-------------------------------------------------------------------------*/
/*                          WOOCOMMERCE SUPPORT                            */
/*-------------------------------------------------------------------------*/

add_action('after_setup_theme', 'woocommerce_support');
function woocommerce_support() {
    add_theme_support('woocommerce');
}

remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '<section id="main">';
}

function my_theme_wrapper_end() {
  echo '</section>';
}

add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 24;' ), 20 );

/*-------------------------------------------------------------------------*/
/*                           ADD MAPS API KEY                              */
/*-------------------------------------------------------------------------*/

// define Google Maps API key for Advanced Custom Fields Map custom field type. 
// Set this key value on a project by project basis.
function my_acf_google_map_api($api){
	
	$api['key'] = 'xxx';
	
	return $api;
	
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

/*-------------------------------------------------------------------------*/
/*                           CUSTOM LOGIN LOGO                             */
/*-------------------------------------------------------------------------*/

function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url('http://dummyimage.com/200x200/222222/eeeeee');
		height:130px;
		width:320px;
		background-size: 125px 125px;
		background-repeat: no-repeat;
		background-color: transparent !important;
  		border-radius: 0 !important;
  		padding-bottom: 0 !important;
	}
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

/*-------------------------------------------------------------------------*/
/*                        ENQUEUE ALL THE THINGS                           */
/*-------------------------------------------------------------------------*/

if (is_singular()) wp_enqueue_script( "comment-reply" );

function tb_scripts() {
	wp_enqueue_style('mdl-jquery-ui-css', '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');
	wp_enqueue_style('mdl-bs-style', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style('mdl-full-width-bs', get_template_directory_uri() . '/css/full-width-bs.css');
	wp_enqueue_style('mdl-flex-style', get_template_directory_uri() . '/css/flexslider.css');
	wp_enqueue_style('mdl-editor-style', get_template_directory_uri() . '/css/editor-style.css');
	wp_enqueue_style('mdl-style', get_template_directory_uri() . '/style.css');

	wp_enqueue_script('jquery-js', get_template_directory_uri() . '/js/vendor/jquery.js');
	wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.bundle.min.js');
	wp_enqueue_script('mdl-flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js');
	wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js');
}

add_action('wp_enqueue_scripts', 'tb_scripts');

?>