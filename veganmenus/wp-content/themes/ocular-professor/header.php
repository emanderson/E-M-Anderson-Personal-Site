<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<title><?php
	if (is_home()) {
		echo bloginfo('name');
	} elseif (is_404()) {
		echo '404 Not Found';
	} elseif (is_category()) {
		echo 'Category:'; wp_title('');
	} elseif (is_search()) {
		echo 'Search Results';
	} elseif ( is_day() || is_month() || is_year() ) {
		echo 'Archives:'; wp_title('');
	} else {
		echo wp_title('');
	}
	?>
	</title>

	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php bloginfo('url'); ?>/xmlrpc.php?rsd" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<!--[if lte IE 7]>
	<link href="<?php bloginfo('template_directory'); ?>/ie.css" type="text/css" rel="stylesheet" media="screen" />
	<![endif]-->
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' );?>
	<?php wp_head(); ?>
</head>

<body>

<div id="header">

        <div id="blog_title">
			<div id="cap">
			<span class="skip"><a href="#wrapper">&raquo; skip to content &laquo;</a></span>
			<span class="feeds"><a href="<?php bloginfo('rss2_url'); ?>">rss &sect;</a>
								<a href="<?php bloginfo('atom_url'); ?>">atom &sect;</a>
								<a href="<?php bloginfo('rdf_url'); ?>">rdf</a>
								</span>
			</div>
			
			<h1><?php bloginfo('name'); ?></h1>
			<p class="description"><?php bloginfo('description'); ?></p>
			<div id="search">
			<?php include (TEMPLATEPATH . '/searchform.php'); ?></div>
		</div>
			
		<div id="topnav">
		<ul>
			<li class="home <?php if ( is_home()) { echo 'current"'; } else {echo '"'; } ?>><a href="<?php bloginfo('url'); ?>">Home</a></li>
			<?php wp_list_pages('title_li=&depth=1'); ?>
		</ul>
		</div>
		
</div>