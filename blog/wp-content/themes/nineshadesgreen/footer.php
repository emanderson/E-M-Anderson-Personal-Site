</div> <!-- Page Div -->

<div id="footer">
	<p>
		Powered by <a href="http://wordpress.org">WordPress</a>
		<br />Theme Created by <a href="http://stevish.com">Stevish</a>
		<br /><a href="feed:<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a>
		and <a href="feed:<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a>.
		<!-- <?php echo $wpdb->num_queries; ?> queries. <?php timer_stop(1); ?> seconds. -->
	</p>
</div>

</div> <!--Centerwrap-->

		<?php do_action('wp_footer'); ?>


</body>
</html>