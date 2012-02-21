<?php get_header(); ?>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left" valign="top" id="leftcolumn">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<div class="navigation">
			<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
			<div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
		</div>
	
		<div class="post" id="post-<?php the_ID(); ?>">
			<h2><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h2>
			<div class="entrytext">
				<?php the_content('<p>Read the rest of this entry &raquo;</p>'); ?>
	
				<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
	
				<p class="postmetadata alt">
					<small>
						This entry was posted
						<?php /* This is commented, because it requires a little adjusting sometimes.
							You'll need to download this plugin, and follow the instructions:
							http://binarybonsai.com/archives/2004/08/17/time-since-plugin/ */
							/* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); echo time_since($entry_datetime); echo ' ago'; */ ?> 
						on <?php the_time('l, F jS, Y') ?> at <?php the_time() ?>
						and is filed under <?php the_category(', ') ?>.
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
				</p>
				<?php if ($newzen->option['sharethis'] == "true") { ?> 
					<div style="border: 1px dotted rgb(153, 153, 153); background-color: rgb(244, 243, 234); padding:5px 5px 5px 5px; vertical-align:middle;">
					<center>
					<a href="http://digg.com/submit?phase=2&url=<?php echo get_permalink() ?>"><img alt="Digg this" border="0" src="<?php bloginfo('stylesheet_directory'); ?>/images/ico_digg.gif"></a>
					&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://del.icio.us/post?url=<?php echo get_permalink() ?>&title=<?php the_title(); ?>"><img alt="Create a del.icio.us Bookmark" border="0" src="<?php bloginfo('stylesheet_directory'); ?>/images/ico_delicious.gif"></a>
					&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.newsvine.com/_tools/seed&save?u=<?php echo get_permalink() ?>&h=<?php the_title(); ?>"><img alt="Add to Newsvine" border="0" src="<?php bloginfo('stylesheet_directory'); ?>/images/ico_newsvine.gif"></a>
					</center>
					</div>
				<?php } ?>
				
			</div>
		</div>
		
	<?php comments_template(); ?>
	
	<?php endwhile; else: ?>
	
		<p>Sorry, no posts matched your criteria.</p>
	
<?php endif; ?>			</td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<?php get_footer(); ?>