<div id="header">

	<h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
	
	<a href="<?php bloginfo('url'); ?>"><?php bloginfo('description'); ?></a>
	
	<div id="search">
		
		<?php include(TEMPLATEPATH . '/searchform.php'); ?>
		
	</div>
	
</div>

<div id="navbar">
	
	<?php wp_page_menu('show_home=1'); ?>
	
</div>