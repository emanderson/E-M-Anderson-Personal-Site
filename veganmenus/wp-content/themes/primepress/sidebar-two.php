<div id="sidebar-2" class="sidebar">
	
	<ul class="xoxo sidebar-items">
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Sidebar Two") ) : ?><!--sidebar-2 widgets start-->
		
		<li class="widget">
			<h2 class="widgettitle"><?php _e('Calendar'); ?></h2>
			<div id="calendar_wrap">
				<?php get_calendar(); ?>
			</div>
		</li>
		
		<li class="widget">
			<h2 class="widgettitle"><?php _e('Pages'); ?></h2>
			<ul>
			<?php wp_list_pages('title_li='); ?>
			</ul>
		</li>		
		
		<li class="widget">
			<h2 class="widgettitle"><?php _e('Meta'); ?></h2>
			<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
			<?php wp_meta(); ?>
			</ul>
		</li>
		
	<?php endif; ?><!--sidebar-2 widgets end-->
	</ul>

</div><!--#sidebar-2-->