<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><? bloginfo('name'); ?> <? wp_title(); ?></title>

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url') ?>/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url') ?>/print.css" media="print" />
<link rel="start" href="<?php bloginfo('url') ?>" title="Home" />

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="icon" type="image/x-icon" href="<?php bloginfo('template_url') ?>/favicon.ico" />
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>

</head>
<body <?php if (is_home()) { ?>id="home"<?php } else { ?>id="interior" class="<?php echo $post->post_name; ?>"<?php } ?>>

  <div id="container">
		<div id="header">
			<h1><a href="<?php bloginfo('url') ?>"><? bloginfo('name'); ?> // <? bloginfo('description'); ?></a></h1>
		</div>
		<div id="header-page"><a href="<?php bloginfo('rss2_url'); ?>"><img alt="RSS Feed" src="http://s.wordpress.org/style/images/feedicon10.png" /></a></div>