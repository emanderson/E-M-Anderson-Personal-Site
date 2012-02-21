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
	<h3 id="comments"><strong><?php comments_number('No Responses', 'One Response', '% Responses' );?></strong> to &#8220;<span style="color:#808000;letter-spacing:0px;"><?php the_title(); ?></span>&#8221;</h3> 
	<ul class="commentlist">

	<?php $relax_comment_count=1; ?>
	
	<?php foreach ($comments as $comment) : ?>

		<li class="commentbody" id="comment-<?php comment_ID() ?>">
<?php
if (function_exists('gravatar')) { 
     if ('' != get_comment_author_url()) {
          // the commenter supplied a website URL
	  echo "<a href='$comment->comment_author_url' title='Visit $comment->comment_author'>";
     } else { 
          // the commenter did not supply a website, so link to gravatars.com
	  echo "<a href='http://www.gravatar.com' title='Create your own gravatar at gravatar.com!'>";
     }
     echo "<img src='";
     if ('' == $comment->comment_type) {
          // this is a regular comment, so use the commenter's email address
          echo gravatar($comment->comment_author_email);
     } elseif ( ('trackback' == $comment->comment_type) || ('pingback' == $comment->comment_type) ) {
          // this is a pingback or trackback, so use the commenter's website URL
          echo gravatar($comment->comment_author_url);
     }
     echo "' alt='' class='gravatar' /></a>";
} ?>
			<div class="commentcount"><?php echo $relax_comment_count; ?></div>
			<cite><?php comment_author_link() ?></cite>
			
			<?php if ($comment->comment_approved == '0') : ?>
			<em>Your comment is awaiting moderation.</em>
			<?php endif; ?>
      <br/>
			<a class="commentlink" href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('F jS, Y') ?> <?php comment_time('H:i') ?></a> <?php edit_comment_link('e','',''); ?>
			
			
			<?php comment_text() ?>
			<div class="clear"></div>
		</li>
		
		<?php $relax_comment_count++; ?>

		
	<?php endforeach; /* end for each comment */ ?>

	</ul>

 <?php else : // this is displayed if there are no comments so far ?>

  <?php if ('open' == $post->comment_status) : ?> 
		<!-- If comments are open, but there are no comments. -->
		
	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Comments are closed.</p>
		
	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

<h3 id="respond"><strong>Leave a Reply</strong></h3>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></p>

<?php else : ?>

<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
<label for="author"><small>Name <?php if ($req) echo "(required)"; ?></small></label></p>

<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
<label for="email"><small>Mail (will not be published) <?php if ($req) echo "(required)"; ?></small></label></p>

<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small>Website</small></label></p>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> You can use these tags: <?php echo allowed_tags(); ?></small></p>-->

<p><textarea name="comment" id="comment" cols="60%" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>
