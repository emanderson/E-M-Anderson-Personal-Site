<table border="0" align="center" cellpadding="1" cellspacing="1" class="footer_table">
  <tr>
    <td align="center"><?php bloginfo('name'); ?> is proudly powered by NewZen <?php newzen_version();?><br>
    <a href="feed:<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a> and <a href="feed:<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a>.<?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds.</td>
  </tr>
</table>
<?php wp_footer(); ?>
	<script type="text/javascript">
		Element.cleanWhitespace('content');
		init();
	</script>
<script type="text/javascript" src="http://tracker.measuremap.com/a/883"></script>
</body>
</html>