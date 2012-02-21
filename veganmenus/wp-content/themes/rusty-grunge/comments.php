<?php

if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');
if ( post_password_required() ) {
	echo '<p class="nocomments">This post is password protected. Enter the password to view comments.<p>';
	return;
}

	$oddcomment = 'alt';

?>

<div id="comments" class="clearfix">

<?php if ( have_comments() ) : ?>

  <h2>Bring on the comments</h2>

  <ol class="commentlist">
    <?php wp_list_comments(array('avatar_size'=>48, 'reply_text'=>'Reply to this Comment')); ?>
  </ol>
  
<div class="navigation">
  <div class="alignleft"><?php previous_comments_link() ?></div>
  <div class="alignright"><?php next_comments_link() ?></div>
</div>  

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) :
		// If comments are open, but there are no comments. ?>
      <p>Be the first to comment.</p>
  <?php
	else : ?>
      <p>Comments are closed for this entry.</p>
  <?php
		// comments are closed 
	endif;
endif; 

if ('open' == $post->comment_status) : ?>


<div id="respond">
  <h3><?php comment_form_title( 'Leave a Reply', 'Leave a Reply to %s' ); ?></h3>
  
  <fieldset id="cancel-comment-reply">
  	<small><?php cancel_comment_reply_link() ?></small>
  </fieldset>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p>
<?php else : ?>

  <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
  
<?php if ( $user_ID ) : ?>
  
  <fieldset id="comment-author">
  	<small>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></small>
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
  
<?php 
      comment_id_fields(); 
      do_action('comment_form', $post->ID); 
?>
  
  <!--<p><small><strong>XHTML:</strong> You can use these tags: <?php echo allowed_tags(); ?></small></p>-->
  </fieldset>
  </form>

<?php endif; ?>

</div>

<?php endif; ?>
</div>