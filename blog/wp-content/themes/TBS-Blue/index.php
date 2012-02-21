<?php get_header(); ?>

	<?php if (have_posts()) : ?>
				
<!-- START CONTENT -->
	<div id="content">
		<h1>Home Page</h1>
		
		<?php while (have_posts()) : the_post(); ?>
		
			<?php include('theLoop.php'); ?>
			
			<p class="postmetadata">Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p> 
		
		<?php endwhile; ?>
		
	</div>
<!-- END CONTENT -->

	<?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
