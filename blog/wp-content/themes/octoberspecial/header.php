<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<title><?php if (is_home () ) { bloginfo('name'); } elseif ( is_category() ) {
single_cat_title(); echo " - "; bloginfo('name');
} elseif (is_single() || is_page() ) {
single_post_title();
} elseif (is_search() ) {
bloginfo('name'); echo " search results: "; echo wp_specialchars($s);
} else { wp_title('',true); }
?></title>
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link href="<?php bloginfo('template_url'); ?>/switch.css" type="text/css" rel="stylesheet" />	
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head(); ?>
</head>
<body class="<?php echo getColorScheme(); ?>">
<div id="main_wrapper">
	<div id="header_wrapper">
		<div id="nav_wrapper" class="clearfix">
			<ul id="navigation">
				<li><a href="/">Home</a></li>
				<li><a href="/">Colophon</a></li>
				<li><a href="#categories">Archives</a></li>
				<li class="right"><a href="#bottom_wrapper">Search</a></li>
			</ul>
		</div>
	</div>
	<div id="bca_wrapper">
		<div id="bca_inner" class="clearfix">
			<div class="bca_border">
				<div class="bca_title">
					<h3><?php bloginfo('name'); ?></h3>
				</div>
				<div class="bca_desc">“I like nonsense, it wakes up the brain cells. Fantasy is a necessary ingredient in living, it’s a way of looking at life through the wrong end of a telescope. Which is what I do, and that enables you to laugh at life’s realities.” - <em>Dr. Seuss</em>
				</div>
			</div>
		</div>
	</div>