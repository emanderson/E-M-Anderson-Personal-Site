<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

        if (!empty($post->post_password)) { // if there's a password
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
				?>
				
				<p class="nocomments">This post is password protected. Enter the password to view comments.<p>
				
				<?php
				return;
            }
        }

		/* This variable is for alternating comment background */
		$oddcomment = 'alt';
?>

<!-- You can start editing here. -->
<?php if ($comments) : ?>
<div id="comments_title" class="clearfix">
	<h3 id="comments">Activity</h3> 
	<div id="comment_meta"><?php comments_number('No comments', 'One comment', '% total comments' );?>, <a href="#respond">leave your comment</a> or <a href="<?php trackback_url(true); ?>" rel="trackback">trackback</a>.</div>
</div>
	<ol class="commentlist">
	
	<?php foreach ($comments as $comment) : ?>
	<?php if (get_comment_type() == "comment"){ ?>
	<li class="<?php if ($comment->comment_author_email == "admin@domain.com") echo 'author'; else echo $oddcomment; ?> item" id="comment-<?php comment_ID() ?>">
		<div class="comment_credentials">
			<span class="author_highlight"><?php comment_author_link() ?></span><br />
			<a href="#comment-<?php comment_ID() ?>" title="Comment Permalink"><?php comment_date('M jS Y') ?></a>
			<?php edit_comment_link('Moderate','<br />',''); ?>
		</div>	
		<div class="comment_text">
		<?php if ($comment->comment_approved == '0') : ?>
		<em>Your comment is awaiting moderation.</em>
		<?php endif; ?>
		<?php comment_text() ?>
		</div>
		<div class="clear"></div>
		</li>	
	<?php /* Changes every other comment to a different class */
	if ('alt' == $oddcomment) $oddcomment = '';
	else $oddcomment = 'alt';
	?>
	<?php } ?>
	<?php endforeach; /* end for each comment */ ?>
	</ol>
	<a name="showpings"></a>
	<ol class="pingslist">
	<?php foreach ($comments as $comment) : ?>
	<?php if (get_comment_type() != "comment"){ ?>
		<li class="<?php echo $oddcomment; ?>" id="comment-<?php comment_ID() ?>">
		<a name="showpings"></a>
		<div class="comment_credentials">
		<?php the_time('F jS Y') ?><br />
		<?php edit_comment_link('Moderate','',''); ?>
		</div>
		<div class="comment_text">
		<p><?php comment_author_link() ?></p>
		</div>
		<div class="clear"></div>
		</li>
	<?php /* Changes every other comment to a different class */
	if ('alt' == $oddcomment) $oddcomment = '';
	else $oddcomment = 'alt';
	?>
	<?php } ?>
	<?php endforeach; /* end for each comment */ ?>
	</ol>
 	<?php else : // this is displayed if there are no comments so far ?>

  	<?php if ('open' == $post->comment_status) : ?> 
		<div id="comments_title" class="clearfix">
			<h3 id="comments">Activity</h3> 
			<div id="comment_meta"><?php comments_number('No comments', 'One comment', '% total comments' );?>, <a href="#respond">leave your comment</a> or <a href="<?php trackback_url(true); ?>" rel="trackback">trackback</a>.</div>
		</div>
		
	 <?php else : // comments are closed ?>
		<p class="nocomments">Comments are closed.</p>
		
	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>
<br />
<h3 id="respond">Leave a Reply</h3>
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out">Logout &raquo;</a></p>

<?php else : ?>

<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
<label for="author"><small>Name <?php if ($req) echo "(required)"; ?></small></label></p>

<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
<label for="email"><small>Mail <?php if ($req) echo "(required)"; ?></small></label></p>

<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small>Website</small></label></p>

<?php endif; ?>

<p><textarea name="comment" id="comment" cols="60" rows="10" tabindex="4"><?php if (function_exists('quoter_comment_server')) { quoter_comment_server(); } ?></textarea></p>

<p><input name="submit" type="image" src="<?php bloginfo('template_directory'); ?>/images/submit-btn.gif" alt="Submit" id="submit" tabindex="5" value="Submit" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>
<br />

<?php endif; // If registration required and not logged in ?>
<?php endif; // if you delete this the sky will fall on your head ?>