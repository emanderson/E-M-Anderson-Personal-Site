<?php 
	get_header();
	get_sidebar();
?>

<div id="content" class="narrowcolumn">

<?php if (have_posts()) : ?>
 
	<div id="post-searchresults" class="post">
		<div class="post-header">
			<h2 class="post-title">Search Results</h2>
		</div><!-- END POST-HEADER  -->
		<div class="post-entry">
			<p>Search complete for &#8220;<strong><?php echo wp_specialchars($s); ?></strong>&#8221;. Results are below.</p>
			<ol>
<?php while (have_posts()) : the_post(); ?>
				<li id="post-<?php the_ID(); ?>" style="margin-bottom:10px;">
					<strong><a href="<?php the_permalink() ?>" rel="bookmark" title="Permalink to <?php the_title(); ?>"><?php the_title(); ?></a></strong>
					<br/>
					<span class="excerpt"><?php the_excerpt_rss(); ?></span>
					<br />
					<em>Filed in <?php the_category(', ') ?> | <?php the_time('d-M-y') ?> | <?php comments_popup_link('no comments', 'one comment', '% comments'); ?></em>
				</li>
<?php endwhile; ?>
			</ol>
			<p>Want to search again for something else?</p>
			<form id="searchform" method="get" action="<?php bloginfo('home'); ?>/">
				<p><label for="s"><strong>Search Again</strong></label> <br/>
				<input type="text" name="s" id="s" size="5" tabindex="1" style="border:1px inset #666;font-size:1.125em;font-family:verdana, helvetica, sans-serif;margin: 0;padding: 2px;width:7em;" /><input type="submit" name="searchsubmit" id="searchsubmit" value="Find" tabindex="2" /></p>
			</form>
		</div><!-- END POST-ENTRY -->
	</div><!-- END POST -->

	<div class="navigation">
		<div class="alignleft"><?php next_posts_link('&laquo; Older posts') ?></div>
		<div class="alignright"><?php previous_posts_link('Newer posts &raquo;') ?></div>
		<div class="middle"><a href="<?php echo get_settings('home'); ?>/" title="Home: <?php bloginfo('name'); ?>">Home</a></div>
	</div><!-- END NAVIGATION -->

<?php else : ?>

	<div id="post-searchresults" class="post">
		<div class="post-header">
			<h2 class="post-title">Search Results</h2>
		</div><!-- END POST-HEADER  -->
		<div class="post-entry">
			<p>Nothing was found with &#8220;<strong><?php echo wp_specialchars($s); ?></strong>&#8221;. Please change your keyword(s) and try your search again.</p>
				<form id="searchform" method="get" action="<?php bloginfo('home'); ?>/">
					<label for="s"><strong>Search Again</strong></label> <br/>
					<input type="text" name="s" id="s" size="5" tabindex="1" style="border:1px inset #666;font-size:1.125em;font-family:verdana, helvetica, sans-serif;margin: 0;padding: 2px;width:7em;" />
					<input type="submit" name="searchsubmit" id="searchsubmit" value="Find" tabindex="2" /></div>
				</form>
		</div><!-- END POST-ENTRY -->
	</div><!-- END POST -->

<?php endif; ?>

</div><!-- END CONTENT -->

<?php get_footer(); ?>