<div id="sidebar-wide" class="sidebar">
	
	<ul class="xoxo sidebar-items">
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Sidebar Wide") ) : ?><!--#sidebar-wide widgets start-->
		
		<li id="pp-recent-posts" class="widget">
			<h2 class="widgettitle"><?php _e('Recent Posts'); ?></h2>
			<ul>
				<?php wp_get_archives('type=postbypost&limit=10'); ?>
			</ul>
		</li>
		
	<?php endif; ?><!--#sidebar-wide widgets end-->
	</ul>

</div><!--#sidebar-wide-->