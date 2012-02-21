	<div id="footer">
		<p>
			&copy; <?php echo(date('Y')); ?> <?php the_author('nickname'); ?>
			|
			Thanks, <a href="http://wordpress.org/" title="WordPress">WordPress</a>
			|
			<a href="http://www.plaintxt.org/themes/barthelme/" title="Barthelme for WordPress" rel="follow">Barthelme</a> theme by <a href="http://scottwallick.com/" title="scottwallick.com" rel="follow">Scott</a>
			| <!-- The following is a link to the theme author's sponsor. Please consider its smallness and that Scott was nice enough to make this theme publically available. -->
			Sponsor: <a href="http://www.active-sandals.com/womreefsan.html" title="Support: Reef Sandals">Reef Sandals</a>
			|
			Valid <a href="http://validator.w3.org/check?uri=<?php echo get_settings('home'); ?>&amp;outline=1&amp;verbose=1" title="Valid XHTML 1.0 Strict" rel="nofollow">XHTML</a> &amp; <a href="http://jigsaw.w3.org/css-validator/validator?uri=<?php bloginfo('stylesheet_url'); ?>&amp;profile=css2&amp;warning=no" title="Valid CSS" rel="nofollow">CSS</a>
			|
			RSS: <a href="<?php bloginfo('rss2_url'); ?>" title="<?php bloginfo('name'); ?> RSS 2.0 (XML) Feed" rel="alternate" type="application/rss+xml">Posts</a> &amp; <a href="<?php bloginfo('comments_rss2_url'); ?>" title="<?php bloginfo('name'); ?> Comments RSS 2.0 (XML) Feed" rel="alternate" type="application/rss+xml">Comments</a>
		</p>
	</div>

</div><!-- END WRAPPER -->

	<!-- Somehow <?php echo $wpdb->num_queries; ?> queries occured in <?php timer_stop(1); ?> seconds. Magic! -->
	<!-- The "Barthelme" theme copyright (c) 2006 Scott Allan Wallick - http://www.plaintxt.org/themes/ -->
	<?php do_action('wp_footer'); ?>

</body>
</html>