<?php if (is_404()) { header("HTTP/1.1 404 Not Found"); } ?>
<!DOCTYPE html 
     PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Article <?php } ?> <?php wp_title(); ?></title>

<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/prototype.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/moo.fx.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/behaviour.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/comment.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/search.js"></script>
<script type="text/javascript">
Event.observe(
  window, 
  'load', 
  function() { 
  	<?php if( is_single() ) { ?>new WP_Dark_Comment('<?php bloginfo('stylesheet_directory'); ?>/post-comment.php');<?php echo "\n"; } ?>
  	new WP_Dark_Search('<?php bloginfo('siteurl'); ?>');
  },
  true);
</script>
<?php wp_get_archives('type=monthly&format=link'); ?>

<?php wp_head(); ?>
</head>
<body id="top">
<div id="menucontainer">
<div class="content">
<ul>
<li <?php if(is_home()) { echo 'class="current_page_item"'; } ?>><a href="<?php if(get_bloginfo('home') == '') { echo '/'; } else { bloginfo('home'); } ?>"><?php bloginfo('name'); ?></a></li>
<?php wp_list_pages('sort_column=menu_order&title_li='); ?>
</ul>
</div>
</div>