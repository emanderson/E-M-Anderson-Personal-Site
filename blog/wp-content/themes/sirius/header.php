<?php // Lokalisierung laden
load_theme_textdomain('sirius');
global $sirius;
if ($sirius->option['searchhilite'] == 'searchhilitean') {
include(dirname(__FILE__).'/spezial/search-hilite.php');
} ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<title><?php if ( is_home() ) { wp_title(''); } else { wp_title(''); ?> &laquo; <?php } bloginfo('name'); ?></title>
  <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

  <?php /* Meta Keywords */     if (function_exists('sirius_metakeywordsanzeige')) { sirius_metakeywordsanzeige();} ?>
  <?php /* Meta Description */  if (function_exists('sirius_metadescriptionanzeige')) { sirius_metadescriptionanzeige();} ?>

  <meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />

  <?php /* -- Schema -- */
   if (function_exists('sirius_farbschema')) { sirius_farbschema();} ?>

  <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <link rel="shortcut icon" href="<?php bloginfo('url'); ?>/favicon.ico" />	

  <?php /* -- Schema -- */
  if ($sirius->option['fancytooltips'] == 'fancytooltipsan') { ?>
	<script language="javascript" type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/spezial/fancytooltips.js"></script>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/spezial/fancytooltips.css" type="text/css" media="screen" />
  <?php } ?>

<?php global $user_identity; get_currentuserinfo(); if ($user_identity) { ?>
<style type="text/css">
  /* <![CDATA[ */

  #sirius-admin-bar {
  margin: 0;
  padding: 0;
  background: #555555;
  border-bottom: 1px solid #000000;
  text-align: left;
  width: 100%;
  }

  #sirius-admin-bar ul {
  margin: 0;
  padding: 4px;
  list-style-type: none;
  }

  #sirius-admin-bar ul li {
  list-style-type: none;
  display: inline;
  margin: 0 15px;
  padding: 0;
  font-size: 12px;
  color: #ffffff;
  }

  #sirius-admin-bar ul li.login { margin-right: 30px; }
  #sirius-admin-bar ul li.hallo { position: absolute; right: 1em; }
  #sirius-admin-bar a { color: #ffffff; text-decoration: none;}
  #sirius-admin-bar a:hover { color: #FF8C00; }

  /* ]]> */
</style>
<?php } ?>
<?php wp_head(); ?>
</head>
<body>


<?php global $user_identity,$user_level; get_currentuserinfo(); if ($user_identity) {
echo '<div id="sirius-admin-bar"><ul>';
echo "\n\t<li><a href='".get_settings('siteurl')."/wp-admin/'><strong>".__('Backend','sirius')." 	&#187;</strong></a></li>";
if ($user_level >= 1) {
echo '<li><a href="'.get_settings('siteurl').'/wp-admin/post.php">'.__('Write','sirius').'</a></li>';
}
if ($user_level >= 7) {
echo '<li><a href="'.get_settings('siteurl').'/wp-admin/link-manager.php">'.__('Links','sirius').'</a></li>';
}
echo "\n\t<li class=\"hallo\">".__('Howdy','sirius')." <strong>".$user_identity."</strong>, ["; wp_loginout(); echo ", <a href='".get_settings('siteurl')."/wp-admin/profile.php'>".__('Profile','sirius')."</a>]</li>";
echo "\n</ul></div>";
 } ?>



<div id="rap">

   <div id="headlinks">
    <?php // Header links -----
    if ($sirius->option['headerlinksanzeige'] == 'headerlinksanzeigean') {
   echo $sirius->option['headerlinks']; } else { echo '<br/>'; }?>

    </div>

  <div id="header">
   <div id="headertext">
        <h1><a href="<?php  bloginfo('home'); ?>" title="<?php  bloginfo('name'); ?>"><?php  bloginfo('name'); ?></a></h1>
        <small><?php bloginfo('description'); ?></small>
   </div>
 </div>


<div class="where">
			<?php /* If this is a 404 page */ if (is_404()) { ?>
			<?php /* If this is a category archive */ } elseif (is_category()) { ?>
      <p><?php echo __('You are currently browsing the archives for the category:','sirius'); ?> <?php single_cat_title(''); ?></p>
			
			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
			<p><?php echo __('You are currently browsing the archives for the day:','sirius'); ?> <?php the_time('l,'); ?> den <?php the_time('j. F Y'); ?>.</p>
			
			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<p><?php echo __('You are currently browsing the archives for the month:','sirius'); ?> <?php the_time('F Y'); ?>.</p>

			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<p><?php echo __('You are currently browsing the archives for the jear:','sirius'); ?> <?php the_time('Y'); ?>.</p>
			
			<?php /* more links to find */ } elseif (is_search()) { ?>
			<p><?php echo __('You have searched the archives for:','sirius'); ?> <strong>'<?php echo wp_specialchars($s); ?>'</strong>.</p>

			<?php /* If this is not a specified archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<p><?php echo __('You are currently browsing the archives.','sirius'); ?></p>

			<?php } ?>
</div>
