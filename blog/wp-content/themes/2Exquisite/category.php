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
	</style>
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php wp_get_archives('type=monthly&format=link'); ?>
	<?php //comments_popup_script(); // off by default ?>
	<?php wp_head(); ?>

</head>

<body>
<div id="rap">
	<?php get_header();?>	
	<div id="content">
		<?php if ($posts) { ?>
			<h3><?php echo single_cat_title(); ?></h3>
			<div class="post-info">Archived Posts from this Category</div>		
			<br/>				
			<?php foreach ($posts as $post) : start_wp(); ?>				
				<div class="post">
					<?php require('post.php'); ?>
					<?php comments_template(); // Get wp-comments.php template ?>
				</div>
			<?php endforeach; ?>
			<p align="center"><?php posts_nav_link() ?></p>		
		<?php } else { ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
		<?php } ?>
			
	</div>
	<div id="sidebar">
		
	<h2>Monthly Archives</h2>
		<ul><?php wp_get_archives(); ?></ul>
	<h2>Categories</h2>
		<ul><?php wp_list_cats(); ?></ul>
		<h2><label for="s"><?php _e('Search:'); ?></label></h2>
		<ul>
			<li>
			<form id="searchform" method="get" action="<?php echo $PHP_SELF; ?>">
				<div>
					<input type="text" name="s" id="s" size="10" />
					<input type="submit" name="submit" value="<?php _e('Search'); ?>" />
				</div>
				</form>
			</li>
		</ul>		
	</div>
<?php get_footer()?>
</div>

</body>
</html>