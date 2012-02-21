	<div id="sidebar">
					
<!-- To edit Sidebar Links modify here-->
<div id="right"><h2>Sponsors</h2>
<ul>
	<li><a href="#">Link1</a></li>
	<li><a href="#">Link2</a></li>
	<li><a href="#">Link3</a></li>
	<li><a href="#">Link4</a></li>
</ul></div>

<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar(2) ) : ?>


<h2>Subscribe</h2>
			<p><?php bloginfo('name'); ?> syndicates its <a href="feed:<?php bloginfo('rss2_url'); ?>">weblog posts</a>
		and <a href="feed:<?php bloginfo('comments_rss2_url'); ?>">Comments</a> using a technology called 
		RSS (Real Simple Syndication). You can use a service like <a href="http://bloglines.com/">Bloglines</a> to get
		notified when there are new posts to this weblog.</p>


		
 <?php
    $today = current_time('mysql', 1);
    if ( $recentposts = $wpdb->get_results("SELECT ID, post_title FROM $wpdb->posts WHERE post_status = 'publish' AND post_date_gmt < '$today' ORDER BY post_date DESC LIMIT 10")):
  ?><li id="recents">
    <h2><div class="menutitle"><?php _e("Recent Posts"); ?></div></h2>
    <ul>
      <?php
foreach ($recentposts as $post) {
        if ($post->post_title == '')
                $post->post_title = sprintf(__('Post #%s'), $post->ID);
        echo "<li><a href='".get_permalink($post->ID)."'>";
        the_title();
        echo '</a></li>';
}
      ?>
    </ul>
  </li>
  <?php endif; ?>


<?php
    global $comment;
    if ( $comments = $wpdb->get_results("SELECT comment_author, comment_author_url, comment_ID, comment_post_ID FROM $wpdb->comments WHERE comment_approved='1' ORDER BY comment_date_gmt DESC LIMIT 5") ) :
  ?>

  <li id="lastcomments"><div class="menutitle"><h2><?php _e('Comments'); ?></div></h2>
    <ul>
      <?php
        foreach ($comments as $comment) {
          echo '<li>' . sprintf('%s <span style="text-transform: lowercase;">on</span><br />%s', get_comment_author_link(), '<a href="'. get_permalink($comment->comment_post_ID) . '#comment-' . $comment->comment_ID . '">' . get_the_title($comment->comment_post_ID) . '</a>');
          echo '</li>';
        }
      ?>
    </ul>
  </li>
  <?php endif; ?>


				<?php /* If this is the frontpage */ if ( is_home() || is_page() ) { ?>				

				<ul>
 				<?php get_links_list(); ?>
				</ul>

<?php } ?>
<?php endif; ?>
				


		
	</div>


