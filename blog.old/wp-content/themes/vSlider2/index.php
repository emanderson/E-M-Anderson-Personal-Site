<!-- 
Main loop
-->


<?php get_header(); ?>

<?php 
	$vSlider_normal_posts_closed = get_option('vSlider_normal_posts_closed'); 
	$vSlider_normal_posts_firstopen = get_option('vSlider_normal_posts_firstopen'); 
	
	$counter = 0;
?>

	<div id="content">

	<?php if (have_posts()) : ?>
		
		<?php while (have_posts()) : the_post(); ?>
			
			<!-- Include the post block -->
			<?php 	
				if($vSlider_normal_posts_firstopen && ($counter==0)) {
					include (TEMPLATEPATH . '/post.php'); 
				}
				else {			
					if($vSlider_normal_posts_closed) 
						include (TEMPLATEPATH . '/postClosed.php'); 
					else 
						include (TEMPLATEPATH . '/post.php'); 
				}
			?>
								
		<?php $counter++; endwhile; ?>

		<!-- Bottom navigation, if paged is active -->
		<?php include (TEMPLATEPATH . '/navigation.php'); ?>

	<?php else : ?>
		<!-- Include the notfound block -->
		<?php include (TEMPLATEPATH . '/notfound.php'); ?>	
	<?php endif; ?>
	</div>
	
	

<?php get_sidebar(); ?>

<?php get_footer(); ?>

