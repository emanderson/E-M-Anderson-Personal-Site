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

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_get_archives('type=monthly&format=link'); ?>
	<link rel="shortcut icon" href="<?php bloginfo('url'); ?>/favicon.ico" />
	<?php wp_head(); ?>
</head>

<body>
<div id="rap">
<div id="header">
	<ul id="topnav">
		<li><a href="<?php bloginfo('url'); ?>" id="navHome" title="Posted Recently" accesskey="h">Home</a> | </li>
		<li><a href="/about/" id="navAbout" title="About the Author" accesskey="a">About</a> | </li>
		<li><a href="/archives/" id="navArchives" title="Posted Previously" accesskey="r">Archives</a> | </li>
		<li><a href="/links/" id="navLinks" title="Recommended Links" accesskey="l">Links</a> | </li>
		<li><a href="/contact/" id="navContact" title="Contact the Author" accesskey="c">Contact</a></li>
	</ul>
	<h1><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>		
	<div id="desc"><?php bloginfo('description');?></div>
</div>
