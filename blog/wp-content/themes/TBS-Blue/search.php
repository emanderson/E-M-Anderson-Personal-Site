<?php get_header(); ?>

	<div id="content">

	<?php if (have_posts()) : ?>

		<h1 class="pagetitle">Search Results</h1>

		<?php while (have_posts()) : the_post(); ?>
				
		<?php include('theLoop.php'); ?>
		
		<?php endwhile; ?>
	
	<?php else : ?>

		<h2 class="center">No posts found. Try a different search?</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>
		
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>