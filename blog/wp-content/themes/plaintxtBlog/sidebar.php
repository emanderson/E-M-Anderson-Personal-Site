<div id="col1" class="sidebar">
	<ul>
<?php /* FUNCTION FOR WIDGETS */ if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(1) ) : ?>
	<?php /* IF THIS IS THE HOME PAGE, DISPLAYS ALL PAGES. IF NOT, THEN JUST THE PARENT PAGES  */ if(is_home()) {
		wp_list_pages('depth=0&sort_column=menu_order&title_li=<h2>Contents</h2>' );
		echo '<li id="meta"><h2>Meta</h2><ul>';
		wp_register();
		echo '<li>';
		wp_loginout();
		echo '</li></ul></li>';
		wp_meta();
	} else { 
		wp_list_pages('depth=1&sort_column=menu_order&title_li=<h2>Contents</h2>' );
	} ?>
		<li id="feed-link">
			<h2>RSS Feeds</h2>
			<ul>
				<li>Posts <a href="<?php bloginfo('rss2_url'); ?>" title="<?php bloginfo('name'); ?> RSS 2.0 (XML) Feed" rel="alternate" type="application/rss+xml"><img src="<?php bloginfo('stylesheet_directory'); ?>/icons/feed.png" alt="RSS 2.0 XML Feed" /></a></li>
				<li>Comments <a href="<?php bloginfo('comments_rss2_url'); ?>" title="<?php bloginfo('name'); ?> Comments RSS 2.0 (XML) Feed" rel="alternate" type="application/rss+xml"><img src="<?php bloginfo('stylesheet_directory'); ?>/icons/feed.png" alt="Comments RSS 2.0 XML Feed" /></a></li>
			</ul>
		</li>
<?php if (! is_search() ) { ?>
		<li id="search">
			<h2><label for="s">Search</label></h2>
			<?php include (TEMPLATEPATH . '/searchform.php'); ?>
		</li>
<?php } ?>
<?php endif; /* END FOR WIDGETS CALL */ ?>
	</ul>
</div><!-- END COL1 SIDEBAR -->

<div id="col2" class="sidebar">
	<ul>
<?php /* FUNCTION FOR WIDGETS */ if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(2) ) : ?>
	<?php /* IF THIS IS A PAGE */ if (is_page()) {
		$current_page = $post->ID;
	while($current_page) {
		$page_query = $wpdb->get_row("SELECT ID, post_name, post_parent FROM $wpdb->posts WHERE ID = '$current_page'");
		$current_page = $page_query->post_parent;
	}
		$parent_id = $page_query->ID;
		$parent_name = $page_query->post_name;
		$test_for_child = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_parent = '$parent_id'");
	if($test_for_child) 
	{ ?>
		<li id="subpage-links">
			<h2 style="text-transform:capitalize;"><?php echo $parent_name; ?></h2>
			<ul>
				<?php wp_list_pages('sort_column=post_name&title_li=&child_of='. $parent_id); ?> 
			</ul>
		</li>
	<?php } } ?>
		<li id="category-links">
			<h2>Categories</h2>
			<ul>
				<?php wp_list_cats('sort_column=name&hierarchical=0'); ?>
			</ul>
		</li>
<?php if ( is_home() ) { ?>	
	<?php
		$link_cats = $wpdb->get_results("SELECT cat_id, cat_name FROM $wpdb->linkcategories");
		foreach ($link_cats as $link_cat) {
	?>
	<li id="linkcat-<?php echo $link_cat->cat_id; ?>"><h2><?php echo $link_cat->cat_name; ?></h2>
		<ul>
			<?php get_links($link_cat->cat_id, '<li>', '</li>', '', FALSE, 'id', FALSE, FALSE); ?>
		</ul>
	</li>
	<?php } ?>
<?php } ?>
<?php endif; /* END FOR WIDGETS CALL */ ?>
	</ul>
</div><!-- END COL2 SIDEBAR -->