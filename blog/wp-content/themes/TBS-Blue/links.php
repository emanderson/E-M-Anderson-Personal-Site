<?php
/*
Template Name: Links
*/
?>

<?php get_header(); ?>

<div id="content">

	<h1>Links:</h1>
	
	<ul>
		<?php wp_get_links(1); ?>
	</ul>

</div>	

<?php get_sidebar(); ?>

<?php get_footer(); ?>
