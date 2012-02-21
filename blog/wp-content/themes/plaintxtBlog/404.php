<?php 
	header("HTTP/1.1 404 Not Found");
	get_header();
	get_sidebar();
?>

<div id="content" class="narrowcolumn">

<?php /* INCLUDE FOR ERROR TEXT */ include (TEMPLATEPATH . '/errortext.php'); ?>
 
</div><!-- END CONTENT -->

<?php get_footer(); ?>