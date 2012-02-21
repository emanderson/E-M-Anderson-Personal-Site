<?php mytheme_singlepagelayout() ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div id="post-<?php the_ID(); ?>" class="post">
		<div class="post-header">
			<h2 class="post-title"><?php the_title(); ?></h2>
		</div><!-- END POST-HEADER  -->
		<div class="post-entry">
			<?php the_content(); ?>
			<?php link_pages('<p style="font-weight:bold;">Pages: ', '</p>', 'number'); ?>
		</div><!-- END POST-ENTRY --> 
		<div id="single-post-metadata">
			<h3 class="post-footer-header">
				<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) { ?><img src="<?php bloginfo('stylesheet_directory'); ?>/icons/comment.png" alt="Post a comment" /> <a href="#respond" title="Post a comment">Post a Comment</a> &mdash; <img src="<?php bloginfo('stylesheet_directory'); ?>/icons/trackback.png" alt="Trackback URI" /> <a href="<?php trackback_url(true); ?>" title="Trackback URI" rel="trackback">Trackback URI</a>
				<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) { ?><img src="<?php bloginfo('stylesheet_directory'); ?>/icons/trackback.png" alt="Trackback URI" /> <a href="<?php trackback_url(true); ?> " title="Trackback URI" rel="trackback">Trackback URI</a> &mdash; Comments are closed
				<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) { ?><img src="<?php bloginfo('stylesheet_directory'); ?>/icons/comment.png" alt="Post a comment" /> <a href="#respond" title="Post a comment">Post a Comment</a> &mdash; Trackbacks are closed
				<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) { ?>Comments and trackbacks are both currently closed
				<?php } ?>
				</h3>
			<h3 class="post-footer-header">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/icons/feed.png" alt="XML" /> <?php comments_rss_link('RSS 2.0 feed'); ?> for these comments
			</h3>
			<p  class="post-footer">This entry (<a href="<?php the_permalink() ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark">permalink</a>) was posted on <?php the_time('l, F jS, Y') ?> at <?php the_time('g:i A') ?> by <?php the_author(); ?> and categorized in <?php the_category(', ') ?>. <?php edit_post_link('Revise', ' [', ']'); ?></p>
		</div><!-- END SINGLE-METADATA -->
		<!-- <?php trackback_rdf(); ?> -->
	</div><!-- END POST -->

<?php comments_template(); ?>

	<div class="navigation">
		<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
		<div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
		<div class="middle"><a href="<?php echo get_settings('home'); ?>/" title="Home: <?php bloginfo('name'); ?>">Home</a></div>
	</div><!-- END NAVIGATION -->

<?php endwhile; else: ?>
<?php /* INCLUDE FOR ERROR TEXT */ include (TEMPLATEPATH . '/errortext.php'); ?>
<?php endif; ?>

</div><!-- END CONTENT -->

<?php get_footer(); ?>