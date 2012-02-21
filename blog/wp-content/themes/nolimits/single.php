<?php get_header()?>	
	<div id="content">
			<?php if ($posts) : foreach ($posts as $post) : start_wp(); ?>
			<div class="post">
				<?php require(TEMPLATEPATH. "/post.php");?>
			</div>
			<?php endforeach; else: ?>
			<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
			<?php endif; ?>
	</div>
<?php get_sidebar();?>
<?php  get_footer();?>
