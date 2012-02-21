<?php // Do not delete these lines
  if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');

  // if there's a password
  if (!empty($post->post_password)) 
  { 
    // and it doesn't match the cookie
    if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) 
	{  
?>
	  <p class="nocomments"><?php _e("This post is password protected. Enter the password to view comments."); ?><p>
<?php
	  return;
    }
  }

  // This variable is for alternating comment background
  $oddcomment = 'alt';
?>

  <a id="comments"></a>
  
  <br />
  
  <!-- 
    You can start editing here. 
	-->
  <div id="commentsdiv">
  <?php if ($comments) { ?>
    <!--
	  T R A C K B A C K S   /   P I N G B A C K S 
	  -->
	<?php $post_count = 0; ?>
    <?php foreach ($comments as $comment) : ?>
	  <?php if ($comment->comment_type == "trackback" || $comment->comment_type == "pingback" || 
			ereg("<pingback />", $comment->comment_content) || 
			ereg("<trackback />", $comment->comment_content)) { $post_count++; ?>
			
 	<div class="comments">
	  <div class="comments-top"></div>
	  <div class="comments-middle">
       <?php if (!$runonce) { $runonce = true; ?>
        <h4>Trackbacks &amp; Pingbacks &bull; [<?php comments_rss_link('feed'); ?>]</h4>
	    <br />
        <? } ?>
		<span class="comments-poster">
          <?php comment_author_link() ?> &#8212; <?php comment_date() ?> @ 
		  <a href="#comment-<?php comment_ID() ?>"><?php comment_time() ?></a>				
		</span>
		<span class="comments-number">Trackback <?php echo $post_count; ?></span>
		
		<?php comment_text(); ?>
	  </div> <!-- end .comments-middle //-->
	  <div class="comments-bottom"></div>
	</div> 
	
	  <? } ?> <!-- end comment_type check //-->
	<?php endforeach; $post_count = 0; ?>
	 
    <? if ($runonce) { ?>
    <br />
	  <?php $runonce = !$runonce; ?>
    <? } ?>	
	 
	 
    <!--
	  C O M M E N T S
	  -->
    <?php foreach ($comments as $comment) : ?>
      <? if ($comment->comment_type != "trackback" && $comment->comment_type != "pingback" && 
	       !ereg("<pingback />", $comment->comment_content) && 
		   !ereg("<trackback />", $comment->comment_content)) { $post_count++; ?>	
		   
	<div class="comments">
	  <div class="comments-top"></div>
	  <div class="comments-middle clearfix">
	    <div class="comments-title">
		  <h4>Comment from <?php comment_author_link(); ?></h4>
		</div>
		
		<div class="comment-author">
	      <?php if (function_exists("get_gravatar")) { ?>
		    <span class="comments-gravatar"><?php echo get_avatar(get_comment_author_email(), '60'); ?></span><br />
		  <?php } else { ?>
	        <span class="comments-gravatar">
			<?php $grav_url = "http://www.gravatar.com/avatar.php?gravatar_id=" . md5(get_comment_author_email()) . "&amp;default=" . urlencode($default) . "&amp;size=60"; echo "<img src='$grav_url' alt='Gravatar' />"; ?>
		  </span>
		  <br /> 
		  <span class="comments-poster-text">
		    Commented on:<br /><em><?php comment_date('F jS, Y'); ?></em>
	      </span>
		  <?php } ?>
		</div>
		
		<div class="comments-content">
		  <a name="comment-<?php comment_ID(); ?>"></a>
		  
		  <?php comment_text(); ?>
		
		  <p>
	      <?php if ($comment->comment_approved == '0') { ?>
	        <strong>Your comment is awaiting moderation.</strong>
	      <?php } ?>
	      </p>
		</div>
	  </div>
	  <div class="comments-bottom">&nbsp;</div>
	</div>
	
	<br />
	  <?php } ?> <!-- end comment_type //-->
	  
    <?php endforeach; $post_count = 0; ?>
    
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
	  <div class="comments-bottom">&nbsp;</div>
	</div> <!-- end .comments //-->
	<?php } ?>
  <?php } ?>


	<br />
	
    
  <?php if ('open' == $post->comment_status) { ?>
    <div class="comments">
	  <div class="comments-top"></div>
	  <div class="comments-middle clearfix">
    <?php if (get_option('comment_registration')) { ?>
        <div class="comments-title">
          <h3>
      <?php if ($user_ID) { ?>
            Logged in as 
            <a href="<?php bloginfo('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>.
  	        <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account?">Logout?</a>
	        Leave a Reply?
	      </h3>
		</div> <!-- end .comments-title //-->
	  <?php } else if (!$user_ID) { ?>
            You must 
	        <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>"
		      title="Login">login</a> before replying.
	      </h3>
		</div> <!-- end .comments-title //-->
      <?php } ?>
	<?php } ?> <!-- end get_option comment_registration //-->
	

	<!--
	  Comment registration is required and they are logged in
	  -->
    <?php if (get_option('comment_registration') && $user_ID) { ?>

        <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
		  <div class="comments-textarea">
            <textarea name="comment" id="comment" cols="45" rows="10" tabindex="1"></textarea>
		  </div>

          <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />

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
          <h3>Leave a Reply?</h3>	
		</div>
	
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
		  </div> <!-- end .comments-textarea //-->

          <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />

          <?php do_action('comment_form', $post->ID); ?>
		
	      <p class="inputs">You can use these tags: <?php echo allowed_tags(); ?></p>
		
		  <div class="buttons">
            <input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
		  </div> <!-- end .buttons //-->
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
