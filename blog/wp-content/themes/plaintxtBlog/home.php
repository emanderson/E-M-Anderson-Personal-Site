<?php 
	get_header();
	get_sidebar();
?>

<div id="content" class="narrowcolumn">

<?php if ($mytheme->option['summaryhome'] == 'index') { /* THEME OPTION FOR DISPLAYING REGULAR INDEX */ ?>
 
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

	<div id="post-<?php the_ID(); ?>" class="post">
		<div class="post-header">
			<h2 class="post-title"><a href="<?php the_permalink() ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<h3 class="post-date"><?php the_time('d-M-y') ?></h3>
		</div><!-- END POST-HEADER  -->
		<div class="post-entry">
			<?php the_content(); ?>
			<?php link_pages('<p style="font-weight:bold;">Pages: ', '</p>', 'number'); ?>
		</div><!-- END POST-ENTRY -->
		<div class="post-metadata">
			<p class="post-footer">Filed in <?php the_category(', ') ?> | <a href="<?php the_permalink() ?>" rel="permalink" title="Permalink to <?php the_title(); ?>">Permalink</a> | <?php comments_popup_link('Comments (0) &raquo;', 'Comments (1) &raquo;', 'Comments (%) &raquo;'); ?> <?php edit_post_link('Revise', ' | ', ''); ?></p>
		</div><!-- END POST-METADATA -->
		<!-- <?php trackback_rdf(); ?> -->
	</div><!-- END POST -->	

<?php endwhile; ?>

	<div class="navigation">
		<div class="alignleft"><?php next_posts_link('&laquo; Older posts') ?></div>
		<div class="alignright"><?php previous_posts_link('Newer posts &raquo;') ?></div>
		<div class="middle"><a href="<?php echo get_settings('home'); ?>/" title="Home: <?php bloginfo('name'); ?>">Home</a></div>
	</div><!-- END NAVIGATION -->

<?php else : ?>
<?php /* INCLUDE FOR ERROR TEXT */ include (TEMPLATEPATH . '/errortext.php'); ?>
<?php endif; ?>

<?php } else { /* END OF 'INDEX' OR NOT, BEING SUMMARY_HOME STUFF */ ?>

	<div id="post-summary" class="post">
		<div class="post-header">
			<h2 class="post-title">Recent Posts</h2>
		</div><!-- END POST-HEADER  -->
		<div id="post-entry-summary" class="post-entry">
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
			<div id="post-excerpt-<?php the_ID(); ?>" class="post-excerpt">
				<h3 class="excerpt-title"><a href="<?php the_permalink() ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
				<p class="excerpt-entry"><?php the_content_rss('', FALSE, '', 50, 0); ?></p>
				<p class="excerpt-footer">Posted on <?php the_time('d-M-y') ?> | Filed in <?php the_category(', ') ?> | <a href="<?php the_permalink() ?>" rel="permalink" title="Permalink to <?php the_title(); ?>">Permalink</a> | <?php comments_popup_link('Comments (0) &raquo;', 'Comments (1) &raquo;', 'Comments (%) &raquo;'); ?> <?php edit_post_link('Revise', ' | ', ''); ?></p>
				<!-- <?php trackback_rdf(); ?> -->
			</div><!-- END POST-EXCERPT -->
<?php endwhile; ?>
			<h4 class="post-navigation alignleft"><?php next_posts_link('&laquo; Older posts') ?></h4>
			<h4 class="post-navigation alignright"><?php previous_posts_link('Newer posts &raquo;') ?></h4>
		</div><!-- END POST-ENTRY -->
	</div><!-- END POST -->
	
	<div id="other-summary" class="post" style="clear:both;">
		<div class="post-header" style="margin:0;">
			<h2 class="post-title">Recent Miscellaneous</h2>
		</div><!-- END POST-HEADER  -->

<?php /* SIMPLE RECENT COMMENTS PLUGIN 0.1a  USED BY PERMISSION OF RAOUL http://www.raoul.shacknet.nu/ */
function src_simple_recent_comments($src_count=7, $src_length=60, $pre_HTML='<li><h2>Recently Commented</h2>', $post_HTML='</li>') {
	global $wpdb;
	$sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID, comment_post_ID, comment_author, comment_date_gmt, comment_approved, comment_type, 
			SUBSTRING(comment_content,1,$src_length) AS com_excerpt 
		FROM $wpdb->comments 
		LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID = $wpdb->posts.ID) 
		WHERE comment_approved = '1' AND comment_type = '' AND post_password = '' 
		ORDER BY comment_date_gmt DESC 
		LIMIT $src_count";
	$comments = $wpdb->get_results($sql);
	$output = $pre_HTML;
	$output .= "\n<ul>";
	foreach ($comments as $comment) {
		$output .= "\n\t<li><a href=\"" . get_permalink($comment->ID) . "#comment-" . $comment->comment_ID  . "\" title=\"on " . $comment->post_title . "\">" . $comment->comment_author . "</a> &mdash; " . strip_tags($comment->com_excerpt) . "...</li>";
	}
	$output .= "\n</ul>";
	$output .= $post_HTML;
	echo $output;
} 
?>
		<div class="content-column post-entry">
			<ul class="list" id="recent-comments">
				<?php /*FIRST NUMBER IS COMMENT COUNT TO INCLUDE. SECOND IS TOTAL CHARACTER COUNT */ src_simple_recent_comments(5, 125) ?>
			</ul>
		</div><!-- END CONTENT COLUMN -->
		<div class="content-column post-entry">
			<ul class="list" id="recent-links">
				<li>
					<h2>Recently Linked</h2>
					<ul>
						<?php get_links('-1', '<li>', '</li>', ' &mdash; ', FALSE, '_id', TRUE, FALSE, 7, FALSE); ?>
					</ul>
				</li>
			</ul>
		</div><!-- END CONTENT COLUMN  -->
	</div><!-- END POST -->

<?php else : ?>
<?php /* INCLUDE FOR ERROR TEXT */ include (TEMPLATEPATH . '/errortext.php'); ?>
<?php endif; ?>


<?php } /* FINISHED ASKING IF INDEX OR SUMMARY FROM THEME OPTIONS */  ?>

</div><!-- END CONTENT -->

<?php get_footer(); ?>