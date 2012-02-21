<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

			<p class="nocomments">This post is password protected. Enter the password to view comments.</p>

			<?php
			return;
		}
	}

	/* This variable is for alternating comment background */
	$oddcomment = 'class="thread-alt" ';
?>

<!-- You can start editing here. -->

<?php $i=0; ?>

<?php if ($comments) : ?>
	<h3 class="comments-number"><?php comments_number('0 Comments', '1 Comment', '% Comments' );?> on &#8220;<?php the_title(); ?>&#8221;</h3>

	<ol class="commentlist">

	<?php foreach ($comments as $comment) : ?>
		<?php $i++; ?>
		<li <?php if ($comment->comment_author_email == get_the_author_email()) echo 'class="bypostauthor"'; else echo $oddcomment; ?> id="comment-<?php comment_ID() ?>">
			<span class="comment-counter"><a href="#comment-<?php comment_ID() ?>" title="Permalink to this comment" rel="nofollow">#<?php echo $i; ?></a></span>
			<?php if(function_exists('get_avatar')) { ?><?php echo get_avatar( $comment, 32 ); ?><?php } ?>
			<span class="comment-author"><?php comment_author_link() ?></span><br/>
			<span class="comment-meta"> on <?php comment_date('M jS, Y'); ?> at <?php comment_time(); ?><?php edit_comment_link('edit','&nbsp;[',']'); ?></span>
			<?php if ($comment->comment_approved == '0') : ?>
			<em>Your comment is awaiting moderation.</em>
			<?php endif; ?>
			<div class="comment-content">
				<?php comment_text() ?>
			</div>
		</li>
		
	<?php
		/* Changes every other comment to a different class */
		$oddcomment = ( empty( $oddcomment ) ) ? 'class="thread-alt" ' : '';
	?>

	<?php endforeach; /* end for each comment */ ?>

	</ol>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->
		<h3 class="comments-number"><?php comments_number('0 Comments', '1 Comment', '% Comments' );?> on &#8220;<?php the_title(); ?>&#8221;</h3>
		
	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Comments are closed.</p>

	<?php endif; ?>
<?php endif; ?>

<!--reply form-->
<?php if ('open' == $post->comment_status) : ?>

<div id="respond">
<h3>Leave a Comment</h3>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p class="comment-login">You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p class="comment-login">Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></p>

<?php else : ?>

<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
<label for="author"><strong>Name</strong> <?php if ($req) echo "(required)"; ?></label></p>

<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
<label for="email"><strong>Email</strong> <?php if ($req) echo "(required)"; ?> (will not be published)</label></p>

<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><strong>Website</strong> (optional)</label></p>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->

<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="Submit" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>
</div>

<?php endif; // if you delete this the sky will fall on your head ?>