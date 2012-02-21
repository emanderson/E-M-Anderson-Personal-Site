<?php 
get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php the_date('l, F j, Y','<h2 class="date-header">','</h2>'); unset($previousday); ?>

<div class="post" id="post-<?php the_ID(); ?>">
	<h3 class="storytitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title();?>"><?php the_title(); ?></a></h3>

	<div class="storycontent">
		<?php the_content(__('(more...)')); ?>
	</div>

	<div class="meta"><?php _e("posted by"); ?> <?php the_author() ?> at <?php the_time() ?> <!-- <?php _e("filed in"); the_category(',') ?>--> &nbsp; <?php edit_post_link(__('[Edit]')); ?></div>

	<div class="feedback">
            <?php wp_link_pages(); ?>
            <?php comments_popup_link(__('Comments (0)'), __('Comments (1)'), __('Comments (%)')); ?>
	</div>

</div>

<?php comments_template(); // Get wp-comments.php template ?>

<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php posts_nav_link(' &#8212; ', __('&laquo; Previous Page'), __('Next Page &raquo;')); ?>

<?php get_footer(); ?>
