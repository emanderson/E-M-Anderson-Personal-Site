<?php get_header(); ?>

	<div id="container">
		<div id="content" class="hfeed">

<?php the_post() ?>

<?php $attachment_link = get_the_attachment_link($post->ID, true, array(450, 800)); // DOES THIS, AND POPULATES THE NEXT LINE FOR SIZING ?>
<?php $_post = &get_post($post->ID); $classname = ($_post->iconsize[0] <= 128 ? 'small' : '') . 'attachment'; // GIVES SMALL ITEMS A 'SMALL' CLASS ?>

			<h2 class="page-title"><a href="<?php echo get_permalink($post->post_parent) ?>" rev="attachment"><?php echo get_the_title($post->post_parent) ?></a></h2>
			<div id="post-<?php the_ID(); ?>" class="<?php veryplaintxt_post_class() ?>">
				<h3 class="entry-title"><?php the_title() ?></h3>
				<div class="entry-content">
					<p class="<?php echo $classname ?>"><?php echo $attachment_link ?></p>
					<p class="<?php echo $classname ?>-name"><?php echo basename($post->guid) ?></p>
<?php the_content('<span class="more-link">'.__('Read More', 'veryplaintxt').'</span>') ?>

<?php link_pages('<div class="page-link">'.__('Pages: ', 'veryplaintxt'), "</div>\n", 'number'); ?>
				</div>
				<div class="entry-meta">
					<?php printf(__('Posted on <abbr class="published" title="%1$sT%2$s">%3$s at %4$s</abbr> by %5$s. Bookmark the <a href="%6$s" title="Permalink to %7$s" rel="bookmark">permalink</a>. Follow comments here with the <a href="%8$s" title="Comments RSS to %7$s" rel="alternate" type="application/rss+xml">RSS feed</a>.', 'sandbox'),
						get_the_time('Y-m-d'),
						get_the_time('H:i:sO'),
						the_date('l, F j, Y,', '', '', false),
						get_the_time(),
						'<span class="fn">' . $authordata->display_name . '</span>',
						get_permalink(),
						wp_specialchars(get_the_title(), 'double'),
						comments_rss() ) ?>
<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) : // COMMENTS & PINGS OPEN ?>
					<?php printf(__('<a href="#respond" title="Post a comment">Post a comment</a>, <a href="%s" rel="trackback" title="Trackback URL for your post">trackback URL</a>.', 'veryplaintxt'), get_trackback_url()) ?>
<?php elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) : // PINGS ONLY OPEN ?>
					<?php printf(__('Comments are closed, <a href="%s" rel="trackback" title="Trackback URL for your post">trackback URL</a>.', 'veryplaintxt'), get_trackback_url()) ?>
<?php elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) : // COMMENTS OPEN ?>
					<?php printf(__('Trackbacks are closed, but you can <a href="#respond" title="Post a comment">post a comment</a>.', 'veryplaintxt')) ?>
<?php elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) : // NOTHING OPEN ?>
					<?php _e('Both comments and trackbacks are currently closed.', 'veryplaintxt') ?>
<?php endif; ?>

<?php edit_post_link(__('Edit this entry.', 'veryplaintxt'),'',''); ?>
				</div>
			</div>

<?php comments_template() ?>

		</div>
	</div>

<?php get_footer() ?>