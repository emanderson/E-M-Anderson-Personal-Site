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

	<span id="comments"></span>
	
	<?php foreach ($comments as $comment) : ?>

		<div class="comment" id="comment-<?php comment_ID() ?>">
			<div class="comment_header">
				<?php edit_comment_link("[ edit ]","<span class='admin_edit_link'>","</span>"); ?>
				<div class="comment_title"><?php comment_author_link() ?></div>
				<div class="comment_date"><?php comment_date('F jS, Y') ?> <?php comment_time() ?></div>
			</div>
			<div class="comment_content">
				<?php comment_text() ?>
			</div>
		</div>

	<?php /* Changes every other comment to a different class */	
		if ('alt' == $oddcomment) $oddcomment = '';
		else $oddcomment = 'alt';
	?>

	<?php endforeach; /* end for each comment */ ?>

 <?php else : // this is displayed if there are no comments so far ?>

  	<?php if ('open' == $post->comment_status) : ?> 
		
	<?php else : // comments are closed ?>
		
	<?php endif; ?>
	
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
						<div class="comment" id="respond">
							<div class="comment_content">
								<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p>
							</div>
						</div>
<?php else : ?>
<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

						<div class="comment" id="respond">
							<div class="comment_content">
	<?php if ( $user_ID ) : ?>

	<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout</a>.</p>

	<?php else : ?>
								<div class="comment_input">
									<?php if ($req) echo "*"; ?>Name<br/>
									<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
								</div>
								<div class="comment_input">
									<?php if ($req) echo "*"; ?>Mail<br/>
									<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
								</div>
								<div class="comment_input">
									Website<br/>
									<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
								</div>
	<?php endif; ?>
								<div class="comment_input">
									Comment<br/>
									<textarea name="comment" id="comment" rows="10" tabindex="4"></textarea>
								</div>
								<input class="comment_submit" name="submit" type="submit" id="submit" tabindex="5" value="LEAVE YOUR COMMENT" />
								<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
								<?php do_action('comment_form', $post->ID); ?>
							</div>
							<div class="post_footer">
							</div>
						</div>

</form>
<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>
