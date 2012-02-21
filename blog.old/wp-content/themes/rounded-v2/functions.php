<?php
if ( function_exists('register_sidebar') )
{
	ob_start();
	bloginfo('template_directory');
	$a = ob_get_clean();

	register_sidebar(array(
        'before_widget' => '<div class="sideitem"><div class="boxhead"><div class="headfill">&nbsp;</div></div><div class="boxbody">',
        'after_widget' => '</div></div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
}
?>
<?


?>