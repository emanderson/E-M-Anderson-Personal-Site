<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head profile="http://gmpg.org/xfn/11">

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

	<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>
	
	<link rel="shortcut icon" href="<?php bloginfo('url'); ?>/favicon.ico" type="image/x-icon"></link>
	<link rel="icon" href="<?php bloginfo('url'); ?>/favicon.ico" /></link>
	
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
	<meta name="description" content="<?php bloginfo('description'); ?>" />

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<!-- Script for sliding posts -->
	<script src="<?php bloginfo('template_directory'); ?>/js/vSlider.js" type="text/javascript"></script>
		
	<!-- Script for fixing PNGs in IE -->
	<!--[if gte IE 5.5000]>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/pngfix.js"></script>
	<![endif]-->		
	
	<!-- Script for random headers -->
	<?php require "randomHeader.php"; ?>
	
	<!-- Used to check if this page is being wrapped by WPG2 -->
	<?php global $g2_wp_init; ?>
	
	<!-- Test if KBurnalizer is active and if the page is not being wrapped by WPG2 -->
	<?php if(get_option('vSlider_kb_enabled') && !$g2_wp_init) {
		$vSlider_kb_duration = get_option('vSlider_kb_duration');
		$vSlider_kb_transition = get_option('vSlider_kb_transition');
	  ?> 
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/kburnalizer/KBurnalizer.css" type="text/css"/>
		<script src="<?php bloginfo('template_directory'); ?>/kburnalizer/KBurnalizer.js" type="text/javascript"></script>
		<script type="text/javascript">
				// We use fixed areas - we don't want panning and zooming on the headers
				var startImageArea = new FocusArea(0, 0, 762, 200);
				var endImageArea = new FocusArea(0, 0, 762, 200);
				
				var kbHeader = new KBurnalizer('kbHeader','header_view_port',false, 762, 200,'#fff',<?php echo $vSlider_kb_duration ?>*1000,<?php echo $vSlider_kb_transition ?>*1000);
				
				// Add random headers
				<?php $randomHeader = choose_header(true) ?>
				<?php for($i = 0; $i<get_option('vSlider_kb_nheaders'); $i++) { ?>
					kbHeader.addSlide('<?php echo bloginfo('template_directory') . $randomHeader ?>','',762,200,startImageArea,endImageArea);
				<?php 
					// Simple test to *try* to avoid repeated sequential headers 
					$tempHeader = choose_header(true);
					if($tempHeader == $randomHeader) {$tempHeader = choose_header(true);}
					$randomHeader = $tempHeader;
				} ?>
		</script>
	<?php } ?>
	

	<!-- Gallery2 -->
	<?php if(function_exists('g2_imageframes')) { g2_imageframes(); }?>

	<?php wp_get_archives('type=monthly&format=link'); ?>

	<?php wp_head(); ?>
</head>
<body>

	<!-- Test if KBurnalizer is active and if the page is not being wrapped by WPG2 -->
	<?php if(get_option('vSlider_kb_enabled') && !$g2_wp_init) : ?>

		<div id="headerimg">			
				<div class="kb-viewport" id="header_view_port"></div>	
	
	<!-- Otherwise, use the plain old header -->
	<?php else : ?>

		<div id="headerimg" style="background:url('<?php bloginfo('template_directory'); ?>/<?php choose_header(false) ?>') no-repeat center">
			<a href="<?php echo get_settings('home'); ?>">
				<img src="<?php bloginfo('template_directory'); ?>/images/empty.gif" width="100%" height="100%" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>"/>
			</a>						
		
	<?php endif ?>
	
		<!-- This block is used to preload background dynamic images -->
		<div class="invisible">
			<div class="post-top-closed">&nbsp;</div>
			<div class="post-title-top-closed">&nbsp;</div>
			<div class="post-title-bottom-closed">&nbsp;</div>
			<div class="post-title-closed">&nbsp;</div>
			<div class="post-title-filler-closed">&nbsp;</div>
			<div class="post-slider-closed">&nbsp;</div>
			<div class="post-body-top-closed">&nbsp;</div>
		</div>
	</div>
	
	
	<div id="topbar">	
	<div class="nav">
		<ul>
 			<li id="homepage"><a href="<?php echo get_settings('home'); ?>"><?php echo get_option('vSlider_text_home') ?></a></li>
			
			<!-- Test if Gallery plugin (WPG2) is active -->
			<?php if(function_exists('g2_addwpmenus')) { 
				$g2_option = get_settings('g2_options'); 
			?>
				<li class="page_item"><a href="/<?php echo $g2_option['g2_embed']; ?>"><?php echo get_option('vSlider_text_photos') ?></a></li>
			<?php } ?>
			
			<?php wp_list_pages('sort_column=menu_order&depth=1&title_li='); ?>
		</ul>
	</div>
	</div>
	
<table id="page">
	<tr>
		<td id="page-top"></td>
	</tr>
	<tr>
		<td id="page-body">
