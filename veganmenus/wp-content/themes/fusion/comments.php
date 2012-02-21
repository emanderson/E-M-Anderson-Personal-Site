<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/comment.js"></script>

<?php if ( !empty($post->post_password) && $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) : ?>
	<p class="error">Enter your password to view comments</p>
<?php return; endif; ?>


<?php if ($comments || comments_open()) : ?>

<div id="comments">

<div id="commentlist">

	<ol id="thecomments">
	<?php
		if ($comments && count($comments) - count($trackbacks) > 0) {
			// for WordPress 2.7 or higher
			if (function_exists('wp_list_comments')) {
				wp_list_comments('type=comment&callback=custom_comments');
			// for WordPress 2.6.3 or lower
			} else {
				foreach ($comments as $comment) {
					if($comment->comment_type != 'pingback' && $comment->comment_type != 'trackback') {
						custom_comments($comment, null, null);
					}
				}
			}
		} else {
	?>
		<li>
			No comments yet.
		</li>
	<?php
		}
	?>
	</ol>
  <?php
  if (get_option('page_comments')) {
     $comment_pages = paginate_comments_links('echo=0');
	 if ($comment_pages) {
  ?>
		<div id="commentnavi">
			<span class="pages">Comment pages</span>
			<div id="commentpager">
				<?php echo $comment_pages; ?>
			</div>
		</div>
<?php
		}
	}
?>
</div>
</div>
<?php endif; ?>


<?php if (!comments_open()) : // If comments are closed. ?>
	<p>Comments are closed.</p>
<?php elseif ( get_option('comment_registration') && !$user_ID ) : // If registration required and not logged in. ?>
	<div id="comment_login" class="messagebox">
		<?php
			if (function_exists('wp_login_url')) {
				$login_link = wp_login_url();
			} else {
				$login_link = get_option('siteurl') . '/wp-login.php?redirect_to=' . urlencode(get_permalink());
			}
		?>
		<p>You must be <a href="<?php echo $login_link ?>">logged in</a> to post a comment.</p>
	</div>

<?php else : ?>
	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
	<div id="respond">

		<?php if ($user_ID) : ?>
			<?php
				if (function_exists('wp_logout_url')) {
					$logout_link = wp_logout_url();
				} else {
					$logout_link = get_option('siteurl') . '/wp-login.php?action=logout';
				}
			?>
			<p> Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><strong><?php echo $user_identity; ?></strong></a>.
			   <a href="<?php echo $logout_link; ?>" title="Log out of this account">Logout &raquo;</a>
			</p>

			<?php else : ?>
			<?php if ( $comment_author != "" ) : ?>
				<p> Welcome back <strong><?php echo $comment_author; ?></strong>
					<span id="show_author_info"><a href="javascript:void(0);" onclick="MGJS.setStyleDisplay('author_info','');MGJS.setStyleDisplay('show_author_info','none');MGJS.setStyleDisplay('hide_author_info','');">Change &raquo;</a></span>
					<span id="hide_author_info"><a href="javascript:void(0);" onclick="MGJS.setStyleDisplay('author_info','none');MGJS.setStyleDisplay('show_author_info','');MGJS.setStyleDisplay('hide_author_info','none');">Close &raquo;</a></span>
				</p>
			<?php endif; ?>

			<div id="author_info">
				<div class="row">
					<input type="text" name="author" id="author" class="textfield" value="<?php echo $comment_author; ?>" size="24" tabindex="1" />
					<label for="author" class="small">Name <?php if ($req) echo '(required)'; ?></label>
				</div>
				<div class="row">
					<input type="text" name="email" id="email" class="textfield" value="<?php echo $comment_author_email; ?>" size="24" tabindex="2" />
					<label for="email" class="small">E-Mail (will not be published) <?php if ($req) echo '(required)'; ?></label>
				</div>
				<div class="row">
					<input type="text" name="url" id="url" class="textfield" value="<?php echo $comment_author_url; ?>" size="24" tabindex="3" />
					<label for="url" class="small">Website</label>
				</div>
			</div>

			<?php if ( $comment_author != "" ) : ?>
				<script type="text/javascript">MGJS.setStyleDisplay('hide_author_info','none');MGJS.setStyleDisplay('author_info','none');</script>
			<?php endif; ?>

		<?php endif; ?>

		<!-- comment input -->
		<div class="row">
			<textarea name="comment" id="comment" tabindex="4" rows="8" cols="50"></textarea>
		</div>

		<!-- comment submit and rss -->
		<div id="submitbox">
            <input name="submit" type="submit" id="submit" class="button" tabindex="5" value="Submit Comment" />
            <a class="feed" href="<?php bloginfo('comments_rss2_url'); ?>">Subscribe to comments feed</a>
			<?php if (function_exists('highslide_emoticons')) : ?>
				<div id="emoticon"><?php highslide_emoticons(); ?></div>
			<?php endif; ?>
			<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />

		</div>

	</div>
	</form>

<?php endif; ?>
