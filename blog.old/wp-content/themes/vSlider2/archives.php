<!-- 
This is the archives template.
It is called when a page named "archives" is called.
-->

<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>

	<div id="content">

		<?php include (TEMPLATEPATH . '/archiveBoxes.php'); ?>
		
	</div>	

<?php get_sidebar(); ?>
<?php get_footer(); ?>
