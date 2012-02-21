<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>

<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head(); ?>
</head>
<body>
<div id="page">
	<div id="header">
		<div id="left_side_2">&nbsp;</div>
		<div id="right_side_2">&nbsp;</div>
		<div id="header_1">
			<div id="blog_title"><a href="<?php echo get_settings('home'); ?>/"><?php bloginfo('name'); ?></a></div>
			<div id="blog_moto"><?php bloginfo('description'); ?></div>
		</div>
		<div id="header_2">
			<div id="rss_holder">
				<strong>RSS:</strong>&nbsp;
				<a href="feed:<?php bloginfo('rss2_url'); ?>">Entries</a>&nbsp;<strong>|</strong>&nbsp;<a href="feed:<?php bloginfo('comments_rss2_url'); ?>">Comments</a>
			</div>
			<?php include (TEMPLATEPATH . '/searchform.php'); ?>
			
			<!-- if you want a vertical menu uncomment this
			<div id="h_menu_holder">
				<a href="#">Menu Item 1</a>&nbsp;<strong>|</strong>&nbsp;
				<a href="#">Menu Item 2</a>&nbsp;<strong>|</strong>&nbsp;
				<a href="#">Menu Item 3</a>&nbsp;
			</div>
			-->
			
		</div>

	</div>