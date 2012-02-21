<?php get_header(); ?>

	<div id="content" class="narrowcolumn">
				
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  
		<div class="navigation">
			<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
			<div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
		</div>
	
		<div class="post" id="post-<?php the_ID(); ?>">
			<h2><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h2>
	
			<div class="entrytext">
				<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
	
				<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
	
				<p class="postmetadata alt">
					<small>
						<?php /* This is commented, because it requires a little adjusting sometimes.
							You'll need to download this plugin, and follow the instructions:
							http://binarybonsai.com/archives/2004/08/17/time-since-plugin/ */
							/* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); echo time_since($entry_datetime); echo ' ago'; */ ?> 
						<?php the_time('l, F jS, Y') ?> at <?php the_time() ?>.<br />
						Filed under <?php the_category(', ') ?>.<br />
						Subscribe to <?php comments_rss_link('RSS 2.0'); ?>.<br />
												
						<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Both Comments and Pings are open ?>
							Leave a <a href="#respond">comment</a> or <a href="<?php trackback_url(true); ?>" rel="trackback">trackback</a>.<br />
						
						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Only Pings are Open ?>
							Comments disabled, leave <a href="<?php trackback_url(true); ?> " rel="trackback">trackback</a>.<br />
						
						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Comments are open, Pings are not ?>
							Skip to the end and leave a comment. Pinging disabled.<br />
			
						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Neither Comments, nor Pings are open ?>
							Comments and trackbacks disabled.<br />

<?php }  ?>

					</small>
				</p>
	
			</div>
		</div>
		
	<?php comments_template(); ?>

	<?php endwhile; else: ?>
	
		<p>Sorry, no posts matched your criteria.</p>
	
<?php endif; ?>
	
	</div>




	
<?php get_sidebar(); ?>

<?php get_footer(); ?>
