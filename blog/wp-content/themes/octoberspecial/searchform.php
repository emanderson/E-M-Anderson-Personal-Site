<div id="searchthis">
	<p>The archives run deep. Feel free to search older content using topic keywords.</p>
	<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
		<div><input type="text" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" />
		<input id="searchsubmit" type="image" src="<?php bloginfo('template_directory'); ?>/images/search-btn.gif" alt="Submit" /></div>
	</form>
</div>
