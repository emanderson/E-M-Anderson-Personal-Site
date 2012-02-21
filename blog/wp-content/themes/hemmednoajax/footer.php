<!-- begin footer -->

<div id="footer">

	<div id="footercredit">
		<a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a> &copy; <?php the_time('Y') ?>  <?php the_author() ?>. <a href="http://blox.nfiniti.org/">Hemmed</a> theme by <a href="http://www.nfiniti.org/">Charlie</a>.<br />
		<!-- <?php echo $wpdb->num_queries; ?> queries. <?php timer_stop(1); ?> seconds. <cite> -->
		<?php echo sprintf(__("Powered by <a href='http://wordpress.org' title='%s'>WordPress </a>"), __("Powered by WordPress, state-of-the-art semantic personal publishing platform.")); ?><?php bloginfo('version'); ?>
	</div>
	<div id="footermeta">
		<?php wp_register('', ' - '); ?><?php wp_loginout(); ?> - <a href="<?php bloginfo('rss2_url'); ?>">Entries RSS</a> - <a href="<?php bloginfo('comments_rss2_url'); ?>">Comments RSS</a>
	</div>

</div>


<?php do_action('wp_footer'); ?>

</body>
</html>