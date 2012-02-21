<!-- 
Specific page to show plugins
-->
<?php
/*
Template Name: Plugins List
*/
?>

<?php get_header(); ?>

	<?php the_post(); ?>


	<div id="content">

			<!-- Include the post block -->
			<?php include (TEMPLATEPATH . '/pagePostTop.php'); ?>
			<?php the_title(); ?>
			<?php include (TEMPLATEPATH . '/pagePostMiddle.php'); ?>
			<?php the_content(); ?>
			
			<!-- Metadata - tags, categories, comments and so on... -->
			<p class="postmetadata"> 					
				<?php edit_post_link('Edit','','<strong>&nbsp;&nbsp;&nbsp; </strong>'); ?>
			</p> 
			<?php include (TEMPLATEPATH . '/pagePostBottom.php'); ?>

	
			<?php if (function_exists('displayPluginsAsTable')) { ?>
				<?php displayPluginsAsTable('pluginslist',0); ?>
			<?php } ?>
						
	</div>
		

<?php get_sidebar(); ?>

<?php get_footer(); ?>