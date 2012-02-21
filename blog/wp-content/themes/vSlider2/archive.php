<!-- 
This is the archive template.
It is called when any archived content is shown (using categories, tags, dates, etc...)
-->

<?php get_header(); ?>

<?php 
	$vSlider_archive_posts_closed = get_option('vSlider_archive_posts_closed'); 
	$vSlider_archive_posts_firstopen = get_option('vSlider_archive_posts_firstopen'); 
	
	$counter = 0;
?>

	<div id="content">

		<?php if (have_posts()) : ?>

			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

			<?php /* If this is a category archive */ if (is_category()) { ?>				
			<h2 class="pagetitle">Archive for the '<?php echo single_cat_title(); ?>' category</h2>
		
 			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
			<h2 class="pagetitle">Archive for <?php the_time('j F, Y'); ?></h2>
		
			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<h2 class="pagetitle">Archive for <?php the_time('F, Y'); ?></h2>

			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<h2 class="pagetitle">Archive for <?php the_time('Y'); ?></h2>
		
		 	<?php /* If this is an author archive */ } elseif (is_author()) { ?>
			<h2 class="pagetitle">Author Archive</h2>
	
			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<h2 class="pagetitle">Blog Archives</h2>
			
		<?php } ?>	
			

		<!-- Navigation when paged -->
		<?php include (TEMPLATEPATH . '/navigation.php'); ?>

		<?php while (have_posts()) : the_post(); ?>
				
			<?php 	
				if($vSlider_archive_posts_firstopen && ($counter==0)) {
					include (TEMPLATEPATH . '/post.php'); 
				}
				else {			
					if($vSlider_archive_posts_closed) 
						include (TEMPLATEPATH . '/postClosed.php'); 
					else 
						include (TEMPLATEPATH . '/post.php'); 
				}
			?>
	
		<?php $counter++; endwhile; ?>

		<!-- Navigation when paged -->
		<?php include (TEMPLATEPATH . '/navigation.php'); ?>
		
	
	<?php else : ?>
		<!-- Include the notfound block -->
		<?php include (TEMPLATEPATH . '/notfound.php'); ?>
	<?php endif; ?>
		
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>