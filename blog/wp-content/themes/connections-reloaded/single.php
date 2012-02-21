<?php get_header()?>	
<div id="main">
	<div id="content">
	<!--- middle (posts) column  content begin -->
		<?php if (have_posts()) { while (have_posts()) { the_post(); ?>
			<div class="post">
				<?php require('post.php'); ?>
				<div class="navigation">
					<div class="center"><?php previous_post_link('&laquo; %link') ?> | <?php next_post_link('%link &raquo;') ?></div>
				</div>
				<div class="post-footer">&nbsp;</div>
				<?php comments_template(); // Get wp-comments.php template ?>
			</div>
		<?php } } else { ?>
			<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
		<?php } ?>
	<!--- middle (main content) column content end -->
	</div>
	<div id="sidebar">
		<ul>
		<?php if (have_posts()) { ?>
			<li id="archivedentry">
				<h2><?php _e('Archived Entry'); ?></h2>
				<ul>
					<li><strong><?php _e('Post Date :'); ?></strong></li>
					<li><?php the_time('l, M jS, Y'); _e(' at '); the_time() ?></li>
					<li><strong><?php _e('Category :'); ?></strong></li>
					<li><?php the_category(' and '); ?></li>
					<li><strong><?php _e('Do More :'); ?></strong></li>
					<li><?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) 
						{
							// Both Comments and Pings are open 
							_e('You can <a href="#respond">leave a response</a>, or <a href="'); trackback_url(display); _e('">trackback</a> from your own site.'); 
						}
						elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status))
						{
							// Only Pings are Open 
							_e('Responses are currently closed, but you can <a href="'); trackback_url(display); _e('">trackback</a> from your own site.');
						}
						elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status))
						{
							// Comments are open, Pings are not
							_e('You can skip to the end and leave a response. Pinging is currently not allowed.');
						}
						elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status))
						{
							// Neither Comments, nor Pings are open
							_e('Both comments and pings are currently closed.');
						}
						edit_post_link(' Edit this entry.','',''); ?>
					</li>
				</ul>
			</li>
		<?php } ?>
		</ul>
			<?php get_sidebar(); ?>
	</div>
<?php  get_footer();?>
