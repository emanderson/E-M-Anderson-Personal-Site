<?php get_header(); ?>
<div id="content" class="narrowcolumn">
	<?php if ($posts) { ?>
		<?php foreach ($posts as $post) : start_wp(); ?>
			<?php require(TEMPLATEPATH. "/post.php");?>
		<?php endforeach; ?>
		<div align="center"><?php posts_nav_link(' — ', __('« Previous Page'), __('Next Page »')); ?></div>
	<?php } else { ?>
		<h2 class="center">Not Found</h2>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php } ?>
	</div>
<? // Begin Sidebar Menu ?>
<?php get_sidebar();?>
<?php get_footer(); ?>