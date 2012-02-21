<?php get_header(); ?>
<div id="main">
	<div id="content">
	<!--- middle (posts) column  content begin -->
		<?php if (have_posts()) { while (have_posts()) { the_post(); ?>
			<div class="post">
				<?php require('post.php'); ?>
				<?php comments_template(); // Get wp-comments.php template ?>
			</div>
		<?php } } else { ?>
			<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
		<?php } ?>
		<p class="center"><?php posts_nav_link() ?></p>	
	</div>
	<div id="sidebar">
		<?php get_sidebar(); ?>
	</div>
<?php get_footer(); ?>
