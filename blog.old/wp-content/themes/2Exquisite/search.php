<?php /* Don't remove this line. */ require('./wp-blog-header.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head profile="http://gmpg.org/xfn/1">
	<title><?php bloginfo('name'); ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo('charset'); ?>" />
	<!-- leave this for stats -->
	<style type="text/css" media="screen">
		@import url( <?php bloginfo('stylesheet_url'); ?> );
	</style>
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php //comments_popup_script(); // off by default ?>
	<?php wp_head(); ?>

</head>
<body>
<div id="rap">
<?php get_header() ?>
	<div id="content" class="narrowcolumn">
	<?php if ($posts) { ?>
		<?php $post = $posts[0]; /* Hack. Set $post so that the_date() works. */ ?>
		<h3>Search Results for '<?php echo $s; ?>'</h3>
		<div class="post-info">Did you find what you wanted ?</div>
		<br/>
		<?php foreach ($posts as $post) : start_wp(); ?>
			<?php require('post.php'); ?>
		<?php endforeach; ?>
		<div class="navigation">
			<div class="alignleft"><?php posts_nav_link('','','&laquo; Older Entries') ?></div>
			<div class="alignright"><?php posts_nav_link('','Newer Entries &raquo;','') ?></div>
		</div>
	<?php } else { ?>
		<h2 class="center">Not Found</h2>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php } ?>
	</div>
	<div id="sidebar">
		<h2>Currently Browsing</h2><ul><li><p>You have searched the archives
			for <strong>'<?php echo $s; ?>'</strong>. If you are unable to find anything in these search results, you can try one of these links.</p></li></ul>
		<h2>Archives by Month</h2>
		<ul><?php wp_get_archives('type=monthly'); ?></ul>
		<h2>Archives by Category</h2>
		<ul><?php wp_list_cats(); ?></ul>
		<h2><?php _e('Search:'); ?></h2>
		<ul><li>
		<form id="searchform" method="get" action="<?php echo $PHP_SELF; ?>">
			<input type="text" name="s" id="s" size="15" /><br />
			<input type="submit" name="submit" value="<?php _e('Search'); ?>" />
		</form>
		</li></ul>
	</div>
<?php get_footer(); ?>
</div>
</body>
</html>
