<?php
/*
if ( function_exists('register_sidebars') ) {
	register_sidebars(2);
}
*/
if ( function_exists('register_sidebar') )
    register_sidebar();
	
if ( function_exists('register_sidebar') )
    register_sidebar(array(
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="widget-title">',
        'after_title' => '</div>',
    ));
	
?>
