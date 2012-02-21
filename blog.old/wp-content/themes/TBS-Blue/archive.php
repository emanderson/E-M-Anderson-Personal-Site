<?php get_header(); ?>

<div id="content">

	<?php if (have_posts()) : ?>

	<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
	<?php /* If this is a category archive */ if (is_category()) { ?>				
	<h1 class="pagetitle">Archive for the '<?php echo single_cat_title(); ?>' Category</h1>
		
 	<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
	<h1 class="pagetitle">Archive for <?php the_time('F jS, Y'); ?></h1>
		
	<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
	<h1 class="pagetitle">Archive for <?php the_time('F, Y'); ?></h1>

	<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
	<h1 class="pagetitle">Archive for <?php the_time('Y'); ?></h1>
		
	<?php /* If this is a search */ } elseif (is_search()) { ?>
	<h1 class="pagetitle">Search Results</h1>
		
	<?php /* If this is an author archive */ } elseif (is_author()) { ?>
	<h1 class="pagetitle">Author Archive</h1>

	<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
	<h1 class="pagetitle">Blog Archives</h1>

	<?php } ?>

	<?php while (have_posts()) : the_post(); ?>

	<?php include('theLoop.php'); ?>
		
	<p class="postmetadata">Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p> 
	
	<?php endwhile; ?>
	
	<?php else : ?>

	<h2 class="center">Not Found</h2>
	<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>
		
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>