</div>
</div>
<div id="footer">
	<div class="copyright">Theme by <a href="http://www.sunaryohadi.info/" title="Sunaryo Hadi">Sunaryo Hadi</a> of <a href="http://www.frisidea.com/" title="Frisidea.com">frisidea.com</a>.
	<?php bloginfo('name'); ?> is powered by <a href="http://wordpress.org/">WordPress</a>
	</div>
	<div class="rss"><?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds.</div>
</div>
<?php	include(TEMPLATEPATH . '/sifr.php');?>
<?php wp_footer(); ?>
</body>
</html>