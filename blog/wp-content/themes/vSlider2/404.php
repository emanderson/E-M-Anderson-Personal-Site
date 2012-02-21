<?php
header("HTTP/1.1 200 OK");
header("Status: 200 OK");
?>
<!-- 
404 Error page
-->

<?php get_header(); ?>

	<div id="content">
		<p>
			Ooooppsss... I don't know how you got here... honestly. Maybe you followed a bad link, or you just typed some
			random URL on your browser.
		</p>
		<p>
			In any case, I'm afraid you got the famous...
		</p>
		<p>
			<img class="centered" src="<?php bloginfo('template_directory'); ?>/images/404.png"/>
		</p>
		<h2 class="center">Page not found!</h2>
		<p>&nbsp;</p>
		<p>
			You can always use one of the links on the top/side bar. Good luck!
		<p>
		</p>
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>