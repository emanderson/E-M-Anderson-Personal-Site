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
<style type="text/css" media="screen">

	/*
        The css selector bellow controls the blog width and position on the page. If you want to
        change the width of your blog you need to change the position too if you want your blog to
        stay in the middle of the page. So let's say that you want to change your width to 705px.
        To calculate the exact position that will situate your blog in the middle you need to add
        35px to the desired width and to divide the sum by 2. In our case we sum 705 and 35 and then we
        divide the sum 740 by 2 which give us the result of 370. So the selector bellow will look in the
        following way after the change:
				
		#page {
			width: 705px;
			left: -370px;
		}
	*/
	#page {
		width: 835px;
		left: -435px;
	}

	/*
		Here you can change the header image and the height of the header too. Here is an example:
		
		#header_1 {
			background-image: url(<?php bloginfo('stylesheet_directory'); ?>/images/tree.jpg);
			background-position: top center;
			background-repeat: no-repeat;
			height: 250px;
		}
	*/
	#header_1 {
		background-image: url(<?php bloginfo('stylesheet_directory'); ?>/images/header_background.jpg);
		background-position: top center;
		background-repeat: repeat-x;
		height: 223px;
	}
	
	/*
		The last two selectors controls the correlation between the sidebar menus' width and the contents' 
		width. I suggest the sum between these two widths to be little than 100 or equal to 100. An 
		example follows:
		
		#sidebar {
			width: 35%;
		}
		
		#text {
			width: 65%;
		}
	*/	
	#sidebar {
		width: 27%;
	}
	
	#text {
		width: 72.5%;
	}
</style>
</head>
<body>
<div id="page">
	<div id="page_2">
	<div id="left_side_2">&nbsp;</div>
	<div id="right_side_2">&nbsp;</div>
	<div id="header">
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