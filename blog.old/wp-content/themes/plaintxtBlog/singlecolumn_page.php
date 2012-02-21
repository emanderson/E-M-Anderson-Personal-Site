<?php
/*
Template Name: Single Column Page
*/
?>
<?php 
	get_header();
?>

<div id="content" class="widecolumn">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
 
	<div id="post-<?php the_ID(); ?>" class="post">
		<div class="post-header">
			<h2 class="post-title"><?php the_title(); ?></h2>
		</div><!-- END POST-HEADER  -->
		<div class="post-entry">
			<?php the_content(); ?>
			<?php link_pages('<p style="font-weight:bold;">Pages: ', '</p>', 'number'); ?>
			<?php edit_post_link('Edit this page', '<p>[', ']</p>'); ?>
		</div><!-- END POST-ENTRY -->
		<!-- <?php trackback_rdf(); ?> -->
	</div><!-- END POST -->	

<?php endwhile; endif; ?>

</div><!-- END CONTENT -->

<?php get_footer(); ?>