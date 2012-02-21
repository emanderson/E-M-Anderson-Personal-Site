<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>

<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/sIFR-screen.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/sIFR-print.css" type="text/css" media="print" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<style type="text/css" media="screen">
/*	To accomodate differing install paths of WordPress, images are referred only here,
	and not in the wp-layout.css file. If you prefer to use only CSS for colors and what
	not, then go right ahead and delete the following lines, and the image files. */
		
	body { background: url("<?php bloginfo('stylesheet_directory'); ?>/images/kubrickbgcolor.jpg"); }	
<?php /* Checks to see whether it needs a sidebar or not */ if ((! $withcomments) && (! is_single())) { ?>
	#page { background: url("<?php bloginfo('stylesheet_directory'); ?>/images/box_bg.jpg") repeat-y top; border: none; }
<?php } else { // No sidebar ?>
	#page { background: url("<?php bloginfo('stylesheet_directory'); ?>/images/box_wide.jpg") repeat-y top; border: none; } 
<?php } ?>
	#header { background: url("<?php bloginfo('stylesheet_directory'); ?>/images/box_top.jpg") no-repeat bottom center; }
	#title { background: url("<?php bloginfo('stylesheet_directory'); ?>/images/title.jpg") no-repeat bottom center; }
	#footer { background: url("<?php bloginfo('stylesheet_directory'); ?>/images/box_bot.jpg") no-repeat bottom; border: none;}
	<?php /*
    #shelf { background: #666 url("<?php bloginfo('stylesheet_directory'); ?>/images/bg-nav-search-top.gif") left bottom repeat-x; } */?>
	#shelf { background: url("<?php bloginfo('stylesheet_directory'); ?>/images/shelfbgwide.jpg") repeat-y top; border: none; } 	
    #handle { background: #666 url("<?php bloginfo('stylesheet_directory'); ?>/images/shelffooter.jpg") left bottom repeat-x; }
/*	Because the template is slightly different, size-wise, with images, this needs to be set here
	If you don't want to use the template's images, you can also delete the following two lines. */
		
	#header 	{
	margin: 0 !important;
	margin: 0 0 0 1px;
	padding: 1px;
	height: 10px;
	width: 758px;
}
	#headerimg 	{ margin: 7px 9px 0; height: 13px; width: 740px; } 

/* 	To ease the insertion of a personal header image, I have done it in such a way,
	that you simply drop in an image called 'personalheader.jpg' into your /images/
	directory. Dimensions should be at least 760px x 200px. Anything above that will
	get cropped off of the image. */
	/*
	#headerimg { background: url('<?php bloginfo('stylesheet_directory'); ?>/images/personalheader.jpg') no-repeat top;}
	*/
</style>

        <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/sifr.js"></script>
        <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/sifr-addons.js"></script>
        <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/prototype.js"></script>
        <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/moo.fx.js"></script>
        <script type="text/javascript">
		Event.observe(window, 'load', initShelf, false);

		function initShelf()
		{
			shelffx = new fx.Height("shelf", {duration: 300});
			shelffx.hide();
		}
        </script>

<?php wp_head(); ?>
</head>
<body>
<center><a href="<?php echo get_settings('home'); ?>/"><div id="title"></div></a></center>
<?php include "shelf.php"; ?>
<div id="page">
<div id="header">

</div>

<hr />
