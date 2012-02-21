<div id="footer">
	<p>
		Design by <a href="http://sunaryohadi.info/" title="Theme designed by Sunaryo Hadi">Sunaryo Hadi</a>. <?php bloginfo('name'); ?> is proudly powered by 
		<a href="http://wordpress.org/">WordPress</a> <!--<?php bloginfo('version'); ?>.--><br/>
		<a href="feed:<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a>
		and <a href="feed:<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a>.
		<?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds.
	</p>
</div>
</div>
<br/>
<?php wp_footer(); ?>

</body>
</html>
