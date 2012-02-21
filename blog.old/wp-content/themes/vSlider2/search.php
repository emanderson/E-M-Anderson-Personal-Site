<!-- 
This is the search template.
It is called when a search is executed. All other actions go to archive.php
-->


<?php get_header(); ?>

<?php 
	$vSlider_search_posts_closed = get_option('vSlider_search_posts_closed'); 
	$vSlider_search_posts_firstopen = get_option('vSlider_search_posts_firstopen'); 
	
	$counter = 0;
?>

	<div id="content">

		<!-- Posts exist -->
		<?php if (have_posts()) : ?>

			<h2 class="pagetitle">Search Results</h2>
		
			<!-- Navigation when paged -->
			<?php include (TEMPLATEPATH . '/navigation.php'); ?>

			<?php while (have_posts()) : the_post(); ?>
					
				<!-- Include the post block -->
				<?php 	
					if($vSlider_search_posts_firstopen && ($counter==0)) {
						include (TEMPLATEPATH . '/post.php'); 
					}
					else {			
						if($vSlider_search_posts_closed) 
							include (TEMPLATEPATH . '/postClosed.php'); 
						else 
							include (TEMPLATEPATH . '/post.php'); 
					}
				?>
		
			<?php $counter++; endwhile; ?>

			<!-- Navigation when paged -->
			<?php include (TEMPLATEPATH . '/navigation.php'); ?>
		
		
		<!-- No posts exist -->
		<?php else : ?>
			<!-- Include the notfound block -->
			<?php include (TEMPLATEPATH . '/notfound.php'); ?>
			<div class="hr"></div>
			<?php include (TEMPLATEPATH . '/archiveBoxes.php'); ?>
		<?php endif; ?>
		
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>