<?php get_header(); ?>
<?php get_sidebar(); ?>
	<div id="content">		
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div class="nextbackbox">
				<div class="prevbox"><?php previous_post_link('&lt;&lt; %link') ?></div>
				<div class="nextbox"><?php next_post_link('%link &gt;&gt;') ?></div>
			</div>
		<div class="entrybox" id="post-<?php the_ID(); ?>">

		
			<div class="datetitlewrapper">
				<div class="datebox">
					<div class="datenum"><?php the_time('j') ?></div>
					<div class="dateother"><?php the_time('M Y') ?></div>
				</div>
				
				<div class="titlebox">				
					<div class="entrytitlebox"><?php the_title(); ?></div>
					<div class="comtitlebox">Posted in <?php the_category(', ') ?> by <?php the_author() ?> at <?php the_time('g:i a'); ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></div>
				</div>
			</div>

			
			<div class="entrytext">
			<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
			
			</div>
			<div class="entrytext">
			<br /><small>
						You can follow any responses to this entry through the <?php comments_rss_link('RSS 2.0'); ?> feed. 
						
						<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Both Comments and Pings are open ?>
							You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(true); ?>" rel="trackback">trackback</a> from your own site.
						
						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Only Pings are Open ?>
							Responses are currently closed, but you can <a href="<?php trackback_url(true); ?> " rel="trackback">trackback</a> from your own site.
						
						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Comments are open, Pings are not ?>
							You can skip to the end and leave a response. Pinging is currently not allowed.
			
						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Neither Comments, nor Pings are open ?>
							Both comments and pings are currently closed.			
						
						<?php } edit_post_link('Edit this entry.','',''); ?>
						
					</small>
			</div>
<?php comments_template(); ?>					
		</div>
		
	
	<?php endwhile; else: ?>
	
		<p>Sorry, no posts matched your criteria.</p>
	
<?php endif; ?>

	

		</div>

<?php get_footer(); ?>