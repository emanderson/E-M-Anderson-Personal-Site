<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

        if (!empty($post->post_password)) { // if there's a password
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
				?>
				
				<p class="nocomments"><?php echo __('This post is password protected. Enter the password to view comments.','sirius'); ?><p>
				
				<?php
				return;
            }
        }

		/* This variable is for alternating comment background */
		$oddcomment = 'alt';
?>

<!-- You can start editing here. -->

<?php if ($comments) : ?>
	<h3 id="comments"><?php comments_number(''.__('No Responses','sirius').'', ''.__('One Response to','sirius').'', ''.__('% Responses to','sirius').'' );?></h3>

	<ol class="commentlist">

	<?php foreach ($comments as $comment) : ?>

		<li class="<?php echo $oddcomment; ?>" id="comment-<?php comment_ID() ?>">
		
		
		
<?php /* -- Kalender -- */
if (function_exists('sirius_gravatar')) { sirius_gravatar();} ?>

       
       
       
       
    	<cite><strong><?php comment_author_link(); ?></strong></cite>
			
			 <?php comment_type(''.__('says','sirius').'', ''.__('via Trackback','sirius').'', ''.__('via Pingback','sirius').''); ?>:
			
			
			<br />

			<small class="commentmetadata"><a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('j. F, Y') ?> <?php echo __('at','sirius'); ?> <?php comment_time('H:i') ?></a> <?php edit_comment_link('<img src="'.get_bloginfo(template_directory).'/images/edit.gif" alt="'.__('Edit Link','sirius').'" />','<span class="editlink">', '</span>'); ?></small>

       <br />
       
       <?php if ($comment->comment_approved == '0') : ?>
			<span style="color:red;"><?php echo __('Your comment is awaiting moderation.','sirius'); ?></span>
			<?php endif; ?>

			<?php comment_text() ?>

		</li>

	<?php /* Changes every other comment to a different class */	
		if ('alt' == $oddcomment) $oddcomment = 'altone';
		else $oddcomment = 'alt';
	?>

	<?php endforeach; /* end for each comment */ ?>

	</ol>

 <?php else : // this is displayed if there are no comments so far ?>

  <?php if ('open' == $post->comment_status) : ?> 
		<!-- If comments are open, but there are no comments. -->
		
	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<div class="where"><p><?php echo __('Responses are currently closed. ','sirius'); ?></p></div>
		
	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

<h3 id="respond"><?php echo __('Leave a Reply','sirius'); ?>	&raquo;</h3>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p><?php echo __('You must be logged in to post a comment','sirius'); ?> &raquo; <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>"><?php echo __('login','sirius'); ?></a>.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p><?php echo __('Logged in as','sirius'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>	&raquo; <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e('Log out of this account') ?>"><?php echo __('Logout','sirius'); ?></a></p>

<?php
	$plugins = get_settings('active_plugins');
	if (is_array($plugins)) $active = (array_search('bot-check.php', $plugins) === false) ? false : true; // search array for WP >= 1.5
	else $active = (strstr(get_settings('active_plugins'), 'bot-check.php') === false) ? false : true; // search string for WP < 1.5
	if ($active) {
?>
<p>
<?php
	include(ABSPATH . 'wp-content/bot-check/bc-config.php');
	$enc = base64_encode(encrypt($bc_code));
	$code = ($_GET['human'] == 'invalid') ? 'Invalid Entry' : '';
?>
	<input type="hidden" name="human" value="<?=$enc?>" />
	<p><img src="<?php echo get_settings('siteurl'); ?>/wp-content/bot-check/bc-image.php?human=<?=$enc?>" alt="Bot-Check"></p>
		<input type="text" name='code' id="code" size="28" value="<?=$code?>" tabindex="0" />
		<label for="code"><small>Enter Code <?php _e('(required)'); ?></small></label>
</p>
<?php } ?>

<?php else : ?>

<?php
	$plugins = get_settings('active_plugins');
	if (is_array($plugins)) $active = (array_search('bot-check.php', $plugins) === false) ? false : true; // search array for WP >= 1.5
	else $active = (strstr(get_settings('active_plugins'), 'bot-check.php') === false) ? false : true; // search string for WP < 1.5
	if ($active) {
?>
<p>
<?php
	include(ABSPATH . 'wp-content/bot-check/bc-config.php');
	$enc = base64_encode(encrypt($bc_code));
	$code = ($_GET['human'] == 'invalid') ? 'Invalid Entry' : '';
?>
	<input type="hidden" name="human" value="<?=$enc?>" />
	<p><img src="<?php echo get_settings('siteurl'); ?>/wp-content/bot-check/bc-image.php?human=<?=$enc?>" alt="Bot-Check"></p>
		<input type="text" name='code' id="code" size="28" value="<?=$code?>" tabindex="0" />
		<label for="code"><small>Enter Code <?php _e('(required)'); ?></small></label>
</p>
<?php } ?>

<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
<label for="author"><small><?php echo __('Name','sirius'); ?> <?php if ($req) echo __(' - required','sirius'); ?></small></label></p>

<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
<label for="email"><small><?php echo __('Mail (will not be published)','sirius'); ?> <?php if ($req) echo __(' - required','sirius'); ?></small></label></p>

<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small><?php echo __('Website','sirius'); ?></small></label></p>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> You can use these tags: <?php echo allowed_tags(); ?></small></p>-->

<p><textarea name="comment" id="comment" cols="65%" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="<?php echo __('Submit Comment','sirius'); ?>" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>
