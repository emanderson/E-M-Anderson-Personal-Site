<!-- 
This is the comments block
It should be included when comments should be displayed
-->


<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

        if (!empty($post->post_password)) { // if there's a password
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
				?>
				
				<p class="nocomments"><?php _e("This post is password protected. Enter the password to view comments."); ?><p>
				
				<?php
				return;
            }
        }

?>

<!-- You can start editing here. -->

<div id="comments">

<!-- Comment count -->
<p class="respond">
	<?php comments_number('No Responses', 'One Response', '% Responses' );?> to &#8220;<?php the_title(); ?>&#8221;
</p> 

<!-- Comment RSS -->
<div class="commentsrss">		
		<a href="feed/" title="RSS feed for the comments of this post">
			<img src="<?php bloginfo('template_directory'); ?>/images/rss.gif" alt="RSS feed for the comments of this post"/>
		</a>
</div>

<?php if ($comments) : ?>

	<?php foreach ($comments as $comment) : ?>
		
		
		<!-- Determine if the author of the comment is the blog author -->
		<?php if ($comment->comment_author_email == get_the_author_email()) 
						$commentStyle = "-admin"; 
					else
						$commentStyle = ""; 
		?>		
		<div class="comment-top<?php echo $commentStyle ?>">
		<div class="comment-bottom">
		<div class="comment-body">
		
		
			<!-- Comment title -->
			<div class="comment-title<?php echo $commentStyle ?>">
				<small>						
				<strong><?php comment_author_link() ?></strong>
				<?php comment_type(
					"wrote a <strong>comment</strong>",
					"sent a <strong>trackback</a></strong>",
					"sent a <strong>pingback</strong>"); ?>
				on <?php comment_date() ?>
					
				<?php if ($comment->comment_approved == '0') : ?>
					<br/>
					<em>Your comment is awaiting moderation.</em>
				<?php endif; ?>
				</small>
			</div>
		
			<!-- Comment contents -->
			<div class="comment-body-contents">							
				<?php comment_text() ?>
				
				<p class="postmetadata"> 
					<?php edit_comment_link('Edit','',''); ?>
				</p> 			
			</div>
		</div>
		</div>
		</div>

	<?php endforeach; /* end for each comment */ ?>
	<?php else : // this is displayed if there are no comments so far ?>
<?php endif; ?>


<?php if ('open' == $post-> comment_status) : ?>

	<p class="respond">
		Care to comment?
	</p>
	
	<!-- Trackback URL -->
	<div class="trackback">
		<a href="<?php trackback_url(display); ?>" title="Use this URL to trackback from your own blog">
			<img src="<?php bloginfo('template_directory'); ?>/images/trackback.gif" alt="Use this URL to trackback from your own blog"/>
		</a>
	</div>

	<!-- Must be logged in -->
	<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
		<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p>

	<?php else : ?>
	
		<!-- If the user is logged in -->
		<?php if ( $user_ID ) : ?>
			Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e('Log out of this account') ?>">Logout &raquo;</a>
		<?php endif; ?>
			
		
		
		<!-- If one can post, then the form starts here -->
		<form name="commentform" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

			<!-- If the user is not logged in -->
			<?php if ( !$user_ID ) : ?>
				<p>
					<input class="textform" type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
					<label for="author"><small>Name <?php if ($req) _e('(required)'); ?></small></label>
				</p>

				<p>
					<input class="textform" type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
					<label for="email"><small>Mail (will not be published) <?php if ($req) _e('(required)'); ?></small></label>
				</p>
				
				<p>
					<input class="textform" type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
					<label for="url"><small>Website</small></label>
				</p>

			<?php endif; ?>

			<p><textarea class="textform" name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>

			<p>
				<input type="submit" id="submit" tabindex="5" value="Submit" />
				<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
			</p>

			<?php do_action('comment_form', $post->ID); ?>

		</form>

	<?php endif; // If registration required and not logged in ?>

<?php endif;?>

</div>