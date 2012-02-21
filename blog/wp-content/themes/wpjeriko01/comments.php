<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

        if (!empty($post->post_password)) { // if there's a password
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
	?>
				
		<p class="nocomments">This post is password protected. Enter the password to view comments.<p>
				
<?php return; } }

function detect_comment_type($commenttxt = 'Comment', $trackbacktxt = 'Trackback', $pingbacktxt = 'Pingback') {
	global $comment;
	if (preg_match('|trackback|',$comment->comment_type))
		return $trackbacktxt;
	elseif (preg_match('|pingback|',$comment->comment_type))
		return $pingbacktxt;
	else
		return $commenttxt;
}

?>

<!-- You can start editing here. -->

<a id="comments"></a>

<?php if ($comments) { ?>
<? $cstyle = "even"; ?>
<div class="entry">
	<h1>Commentary</h1>

	<ol id="commentlist">

<?php foreach($comments as $comment) : ?>
	<?php if(detect_comment_type() == 'Comment') { ?>
		<li id="comment-<?php comment_ID(); ?>" class="<?php if($comment->comment_author_email == get_the_author_email()) { echo "author"; } else { echo $cstyle; } ?>"><?php if(function_exists(gravatar)) { ?><div class="gravatar"><img src="<?php gravatar("R", 50,get_bloginfo(template_directory)."/_img/gravatar.png"); ?>" width="50" height="50" alt="Gravatar of <?php comment_author(); ?>"></div><?php } ?>
			<div class="centry">
			<?php comment_author_link(); ?> wrote on <?php comment_date('d. M Y'); edit_comment_link(' <img src="'.get_bloginfo(template_directory).'/_img/pencil.png" alt="Edit this comment"/>','<span class="editlink"','</span>'); ?>
				<div class="ccontent"><?php comment_text(); ?></div>
			</div>
			<div class="clearfix"></div>
		</li>
		<?php if($cstyle == 'even') { $cstyle = "odd"; } else { $cstyle = "even"; } ?>
<?php } endforeach; ?>

	</ol>
</div>

<div class="entry">

	<ol id="trackbacklist">	
<?php foreach($comments as $comment) : ?>
	<?php if(detect_comment_type() != 'Comment') { ?>
	<li><a href="<?php comment_author_url(); ?>" title="Website of <?php comment_author(); ?>"><?php comment_author(); ?></a> on <?php comment_date('d. M Y'); ?></li>
<?php } endforeach; ?>
	</ol>
</div>

<?php } else {
	if('open' == $post->comment_status)  { ?>
<?php } else { ?>
		<div class="entry"><h1>Commentary</h1><p>Comments are closed</p></div>
	<?php }} ?>

<?php if('open' == $post->comment_status) : ?>
<div class="entry">
	<h1>Leave a reply</h1>

	<?php if(get_option('comment_registration') && $user_ID ) : ?>

	<p>You must <a href="<?php get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">log in</a> to post a comment</p>

	<?php else : ?>

	<form id="commentform" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
		<fieldset>
			<div class="cfrow"><label for="author">Name (required)</label> <input type="text" name="author" id="author"/></div>
			<div class="cfrow"><label for="email">Email (required, will not be shown)</label> <input type="text" name="email" id="email"/></div>
			<div class="cfrow"><label for="url">URL</label> <input type="text" name="url" id="url"/></div>
			<div class="cfrow"><label for="text">Message</label></div>
			<div class="cfrow"><textarea name="comment" id="comment" rows="10" cols="20"></textarea></div>
			<div class="cfrow"><input type="submit" value="Submit" name="submit" id="submit" /></div>
		</fieldset>
		<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>"/>
	</form>
<?php endif; ?>
	</div>
<?php endif; ?>
