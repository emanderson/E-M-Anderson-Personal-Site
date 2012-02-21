<?php 
require_once(TEMPLATEPATH . '/library/pp-options.php');
require_once(TEMPLATEPATH . '/library/widgets.php');
?>
<?php
add_filter( 'comments_template', 'legacy_comments' );
function legacy_comments( $file ) {
	if ( !function_exists('wp_list_comments') )
		$file = TEMPLATEPATH . '/comments-legacy.php';
	return $file;
}
?>