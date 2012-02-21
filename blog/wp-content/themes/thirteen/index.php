<?php get_header(); ?>

<div id="content">

	<?php if (have_posts()) : ?>
		
		<?php while (have_posts()) : the_post(); ?>
		
			<div class="post" id="post-<?php the_ID(); ?>">
				<h2 class="posttitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent link to'); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h2>
				
				<p class="postdate">
					<?php the_time('F jS, Y') ?> <?php _e('at'); ?> <?php the_time() ?>
					(<?php the_category(', ') ?>)
					<?php edit_post_link(__('Edit'),' &#183; ',''); ?>
				</p>
				
				<div class="postentry">
					<?php the_content(__('Read the rest of this entry &raquo;')); ?>
				</div>
				
				<p class="postmeta">
					<?php comments_popup_link('Comments', '1 Comments', '% Comments'); ?>
				</p>
			</div>
	
		<?php endwhile; ?>

		<p>
			<?php posts_nav_link('', __(''), __('&laquo; Previous entries')); ?>
			<?php posts_nav_link(' &#183; ', __(''), __('')); ?>
			<?php posts_nav_link('', __('Next entries &raquo;'), __('')); ?>
		</p>
		
	<?php else : ?>

		<h2 class="posttitle"><?php _e('Not Found'); ?></h2>
		<p><?php _e('Sorry, but no posts matched your criteria.'); ?></p>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
