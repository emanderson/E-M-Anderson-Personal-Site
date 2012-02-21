<?php /* Fusion/digitalnature */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-1.2.6.pack.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/fusion.js"></script>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<!--[if lte IE 6]>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/ie6.css"" type="text/css" media="screen" />
<![endif]-->

<!--[if IE 7]>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/ie7.css"" type="text/css" media="screen" />
<![endif]-->

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />


<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head(); ?>
</head>
<body>
  <!-- page wrappers (100% width) -->
  <div id="page-wrap1">
    <div id="page-wrap2">
      <!-- page (actual site content, custom width) -->
      <div id="page">

        <!-- main wrapper (big left column) -->
        <div id="main-wrap">
          <!-- main (container) -->
          <div id="main" class="with-sidebar">
            <!-- header -->
            <div id="header">

              <div id="topnav" class="description"> <?php bloginfo('description'); ?></div>
              <h1 id="title"><a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a></h1>


              <!-- top tab navigation -->
              <div id="tabs">
              <ul>
              <li class="<?php if (is_home()) { echo "current_page_item"; } ?>"><a href="<?php echo get_option('home'); ?>"><span><span>Homepage</span></span></a></li>
              <?php echo preg_replace('@\<li([^>]*)>\<a([^>]*)>(.*?)\<\/a>@i', '<li$1><a$2><span><span>$3</span></span></a>', wp_list_pages('echo=0&orderby=name&exlude=181&title_li=&depth=1')); ?>
               </ul>
              </div>
              <!-- /top tabs -->

            </div><!-- /header -->



