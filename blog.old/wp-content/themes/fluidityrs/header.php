<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>
	
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php wp_head(); ?>
</head>
<body>

<div id="hdrimg">
<span class="validation">
<a href="<?php bloginfo('rss2_url'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/rss.gif" alt="Subscribe to RSS" /></a>
<a href="<?php bloginfo('comments_rss2_url'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/rsscomments.gif" alt="Subscribe to Comments" /></a>
</span>
<h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>

<ul id="nav">
<!-- Please read readme file for customisation of header links 


<?php /* If this is the frontpage */ if ( is_home() ) { ?>
<li><a href="<?php echo get_settings('home');?>" id="current">Home</a></li><?php } else { ?>
<li><a href="<?php echo get_settings('home');?>">Home</a></li>
<?php } ?>

<?php /* If this is the frontpage */ if ( is_page('7')  ) { ?>
<li><a href="<?php bloginfo('url'); ?>/?page_id=7" id="current">Page1</a></li><?php } else { ?>
<li><a href="<?php bloginfo('url'); ?>/?page_id=7">Page1</a></li>
<?php } ?>

<?php /* If this is the frontpage */ if ( is_page('8')  ) { ?>
<li><a href="<?php bloginfo('url'); ?>/?page_id=8" id="current">Page2</a></li><?php } else { ?>
<li><a href="<?php bloginfo('url'); ?>/?page_id=8">Page2</a></li>
<?php } ?>
-->

 <li><a href="<?php bloginfo('url'); ?>" title="home" id="current">home</a></li>
 <li><a href="" title="about">about</a></li>
 <li><a href="" title="blog">blog</a></li>
 <li><a href="" title="contact">contact</a></li>
 <li><a href="" title="links">links</a></li>


</ul>

</div>	
<!-- end of hdr img -->


