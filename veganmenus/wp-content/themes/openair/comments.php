<?php // Do not delete these lines
  if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');

  // if there's a password
  if (post_password_required()) 
  { 
?>
	<p class="nocomments"><?php _e("This post is password protected. Enter the password to view comments."); ?><p>
<?php
	return;
  }

  // This variable is for alternating comment background
  $oddcomment = 'alt';
?>

  <a id="comments"></a>
  
  <!-- 
    You can start editing here. 
	-->
  <div id="commentsdiv">
  <?php if (have_comments()) { ?>
    <!--
	  T R A C K B A C K S   /   P I N G B A C K S 
	  -->
	<?php $post_count = 0; ?>
	<?php if ($comment->comment_type == "trackback" || $comment->comment_type == "pingback" || 
			ereg("<pingback />", $comment->comment_content) || 
			ereg("<trackback />", $comment->comment_content)) { $post_count++; ?>
			
 	<div class="comments">
	  <ul class="commentlist">
		<?php wp_list_comments('type=trackback'); ?>
	  </ul>
	  <div class="comments-content"></div>
	</div> 
	
	<div class="navigation">
	  <div class="alignleft"><?php previous_comments_link() ?></div>
	  <div class="alignright"><?php next_comments_link() ?></div>
	</div>
	
	<? } ?> <!-- end comment_type check //-->
	<?php $post_count = 0; ?>
	 
    <? if ($runonce) { ?>
    <br />
	  <?php $runonce = !$runonce; ?>
    <? } ?>	
	 
	 
    <!--
	  C O M M E N T S
	  -->
    <? if ($comment->comment_type != "trackback" && $comment->comment_type != "pingback" && 
	       !ereg("<pingback />", $comment->comment_content) && 
		   !ereg("<trackback />", $comment->comment_content)) { $post_count++; ?>	
		   
	<div class="comments">
	  <ul id="commentlist" class="commentlist">
		<?php wp_list_comments('type=comment'); ?>
	  </ul>
	</div>
	
	<div class="navigation">
	  <div class="alignleft"><?php previous_comments_link() ?></div>
	  <div class="alignright"><?php next_comments_link() ?></div>
	</div>
	
	<?php } ?> <!-- end comment_type //-->
    <?php $post_count = 0; ?>
    
	<? if ($runonce) { ?>
    <br />
	  <?php $runonce = !$runonce; ?>
    <? } ?>	 
	
  <?php } else { ?>
	<!-- 
	  If comments are open, but there are no comments. 
	  -->
    <?php if ('open' == $post->comment_status) { ?> 
	<?php } else { ?>
	<div class="comments">
	  <div class="comments-top"></div>
	  <div class="comments-middle">
        <p>Comments are closed. Please check back later.</p>
	  </div>
	</div> 
	<?php } ?>
  <?php } ?>


	<br />
	
    
  <?php if ('open' == $post->comment_status) { ?>
    <div class="comments">
	  <div class="comments-top"></div>
    <?php if (get_option('comment_registration')) { ?>
	  <div class="comments-middle clearfix">
        <div class="comments-title">
          <h3>
      <?php if ($user_ID) { ?>
            Logged in as 
            <a href="<?php bloginfo('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>.
  	        <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account?">Logout?</a>
	        Leave a Reply?
	      </h3>
		</div> <!-- end .title //-->
	  <?php } else if (!$user_ID) { ?>
            You must 
	        <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>"
		      title="Login">login</a> before replying.
	      </h3>
		</div> <!-- end .title //-->
	  </div> <!-- end .comments-middle //-->
	  <div class="comments-bottom"></div>
	</div> <!-- end .comments //-->
	
      <?php } ?>
	<?php } ?> <!-- end get_option comment_registration //-->
	

	<!--
	  Comment registration is required and they are logged in
	  -->
    <?php if (get_option('comment_registration') && $user_ID) { ?>
      <div class="comments-middle">
        <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
		  <div class="comments-textarea">
            <textarea name="comment" id="comment" cols="45" rows="10" tabindex="1"></textarea>
		  </div>

          <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />

          <?php comment_id_fields(); ?>
		  
          <?php do_action('comment_form', $post->ID); ?>

          <p>You can use these tags: <?php echo allowed_tags(); ?></p>
		  
		  <div class="buttons">
		    <input name="submit" type="submit" id="submit" tabindex="2" value="Submit Comment" />
		  </div>
	    </form>
	  </div> <!-- end .comments-middle //-->
	  <div class="comments-bottom"></div>
	</div> <!-- end .comments //-->
	
	<!--
	  Comment registration not required
	  -->
	<?php } else if (!get_option('comment_registration')) { ?>
	
	  <div class="comments-title">
        <h3><?php comment_form_title('Leave a Reply', 'Leave a Reply to %s'); ?></h3>	
	  </div>
	
	  <div class="comments-middle">
        <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

	  <?php if (!$user_ID) { ?>
	  
	      <div class="comments-inputs">
		    <label><?php wp_loginout(); ?></label>
		    <span>OR REPLY BELOW ... </span><br /><br />
	        <label for="author">Name:</label>
	        <input type="text" name="author" id="author" value="" class="text" tabindex="1" /><br />
	        <label for="email">Email:</label>
	        <input type="text" name="email" id="email" value="" class="text" tabindex="2" /><br />
	        <label for="url">Website:</label>
	        <input type="text" name="url" id="url" value="" class="text" tabindex="3" /><br />
	      </div> <!-- end .comments-inputs //-->
		  
	  <?php } ?>
	
	      <div class="comments-textarea">
            <textarea name="comment" id="comment" cols="55" rows="10" tabindex="4"></textarea>
		  </div>

          <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />

          <?php comment_id_fields(); ?>
		  
          <?php do_action('comment_form', $post->ID); ?>
		
	      <p class="inputs">You can use these tags: <?php echo allowed_tags(); ?></p>
		
		  <div class="buttons">
            <input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
		  </div>
	    </form>
	  </div> <!-- end .comments-middle //-->
	  
	  <div class="comments-bottom"></div>
	</div> <!-- end .comments //-->
	<?php } ?>

  <!--
    if you delete this the sky will fall on your head
	-->
  <?php } ?>
  </div>
