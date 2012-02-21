<?php 
get_header();
?>

<div id="content">

<?php query_posts('showposts=4'); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="post">
	 <h3 class="posttitle" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
	<div class="details"><div class="inside">Written by <?php the_author_posts_link() ?> on <?php the_time('d.m.Y');?> |
				<?php the_category(', ') ?> <?php edit_post_link('Edit this', ' - ', ''); ?></div></div>
	
	<div class="postcontent">
	<?php if (function_exists('the_excerpt_reloaded')) { ?>
	<?php the_excerpt_reloaded(120, '<p><a><ul><ol><li><img><br /><blockquote><em><strong><div>', 'content', FALSE, '', FALSE, 1, TRUE); ?>
	<?php } else { ?>
	<?php the_excerpt(); ?>
	<?php } ?>
	</div>
	
	<div class="details"><div class="inside"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?> so far | <a href="<?php the_permalink() ?>">Read On &raquo;</a></div></div>
	
	<!--
	<?php trackback_rdf(); ?>
	-->

</div>

<?php comments_template(); // Get wp-comments.php template ?>
<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
	
</div>
<?php get_sidebar(); ?>
</div> <!-- closes container -->

<?php include(TEMPLATEPATH . '/bottombar.php') ?>

<?php get_footer(); ?>
