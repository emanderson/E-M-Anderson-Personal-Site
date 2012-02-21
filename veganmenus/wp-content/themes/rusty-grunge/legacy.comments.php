<?php 
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

		$oddcomment = 'alt';
?>

<!-- You can start editing here. -->
<div id="comments">
<?php if ($comments) : ?>

	<ol>

	<?php foreach ($comments as $comment) : ?>

		<li class="<?php if ($comment->comment_author_email == "someone@website.com") echo 'author'; else echo $oddcomment; ?> item" id="comment-<?php comment_ID() ?>">
		  <div class="commentmetadata">
  			<?php echo get_avatar( $comment, 48 ); ?>
			  <strong><?php comment_author_link() ?></strong><br />
			  <small><a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('l, F j') ?> <?php comment_time() ?></a> <?php edit_comment_link('e','',''); ?></small>				
				<?php if ($comment->comment_approved == '0') : ?>
				<em>Your comment is awaiting moderation.</em>
				<?php endif; ?>
			</div>
			<div class="comment-body"><?php comment_text() ?></div>
		</li>

	<?php 
		if ('alt' == $oddcomment) $oddcomment = '';
		else $oddcomment = 'alt';
	?>

	<?php endforeach; /* end for each comment */ ?>

	</ol>

 <?php else :  ?>

  <?php if ('open' == $post->comment_status) : ?> 
		<!-- If comments are open, but there are no comments. -->

	 <?php else : ?>
		<!-- If comments are closed. -->
		<!--<p class="nocomments">Comments are closed.</p>-->

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

<h3>Leave a Comment</h3>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<fieldset id="comment-author">
	<small>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></small>
</fieldset>

<?php else : ?>

<fieldset id="comment-author">
	<label for="author">Name <?php if ($req) echo "(required)"; ?></label>
	<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
	
	<label for="email">Mail (will not be published) <?php if ($req) echo "(required)"; ?></label>
	<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
	
	<label for="url">Website</label>
	<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
</fieldset>
<?php endif; ?>

<fieldset id="comment-text">
<p><textarea name="comment" id="comment" cols="45" rows="10" tabindex="4"></textarea></p>

<p><input name="submit_comment" type="submit" id="submit_comment" tabindex="5" value="Submit Comment" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>
<?php do_action('comment_form', $post->ID); ?>

<!--<p><small><strong>XHTML:</strong> You can use these tags: <?php echo allowed_tags(); ?></small></p>-->
</fieldset>
</form>
<?php endif; ?>

<?php endif; ?>
</div>