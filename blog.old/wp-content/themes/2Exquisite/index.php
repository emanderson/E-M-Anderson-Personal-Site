<?php
/* Don't remove this line. */
require('./wp-blog-header.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head profile="http://gmpg.org/xfn/1">
	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo('charset'); ?>" />
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats please -->
	<style type="text/css" media="screen">
		@import url( <?php bloginfo('stylesheet_url'); ?> );
<?php mytheme_sidebar();?>
	</style>
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<?php include_once(dirname(__FILE__) . '/functions.php'); ?>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php wp_get_archives('type=monthly&format=link'); ?>
	<?php //comments_popup_script(); // off by default ?>
	<?php wp_head(); ?>


</head>

<body>
<div id="rap">
	<?php get_header(); ?>
	<div id="content">
			<?php if ($posts) : foreach ($posts as $post) : start_wp(); ?>
			<div class="post">
				<?php require('post.php'); ?>
				<?php comments_template(); // Get wp-comments.php template ?>
			</div>
			<?php endforeach; else: ?>
			<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
			<?php endif; ?>
		<p align="center"><?php posts_nav_link() ?></p>		
	</div>
	<div id="sidebar">

<h2><?php _e('About the Site:'); ?></h2>
		<ul><li id="about"><?php bloginfo('description'); ?></li></ul>

     <?php if (function_exists('wp_theme_switcher')) { ?>
     <h2>Themes:</h2>
       <?php wp_theme_switcher('dropdown'); ?>
         <?php } ?>

		<h2><?php _e('About Me:'); ?></h2>
		<ul><li><?php mytheme_about() ?></li></ul>
		<h2><?php _e('Categories:'); ?></h2>
		<ul>
			<?php list_cats(0, '', 'name', 'ASC', '/', true, 0, 1);    ?>
		</ul>
		<h2><label for="s"><?php _e('Search:'); ?></label></h2>
		<ul>
			<li>
			<form id="searchform" method="get" action="<?php echo $PHP_SELF; ?>">
				<div>
					<input type="text" name="s" id="s" size="15" /><br />
					<input type="submit" name="submit" value="<?php _e('Search'); ?>" />
				</div>
				</form>
			</li>
		</ul>
		

		<h2><?php _e('Archives:'); ?></h2>
		<ul>
			<?php wp_get_archives('type=monthly&show_post_count=true'); ?>
		</ul>
		<h2><?php _e('Meta:'); ?></h2>
		<ul>
		<li><?php wp_register(); ?></li>
		<li><?php wp_loginout(); ?></li>
		<li><a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS'); ?>"><?php _e('<abbr title="Really Simple Syndication">RSS</abbr>'); ?></a></li>
		<li><a href="<?php bloginfo('comments_rss2_url'); ?>" title="<?php _e('The latest comments to all posts in RSS'); ?>"><?php _e('Comments <abbr title="Really Simple Syndication">RSS</abbr>'); ?></a></li>
		<li><a href="http://validator.w3.org/check/referer" title="<?php _e('This page validates as XHTML 1.0 Transitional'); ?>"><?php _e('Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr>'); ?></a></li>
		<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
		<li><a href="http://wordpress.org/" title="<?php _e('Powered by WordPress, state-of-the-art semantic personal publishing platform.'); ?>"><abbr title="WordPress">WP</abbr></a></li>
		<?php wp_meta(); ?>
		</ul>
	</div>

<?php get_footer(); ?>
</div>

</body>
</html>