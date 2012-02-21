<div id="footer">

	<p><small>
		<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>
		<?php _e('is powered by') ?>
		<a href="http://wordpress.org" title="Powered by WordPress <?php bloginfo('version'); ?>, state-of-the-art semantic personal publishing platform">WordPress <?php bloginfo('version'); ?></a>
		<?php 
			_e(' and delivered to you in '); 
			timer_stop(1); 
			_e(' seconds using '); 
			echo $wpdb->num_queries; 
			_e(' queries.');
		?>
		<br />
		Theme: <a href="http://ajaydsouza.com/wordpress/wpthemes/connections-reloaded/" title="Powered by Connections Reloaded">Connections Reloaded v1.5</a> <?php _e(' by ') ?> <a href="http://ajaydsouza.com" title="Visit Ajay's Blog">Ajay D'Souza</a>. <?php _e('Derived from ') ?> <a href="http://vanillamist.com/blog/?page_id=64" title="Connections Theme">Connections</a>. 
	</small></p>
	<?php wp_footer(); ?>
</div> <!-- End id="footer" -->
</div> <!-- End id="main" -->
</div> <!-- End id="rap" -->
</body>
</html>
