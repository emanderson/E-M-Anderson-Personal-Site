	<?php get_header()?>	
	<div id="main">
	<div id="content">
			<?php if ($posts) : foreach ($posts as $post) : start_wp(); ?>
			<div class="post">
				<?php require('post.php'); ?>
				<?php comments_template(); // Get wp-comments.php template ?>
			</div>
			<?php endforeach; else: ?>
			<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
			<?php endif; ?>
		<p align="center"><?php posts_nav_link() ?></p>		
	</div>
	<div id="sidebar">
	<?php if ($posts) { ?>
	<h2><?php _e('Archived Entry'); ?></h2>
	<ul>
	<li><strong><?php _e('Post Date'); ?>:</strong></li>
	<li><?php the_time('l, M jS, Y') ?> at <?php the_time() ?></li>
	<li><strong><?php _e('Category'); ?>:</strong></li>
	<li><?php the_category(' and '); ?></li>
	<li><strong><?php _e('Do More'); ?>:</strong></li>
	<li><?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Both Comments and Pings are open ?>
							<?php _e('You can'); ?> <a href="#respond"><?php _e('leave a response'); ?></a>, <?php _e('or'); ?> <a href="<?php trackback_url(display); ?>">trackback</a> <?php _e('from your own site'); ?>.
						
						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Only Pings are Open ?>
							<?php _e('Responses are currently closed, but you can'); ?> <a href="<?php trackback_url(display); ?> ">trackback</a> <?php _e('from your own site'); ?>.
						
						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Comments are open, Pings are not ?>
							<?php _e('You can skip to the end and leave a response. Pinging is currently not allowed'); ?>.
			
						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Neither Comments, nor Pings are open ?>
							<?php _e('Both comments and pings are currently closed'); ?>.			
						
						<?php } edit_post_link('Edit this entry.','',''); ?></li>
	</ul>

	<?php }; ?>	
<h2><?php _e('Elsewhere'); ?></h2>
<ul>

<?php if ((function_exists('related_posts')) && is_single() && ($notfound != '1')) { ?> 
	<li><strong><?php _e('Related Entries'); ?></strong></li>
		
			<?php related_posts(10, 0, '<li>', '</li>', '', '', false, false); ?>
		
	
	<?php } ?>
	<?php if ((function_exists('blc_latest_comments'))) { ?> 
	<li><strong><?php _e('Comments'); ?></strong></li>
		
			<?php blc_latest_comments('5','3','false'); ?>
		
	
	<?php } ?>
<li><strong><?php _e('Latest'); ?></strong></li>
		
		
			<?php wp_get_archives('type=postbypost&limit=10'); ?>
	
</ul>
	</div>
<?php  get_footer();?>
</div>
</div>
</body>
</html>