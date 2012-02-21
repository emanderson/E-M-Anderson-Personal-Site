<?php
if ( function_exists('register_sidebar') )
register_sidebar(array(
'before_widget' => '<div>',
'after_widget' => '</div>',
'before_title' => '<h2>',
'after_title' => '</h2>',
));

add_filter('comments_template', 'legacy_comments');
function legacy_comments($file) {
	if ( !function_exists('wp_list_comments') ) 
		$file = TEMPLATEPATH . '/legacy.comments.php';
	return $file;
}

function comment_add_microid($classes) {
	$c_email=get_comment_author_email();
	$c_url=get_comment_author_url();
	if (!empty($c_email) && !empty($c_url)) {
		$microid = 'microid-mailto+http:sha1:' . sha1(sha1('mailto:'.$c_email).sha1($c_url));
		$classes[] = $microid;
	}
	return $classes;
}
add_filter('comment_class','comment_add_microid');

?>