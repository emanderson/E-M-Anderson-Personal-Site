<?php include_once(dirname(__FILE__) . '/functions.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?> running Newzen <?php newzen_version() ?>" /> <!-- leave this for stats -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<style type="text/css">
		<?php newzen_header();?>
	</style>
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/prototype.lite.js"></script>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/moo.fx.js"></script>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/moo.fx.pack.js"></script>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/fat.js"></script>
	<script type="text/javascript">
	//the main function, call to the effect object
	function init(){

		var stretchers = document.getElementsByClassName('stretcher'); //div that stretches
		var toggles = document.getElementsByClassName('display'); //h3s where I click on

		//accordion effect
		var myAccordion = new fx.Accordion(
			toggles, stretchers, {opacity: true, duration: 400}
		);

		//hash functions
		var found = false;
		toggles.each(function(h3, i){
			var div = Element.find(h3, 'nextSibling'); //element.find is located in prototype.lite
			if (window.location.href.indexOf(h3.title) > 0) {
				myAccordion.showThisHideOpen(div);
				found = true;
			}
		});
		if (!found) myAccordion.showThisHideOpen(stretchers[0]);
	}
	</script>
<?php if (is_single() and ('open' == $post-> comment_status) or ('comment' == $post-> comment_type) ) { ?>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/prototype.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/effects.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/ajax_comments.js"></script>
<?php } ?>
<?php wp_head(); ?>

</head>

<body>
<br />
<table border="0" align="center" cellpadding="1" cellspacing="1" class="main_table">
  <tr>
    <td colspan="2" bgcolor="#FFFFFF"><div id="sitetitle"><a href="<?php echo get_settings('home'); ?>/"><?php bloginfo('name'); ?></a></div>
