<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">

	<title><?php wp_title(' '); ?> <?php if(wp_title(' ', false)) { echo '&#8211;'; } ?> <?php bloginfo('name'); ?></title>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats please -->

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/custom.css" type="text/css" media="screen" />
	<!--[if lte IE 6]>	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/library/ie6.css" /><![endif]-->
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

	<?php wp_head(); ?>
</head>
<body class="custom">
<?php 
global $options;
foreach ($options as $value) {
    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } 
      else { $$value['id'] = get_settings( $value['id'] ); } 
} ?>
<div id="page" class="hfeed <?php echo $pp_layout_setup; ?>">

	<div id="header">
		<div id="branding">
			<?php if (is_home()) { ?>
			<h1 class="homelink"><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>
			<?php } else { ?>	
			<div class="homelink"><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></div>
			<?php } ?>
			<p class="description"><?php bloginfo('description'); ?></p>
		</div>
		
		<div id="skip"><a title="Skip to content" href="#primary" accesskey="S">Skip to Content &darr;</a></div>
		
		<ul class="menu">
			<?php include (TEMPLATEPATH . '/main-menu.php'); ?>
		</ul>
	</div><!--#header-->
<div id="container">
	<div id="rotating">
		<?php include (TEMPLATEPATH . '/header-images.php'); ?>
	</div>