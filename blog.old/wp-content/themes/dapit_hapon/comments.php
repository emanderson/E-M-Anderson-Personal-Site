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
<div class="entrytext"><br />
<?php if ($comments) : ?>
	<h3 class="comnumber"><?php comments_number('No Responses', 'One Response', '% Responses' );?>:</h3> 

	<?php foreach ($comments as $comment) : ?>

		<div class="<?php echo $oddcomment; ?>" id="comment-<?php comment_ID() ?>">
		<span class="authorline"><span class="authorname"><?php comment_author_link() ?></span> said:</span>
		<br /><span class="dateline"><a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('F jS, Y') ?> at <?php comment_time() ?></a> <?php edit_comment_link('e','',''); ?></span><br />
		<span class="commentbody">

			<?php if ($comment->comment_approved == '0') : ?>
			<em><strong>Your comment is awaiting moderation.</strong></em><br />
			<?php endif; ?>
			
			<?php comment_text() ?><br />
		</span>
		</div>

	<?php /* Changes every other comment to a different class */	
		if ('alt' == $oddcomment) $oddcomment = 'even';
		else $oddcomment = 'alt';
	?>

	<?php endforeach; /* end for each comment */ ?>


 <?php else : // this is displayed if there are no comments so far ?>

  <?php if ('open' == $post->comment_status) : ?> 
		<!-- If comments are open, but there are no comments. -->
		
	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Comments are closed.</p>
		
	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>
<div class="reply">
<h3 class="comnumber">Leave a Reply</h3>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></p>

<?php else : ?>

<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" class="fieldstyle" tabindex="1" />
<label for="author">Name <?php if ($req) echo "(required)"; ?></label><br /><br />

<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" class="fieldstyle" tabindex="2" />
<label for="email">Mail (will not be published) <?php if ($req) echo "(required)"; ?></label><br /><br />

<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" class="fieldstyle" tabindex="3" />
<label for="url">Website</label><br /><br />

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> You can use these tags: <?php echo allowed_tags(); ?></small></p>-->

<textarea name="comment" id="comment" class="fieldstyle" rows="10" tabindex="4"></textarea>
<br />

<input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" class="buttonstyle"/>
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />

<?php do_action('comment_form', $post->ID); ?>

</form>
</div>
<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>
</div>