<div id="feedback">

<?$i;?>

<?php if ( !empty($post->post_password) && $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) : ?>
<p><?php _e('Enter your password to view comments.'); ?></p>
<?php return; endif; ?>

<!-- You can start editing here. -->

<?php if ( $comments ) : ?>
	<h2 id="comments"><a href="#respond" title="<?php _e("Leave a comment"); ?>">Skip to comment form &raquo;</a></h2>
<?php endif; ?>

<ol id="commentlist">

<?php if ( $comments ) : ?>

<?php foreach ($comments as $comment) : ?>
	<li id="comment-<?php comment_ID() ?>" class="<?=($i%2)?"color1":"color2";$i++;?>">
	<img src="<?php bloginfo('template_directory'); ?>/images/commentheader.gif" /><strong><?php comment_author_link() ?></strong> <?php _e('said'); ?> <?php _e('on'); ?> <?php comment_date() ?> at <a href="#comment-<?php comment_ID() ?>"><?php comment_time() ?></a>  <?php if ( $user_ID ) { ?><?php edit_comment_link(__("Edit This"), ' | '); ?><?php } ?>
	<?php comment_text() ?>
	</li>

<?php endforeach; ?>

</ol>

<?php else : // this is displayed if there are no comments so far ?>

  <?php if ('open' == $post->comment_status) : ?>
                <!-- If comments are open, but there are no comments. -->

         <?php else : // comments are closed ?>
                <!-- If comments are closed. -->
                <p>Comments are closed.</p>

        <?php endif; ?>

<?php endif; ?>

<?php if ('open' == $post->comment_status) : ?>

<h2 id="respond"><?php _e('Leave a comment'); ?></h2>
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>
	<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e('Log out of this account') ?>">Logout &raquo;</a></p>
<?php else : ?>
	<p>
	<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
	<label for="author"><small>Name <?php if ($req) _e('(required)'); ?></small></label>
	</p>
	<p>
	<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
	<label for="email"><small>Mail (will not be published) <?php if ($req) _e('(required)'); ?></small></label>
	</p>
	<p>
	<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
	<label for="url"><small>Website</small></label>
	</p>
<?php endif; ?>

<p><small>You can use these tags: <?php echo allowed_tags(); ?></small></p>

<p>
<textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea>
</p>

<p>
<input type="submit" name="submit" tabindex="5" class="submit" value="Submit This Comment" id="submit" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>

<?php do_action('comment_form', $post->ID); ?>

</form>

<h2><?php comments_rss_link(__('<abbr title="Really Simple Syndication">RSS</abbr> feed for comments on this post.')); ?> </h2>

<?php if ( pings_open() ) : ?>
	<h2><a href="<?php trackback_url() ?>" rel="trackback"><?php _e('TrackBack <abbr title="Uniform Resource Identifier">URI</abbr>'); ?></a></h2>
<?php endif; ?>

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>

</div>