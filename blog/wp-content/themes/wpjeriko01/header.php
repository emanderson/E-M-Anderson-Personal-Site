<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<title><?php if(is_single()) { wp_title(''); ?> // <? } bloginfo('name'); ?></title>

		<link rel="stylesheet" media="screen" href="<?php bloginfo('stylesheet_url'); ?>" />
		<link rel="stylesheet" media="screen" href="<?php bloginfo('stylesheet_directory'); ?>/colors.css"/>
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
		<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
		<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
		<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />

		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
		<meta name="description" content="<?php bloginfo('description'); ?>"/>

		<?php wp_head(); ?>
<?php global $user_identity; get_currentuserinfo(); if ($user_identity) { ?>
<style type="text/css">
  /* <![CDATA[ */
 
  #abstrakt-admin-bar {
  margin: 0;
  padding: 0;
  background: #B9D6FD;
  border-bottom: 1px solid #000000;
  text-align: left;
  width: 100%;
  }
 
  #abstrakt-admin-bar ul {
  margin: 0;
  padding: 4px;
  list-style-type: none;
  }
 
  #abstrakt-admin-bar ul li {
  list-style-type: none;
  display: inline;
  margin: 0 10px;
  padding: 0;
  font-size: 1.1em;
  color: #000;
  }
 
  #abstrakt-admin-bar ul li.login { margin-right: 30px; }
  #abstrakt-admin-bar ul li.howdy { position: absolute; right: 1em; }
  #abstrakt-admin-bar a { color: #000; text-decoration: none;}
  #abstrakt-admin-bar a:hover { color: #FFF; }
 
  /* ]]> */
</style>
<?php } ?>

	</head>

<body>
<?php global $user_identity,$user_level; get_currentuserinfo(); if ($user_identity) {
echo '<div id="abstrakt-admin-bar"><ul>';
echo "\n\t<li><a href='".get_settings('siteurl')."/wp-admin/'><strong>".__('Dashboard','abstrakt')."   &#187;</strong></a></li>";
if ($user_level >= 1) {
echo '<li><a href="'.get_settings('siteurl').'/wp-admin/post.php">'.__('New Post','abstrakt').'</a></li>';
echo '<li><a href="'.get_settings('siteurl').'/wp-admin/page-new.php">'.__('New Page','abstrakt').'</a></li>';
}
echo "\n\t<li class=\"howdy\">".__('Logged in as ','abstrakt')." <strong>"."<a href='".get_settings('siteurl')."/wp-admin/profile.php'>".$user_identity."</a></strong>, ["; wp_loginout(); echo "]</li>";
echo "\n</ul></div>";
} ?>


	<div id="wrap">

		<div id="header"><h1 onclick="location.href='<?php bloginfo('home'); ?>'"><?php bloginfo('name'); ?></h1><h2><?php bloginfo('description'); ?></h2></div>

