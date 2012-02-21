<div id="sidebar">
	<ul>
		<li>
			<h2>Search It!</h2>
			<div class="sidebar_section">
				<?php include (TEMPLATEPATH . '/searchform.php'); ?>
			</div>
		</li>
		<li>
			<h2>Feed It!</h2>
			<div class="sidebar_section">
				<p class="center"><a href="<?php bloginfo_rss('rss2_url'); ?>"><img class="off" src="<?php bloginfo('template_url'); ?>/images/icon_feed.gif" width="32" height="32" alt="Grab this site's feed!" /></a></p>
				<p class="center"><a href="<?php bloginfo_rss('rss2_url'); ?>">Subscribe to this site!</a></p>
			</div>
		</li>
		<li>
			<h2>Recent Entries</h2>
			<div class="sidebar_section">
				<ul>
					<?php query_posts('showposts=8'); ?>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<li><a href="<?php the_permalink() ?>"><?php the_title() ?></a><span class="quick_date"><?php the_time('m.j') ?></span></li>
					<?php endwhile; endif; ?>
				</ul>
			</div>
		</li>
		<li>
			<h2>Links</h2>
			<div class="sidebar_section">
				<ul>
					<?php get_links(-1, '<li>', '</li>', '', FALSE, 'id', FALSE, FALSE, -1, TRUE); ?>
				</ul>
			</div>
		</li>
	</ul>
</div>