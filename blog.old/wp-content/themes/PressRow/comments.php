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

<div id="comments">

	<?php if ($comments) : ?>
		<h2 class="comment_head"><?php comments_number('No Comments', '1 Comment', '% Comments' );?></h2> 
	
		<ul class="comment_list">
	
		<?php foreach ($comments as $comment) : ?>
	
			<li class="<?php /* Style differently if comment author is blog author */ if ($comment->comment_author_email == get_the_author_email()) { echo 'author_comment_'; } ?><?php echo $oddcomment; ?>" id="comment-<?php comment_ID() ?>">
				<?php if ($comment->comment_approved == '0') : ?>
					<em>Your comment is awaiting moderation.</em>
				<?php else : ?>
					<div class="comment_intro">
						<?php if (function_exists('gravatar')) { ?><a href="http://www.gravatar.com/" title="What is this?"><img src="<?php gravatar("X", 32, ""); ?>" class="gravatar" alt="Gravatar Icon" /></a><?php } ?>
						<span class="comment_author"><?php comment_author_link() ?></span><br />
						<span class="comment_meta"><a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('F jS, Y') ?> at <?php comment_time() ?></a></span>
					</div>
					<div class="entry">
						<?php comment_text() ?>
					</div>
				<?php endif; ?>
			</li>
	
		<?php /* Changes every other comment to a different class */	
			if ('alt' == $oddcomment) $oddcomment = '';
			else $oddcomment = 'alt';
		?>
	
		<?php endforeach; /* end for each comment */ ?>
	
		</ul>
	
	 <?php else : // this is displayed if there are no comments so far ?>
	
	  <?php if ('open' == $post->comment_status) : ?> 
			<!-- If comments are open, but there are no comments. -->
			
		 <?php else : // comments are closed ?>
			<!-- If comments are closed. -->
			<h2 class="comment_head">Comments are closed.</h2>
			
		<?php endif; ?>
	<?php endif; ?>
	
	
	<?php if ('open' == $post->comment_status) : ?>
	
	<h2 class="form_head">Leave a Reply</h2>
	
	<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
		<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p>
	<?php else : ?>
	
	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="comment_form">
	
		<?php if ( $user_ID ) : ?>
		
			<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></p>
		
		<?php else : ?>
		
			<p><input type="text" class="text_input" name="author" id="author" value="<?php echo $comment_author; ?>" tabindex="1" /><label for="author">Name <?php if ($req) echo "(required)"; ?></label></p>
			<p><input type="text" class="text_input" name="email" id="email" value="<?php echo $comment_author_email; ?>" tabindex="2" /><label for="email">Mail (will not be published) <?php if ($req) echo "(required)"; ?></label></p>
			<p><input type="text" class="text_input" name="url" id="url" value="<?php echo $comment_author_url; ?>" tabindex="3" /><label for="url">Website</label></p>
		
		<?php endif; ?>
		
		<!--<p><small><strong>XHTML:</strong> You can use these tags: <?php echo allowed_tags(); ?></small></p>-->
		
		<p><textarea class="text_area" name="comment" id="comment" rows="10" tabindex="4"></textarea></p>	
		<p>
			<input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
			<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
		</p>
		<?php do_action('comment_form', $post->ID); ?>
	
	</form>
	
	<?php endif; // If registration required and not logged in ?>
	
	<?php endif; // if you delete this the sky will fall on your head ?>

</div>