<div id="sidebar">

<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar() ) : ?>

<h2 class="title">Navigation</h2>
		<ul id="links"><?php wp_list_pages('sort_column=menu_order&title_li='); ?></ul>

	<ol id="calendar">
		<li><?php get_calendar(0); ?></li>
	</ol>

	<h2 class="title"><?php _e('Categories'); ?></h2>
	<ul id="cats_list">
		<?php wp_list_cats('optioncount=1&children=0'); ?>
	</ul>

	<h2 class="title"><?php _e('Archives'); ?></h2>
	<ul id="archive_list">
		<?php wp_get_archives('show_post_count=1'); ?>
	</ul>

<?php endif; ?>

</div>