<?php

/* == TABLE OF CONTENT ==
=============================
	- SETUP
	- STYLES AND SCRIPTS
	- MISC
	- VIEW COUNT POST
	- INC IMPORTS
*/

// SETUP
function usagsilabs_setup(){
/**
 * Usagilabs setup.
 * version 1.0
 */
	if ( ! isset( $content_width ) ) $content_width = 960;

	// Add Bahasa Tubuh Biar Pinggang gak ngeFlay
	load_theme_textdomain( 'usagilabs', get_template_directory() . '/languages' );

	// This theme styles the visual editor to resemble the theme style.
	add_editor_style( array( 'stylesheets/editor-style.' ) );

	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Top primary menu'),
		'secondary' => __( 'Secondary menu in footer'),
	) );
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form', 'comment-list', 'gallery', 'caption'
	) );
	
	
}
add_action( 'after_setup_theme', 'usagsilabs_setup' );
include 'inc/rhythm.php'; // rhythm
include 'inc/tempo.php'; // tempo
include 'inc/admin.php'; // admin panel by agecuk

function add_custom_sizes() {
    add_image_size( 'singleanime_size', 165, 256, true );
    add_image_size( 'latesteps_size', 88, 125, true );
}
add_action('after_setup_theme','add_custom_sizes');

// STYLES AND SCRIPTS
function usagilabs_scripts() {
	// CSS Load in Internet
	wp_enqueue_style( 'usagilabs_fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css');
	wp_enqueue_style( 'usagilabs_lightbox_css', 'https://use.fontawesome.com/releases/v5.6.3/css/all.css');
	wp_enqueue_style( 'usagilabs_fonts', 'https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i');
	// wp_enqueue_style( 'usagilabs_bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
	// CSS Load in Local Folder
	wp_enqueue_style( 'usagilabs_reset', get_template_directory_uri() . '/lib/reset.css');
	wp_enqueue_style( 'usagilabs_media', get_template_directory_uri() . '/lib/lightslider.min.css');
	wp_enqueue_style( 'usagilabs_style', get_stylesheet_uri());
	if (is_singular()){
		wp_enqueue_style( 'usagilabs_post', get_template_directory_uri() . '/post.css');
	}

	// To Old
	// if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script( 'usagilabs_jquery', get_template_directory_uri() . '/lib/jquery.min.js', array( 'jquery' ),'',false);
	wp_enqueue_script( 'usagilabs_bootstrap', get_template_directory_uri() . '/lib/bootstrap.min.js', '','',false);
	wp_enqueue_script( 'usagilabs_ajax', 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js', '','',false);
	wp_enqueue_script( 'usagilabs_lightbox', 'https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js', '','',false);
	if (is_singular()){
	wp_enqueue_script( 'usagilabs_allowoflight', get_template_directory_uri() . '/lib/jquery.allofthelights.min.js', '','',false);
	}
	if (is_front_page() and is_home()){
	wp_enqueue_script( 'usagilabs_allowoflight', get_template_directory_uri() . '/lib/lightslider.min.js', '','',false);
	}
	//wp_enqueue_script( 'usagilabs_added', get_template_directory_uri() . '/lib/jquery.add.js', '','',false);
}
add_action( 'wp_enqueue_scripts', 'usagilabs_scripts' );

// WIDGETS AND SIDEBARS
function usagilabs_widgets() {
	register_sidebar( array(
		'name' => 'Usagi Sidebar',
		'id' => 'main-sidebar',
		'description' => 'Widgets for the main sidebar.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
		));
}
add_action( 'widgets_init', 'usagilabs_widgets' );
// Header Title from theme Twentyfourteen
function usagilabs_wp_title( $title, $sep ) {
global $paged, $page;
if ( is_feed() ) {return $title;}
// Add the site name.
$title .= get_bloginfo( 'name', 'display' );
// Add the site description for the home/front page.
$site_description = get_bloginfo( 'description', 'display' );
 if ( $site_description && ( is_home() || is_front_page() ) ) {
	$title = "$title $sep $site_description";
}

// Add a page number if necessary.
if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
 $title = "$title $sep " . sprintf( __( 'Page %s', 'twentyfourteen' ), max( $paged, $page ) );
}
return $title;
}
add_filter( 'wp_title', 'usagilabs_wp_title', 10, 2 );

// MISC


/* BREADRCRUMBS */
if ( ! function_exists( 'breadcrumbs' ) ) :
function breadcrumbs() {
$delimiter = '<i class="fa fa-angle-right"></i>';
$home = 'Home';

echo '<div class="breadcrumbs" itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">';
global $post;
echo ' <a itemprop="url" title="Home" href="'.home_url( '/' ).'"><span itemprop="title">'.$home.'</span></a> ';
$cats = get_the_category();
if ($cats) {
foreach($cats as $cat) {
echo $delimiter . "<span itemscope=\"itemscope\" itemtype=\"http://data-vocabulary.org/Breadcrumb\">
<a itemprop=\"url\" title=\"$cat->name\" href=\"".get_category_link($cat->term_id)."\" ><span itemprop=\"title\">$cat->name</span></a>
</span>"; }
}
echo $delimiter . the_title(' <span>', '</span>', false);
echo '</div>';
}
endif;

/* SOCIAL SHARE */
function the_shares() {
global $post;
$postlink  = get_permalink($post->ID);
$posttitle = get_the_title($post->ID);
$html = '<ul class="share-entry cl">';
$html .= '<li><a class="btn shr shr-tw" title="Share on Twitter" rel="external" href="http://twitter.com/share?text='.$posttitle.'&url='.$postlink.'"><i class="fa fa-twitter"></i> Share on Twitter</a></li>';
$html .= '<li><a class="btn shr shr-fb" title="Share on Facebook" rel="external" href="http://www.facebook.com/share.php?u=' . $postlink . '"><i class="fa fa-facebook"></i> Share on Facebook</a></li>';
$html .= '<li><a class="btn shr shr-gp" title="Share on Google+" rel="external" href="https://plusone.google.com/_/+1/confirm?url=' . $postlink . '"><i class="fa fa-google-plus"></i> Share on Google+</a></li>';
$html .= '</ul>';
return $html;
}

/* ERROR NOTICE */
function fallback_menu(){
	if ( is_user_logged_in() ) {echo '<div class="error alert alert-danger" role="alert"><div class="genericon genericon-warning"></div> <strong>No Menu Assigned.</strong> <a href="'.$url = admin_url().'nav-menus.php" class="btn round">Go to Menus</a></div>';}
}

/* BROWSER DETECTION */
add_filter('body_class','browser_body_class');
function browser_body_class($classes) {
	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

	if($is_lynx) $classes[] = 'lynx';
	elseif($is_gecko) $classes[] = 'firefox';
	elseif($is_opera) $classes[] = 'opera';
	elseif($is_NS4) $classes[] = 'ns4';
	elseif($is_safari) $classes[] = 'safari';
	elseif($is_chrome) $classes[] = 'chrome';
	elseif($is_IE) $classes[] = 'ie';
	else $classes[] = 'unknown';

	if($is_iphone) $classes[] = 'iphone';
	return $classes;
}

function numeric_posts_nav() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="pagination"><ul>' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>�</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>�</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link() );

	echo '</ul></div>' . "\n";

}

// VIEW COUNT POST
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

function wpb_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;
    }
    wpb_set_post_views($post_id);
}
add_action( 'wp_head', 'wpb_track_post_views');

function wpb_get_post_views($postID){
     $count_key = 'wpb_post_views_count';
     $count = get_post_meta($postID, $count_key, true);
     if($count == ''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
     return "0";
    }
    return $count;
}

// function my_home_category( $query ) {
//     if ( $query->is_home() ) {
//         $query->set( 'cat', -1 );

//         $query->set( 'posts_per_page', -1);
//     }
// }
// add_action( 'pre_get_posts', 'my_home_category' );
?>