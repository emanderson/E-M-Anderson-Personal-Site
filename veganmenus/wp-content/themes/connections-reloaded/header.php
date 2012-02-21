<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/1">
	<title>
		<?php if (is_404())
			_e('Error 404 - Not Found &raquo; ');
		elseif (is_search())
		{
			_e('Search Results for ');
			echo '&#8220;'.$s.'&#8221; &raquo; ';
		}
		elseif (is_tag())
		{
			_e('Entries tagged with ');
			echo '&#8220;'.single_tag_title("", false).'&#8221; &raquo; ';
		}
		else
			wp_title(' ');
		
		if(wp_title(' ', false)) echo ' &raquo; ';
		bloginfo('name'); ?>
	</title>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats please -->
	<meta name="author" content="Ajay D'Souza" />
	<style type="text/css" media="screen">
		@import url( <?php bloginfo('stylesheet_url'); ?> );
	</style>	
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="alternate" type="application/x-opera-widgets" title="<?php bloginfo('name'); ?> Feed" href="http://widgets.opera.com/widgetize/Feed%20Reader/Advanced/?serve&amp;skin=skin7&amp;widgetname=<?php rawurlencode(bloginfo('name')); ?>&amp;url=<?php rawurlencode(bloginfo('rss2_url')); ?>&amp;rel=myopera&amp;ref=" />  

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_get_archives('type=monthly&format=link'); ?>
	<link rel="shortcut icon" href="<?php bloginfo('url'); ?>/favicon.ico" />
	<link rel="icon" href="<?php bloginfo('url'); ?>/favicon.ico" type="image/x-icon" />
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>
</head>

<body>
<div id="rap">
<div id="header">
	<ul id="topnav">
		<li <?php if(is_home()){echo 'class="current_page_item"';}?>><a href="<?php bloginfo('siteurl'); ?>" title="<?php _e('Home'); ?>"><?php _e('Home'); ?></a></li>
	  <?php wp_list_pages('title_li=&depth=1&sort_column=menu_order');?>
	</ul>
	<div id="headimg">
	<h1><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>		
	<div id="desc"><?php bloginfo('description');?></div>
	</div>
</div>
