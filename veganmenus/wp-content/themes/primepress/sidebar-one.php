<div id="sidebar-1" class="sidebar">

	<ul class="xoxo sidebar-items">
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Sidebar One") ) : ?><!--sidebar-1 widgets start-->
		
		<li class="widget">
			<h2 class="widgettitle"><?php _e('Categories'); ?></h2>
			<ul>
				<?php wp_list_categories('title_li='); ?>
			</ul>
		</li>
		
		<li class="widget">
			<h2 class="widgettitle"><?php _e('Archives'); ?></h2>
			<ul>
				<?php wp_get_archives(); ?>
			</ul>
		</li>
		
	<?php endif; ?><!--sidebar-1 widgets end-->
	</ul>

</div><!--#sidebar-1-->