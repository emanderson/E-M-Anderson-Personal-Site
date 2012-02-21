<?php
if (function_exists('register_sidebar'))
    register_sidebar(array('name'=>'sidebar',
        'before_widget' => '<div class="top"></div><div class="middle">',
        'after_widget' => '</div><div class="bottom"></div>',
        'before_title' => '<div class="title"><h3>',
        'after_title' => '</h3></div>',
    ));
add_filter('comments_template', 'legacy_comments');
function legacy_comments($file) {
	if(!function_exists('wp_list_comments')) $file = TEMPLATEPATH . '/legacy.comments.php';
	return $file;
}
?>