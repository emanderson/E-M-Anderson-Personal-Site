<?php

load_theme_textdomain('disconnected');
function d_version() {
$installedVersion = "1.3";
echo "<script src=\"http://disconnected.sourceforge.net/wp-content/themes/disconnected/d-version.php?version=$installedVersion\" type=\"text/javascript\"></script>";
}

function topnav() {
	$disconnected_is_front = get_option('page_on_front'); 
	$disconnected_frontpage = get_option('show_on_front');	
	$disconnected_page_for_posts = get_option('page_for_posts');
	$disconnected_blog_page = get_post($disconnected_page_for_posts, Array_A);
	$disconnected_blog_url = $disconnected_blog_page->guid; ?>
	
	<ul id="topnav">
	
	<li><a href="<?php if ( is_page() ) { bloginfo('home'); } else if ( $disconnected_frontpage == 'page' ) { echo $disconnected_blog_url; } else { bloginfo('home'); } ?>" id="navHome" title="Posted Recently" accesskey="h"><?php _e('Main', 'disconnected') ?></a></li>
	<?php if ( $disconnected_frontpage == 'page' ) {
		wp_list_pages('title_li=&sort_column=menu_order&depth=1&exclude='. $disconnected_is_front); 
	} else { 
		wp_list_pages('title_li=&sort_column=menu_order&depth=1'); 
	} 
	wp_register('<li>','</li>'); ?>	
	<li><?php wp_loginout(); ?></li>
	</ul>
<?php }

// Adds the language function for WP 2.1 blogs. from sandbox. 
function disconnected_language() {
	if ( function_exists('language_attributes') ) {
		language_attributes();
	} else {
		echo 'xml:lang="en-us" lang="en-us"';
	}
}

if (function_exists('add_custom_image_header')) {
define('HEADER_TEXTCOLOR', '000000');
define('HEADER_IMAGE', '%s/img/vaportop.jpg'); // %s is theme dir uri
define('HEADER_IMAGE_WIDTH', 787);
define('HEADER_IMAGE_HEIGHT', 185);

function header_style() {
?>
<style type="text/css">
#header {
	background:#fff url(<?php header_image() ?>) no-repeat bottom center;
}
<?php if ( 'blank' == get_header_textcolor() ) { ?>
#header h1 a, #header #desc {
	display: none;
}
<?php } else { ?>
#header h1 a, #header h1 a:hover {
	color: #<?php header_textcolor() ?>;
}	
<?php } ?>
</style>
<?php
}

function disconnected_admin_header_style() {
?>
<style type="text/css">
#headimg {
	height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
	width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
	padding-top: 20px;
	padding-right: 8px;
}
#headimg * 
{
    width: 760px;
}

#headimg h1
{
	margin: 0;	
	font-size: 1.6em;	
	padding:22px 28px 0 0;
	text-align:right;
}
#headimg h1 a {
	color:#<?php header_textcolor() ?>;
	border: none;
	font-family: Arial, Helvetica, sans-serif;
	font-weight: normal;
	letter-spacing: 1px;
	text-decoration: none;
}
#headimg a:hover
{
	color:#<?php header_textcolor() ?>;
	text-decoration:none;
}
#headimg #desc
{
	font-weight:normal;
	font-style:italic;
	font-size:1em;
	color:#666666;
	text-align:right;
	margin:0;
	padding:0 28px 0 0;
}

<?php if ( 'blank' == get_header_textcolor() ) { ?>
#headerimg h1, #headerimg #desc {
	display: none;
}
#headimg h1 a {
	color:#<?php echo HEADER_TEXTCOLOR ?>;
}
#headimg desc {
    color:#666;
}
<?php } ?>

</style>
<?php
}

add_custom_image_header('header_style', 'disconnected_admin_header_style');
add_action('activity_box_end', 'd_version');
}

if ( function_exists('register_sidebar') ) {
    register_sidebars(1, array(
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<li><strong>',
        'after_title' => '</strong></li>',
        'id' => '1',
        'name' => 'inward'
    ));
    register_sidebars(1, array(
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<li><strong>',
        'after_title' => '</strong></li>',
        'id' => '2',
        'name' => 'outward'
    ));
    unregister_sidebar_widget ( Links );

function widget_linkslist($args) {
    global $wpdb;
	global $wp_db_version;
	extract($args);

	if ( $wp_db_version < 3582 ) {
?>

                  <?php
                   $link_cats = $wpdb->get_results("SELECT cat_id, cat_name FROM $wpdb->linkcategories");
 foreach ($link_cats as $link_cat) {
 ?>

        <?php echo $before_widget; ?>

            <?php echo $before_title
                . $link_cat->cat_name
                . $after_title; ?>
                       
    <?php wp_get_links($link_cat->cat_id); ?>
   <?php echo $after_widget; ?>
  
 <?php } ?>

        

<?php
}
register_sidebar_widget('Links List',
    'widget_linkslist');
} }
?>
