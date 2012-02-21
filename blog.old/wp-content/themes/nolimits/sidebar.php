<div id="sidebar">
	<?php if(is_single()) {?>
		<?php if ($posts) { ?>
	<h2>Archived Entry</h2>
	<ul>
	<li><strong>Post Date :</strong><br /><?php the_time('l, M jS, Y') ?> at <?php the_time() ?></li>
	<li><strong>Category :</strong><br /><?php the_category(' and '); ?></li>
	<li><strong>Do More :</strong><br/><?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Both Comments and Pings are open ?>
							You can <a href="#respond">leave a response</a> or <a href="<?php trackback_url(display); ?>">trackback</a> from your own site.
						
						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Only Pings are Open ?>
							Responses are currently closed, but you can <a href="<?php trackback_url(display); ?> ">trackback</a> from your own site.
						
						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Comments are open, Pings are not ?>
							You can skip to the end and leave a response. Pinging is currently not allowed.
			
						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Neither Comments, nor Pings are open ?>
							Both comments and pings are currently closed.			
						
						<?php } edit_post_link('Edit this entry.','',''); ?></li>
	</ul>
	<?php }; ?>	
		<?php }?>
		<?php if(is_home()) {?>
		<h2><?php _e('What is this ?'); ?></h2>
		<ul><li><?php bloginfo('description'); ?></li></ul>			
		<?php }?>
		<h2>Pages</h2>
		<ul><?php wp_list_pages('title_li=' ); ?></ul>
		
		<h2><?php _e('Search'); ?></h2>
		<form id="searchform" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<input type="text" name="s" id="s" value="<?php echo wp_specialchars($s, 1); ?>" size="15" /><input id="btnSearch" type="submit" name="submit" value="<?php _e('Search'); ?>" />
		</form>
		<h2><?php _e('Tags'); ?></h2>
		<ul>
			<?php list_cats(0, '', 'name', 'ASC', '/', true, 0, 1);    ?>
		</ul>
		<h2><?php _e('Monthly Archives'); ?></h2>
			<ul><?php wp_get_archives('type=monthly'); ?></ul>		

		<?php if(is_home()) {?>
		<h2>Links</h2>
		<ul><?php get_links_list('name'); ?> </ul>

		<h2>Feed on RSS</h2>
		<ul>
			<li><a href="<?php bloginfo('rss2_url'); ?>">Posts</a> | <a href="<?php bloginfo('comments_rss2_url'); ?>">Comments</a></li>			
		</ul>		
		<h2>Meta</h2>
			<ul>
				<?php wp_register(); ?>
				<li><?php wp_loginout(); ?></li>
				<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
				<li><a href="http://jigsaw.w3.org/css-validator/check/referer" title="Valid CSS">Valid <abbr title="Cascading Style Sheet">CSS</abbr></a></li>
				<?php wp_meta(); ?>
			</ul>
		<?php }?>			
	</div>