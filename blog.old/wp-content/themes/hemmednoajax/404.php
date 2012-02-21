<?php 
get_header();
?>


<div id="searchresult">

		<h2>Page not found!</h2>
			<p>The page you were looking for was not found. If you were looking for something specifically, try using the search form above or browse the archives.</p>
			
			<h2>Archives by month:</h2>
			<ul>
				<?php wp_get_archives('type=monthly'); ?>
			</ul>
<br />
			<h2>Archives by subject:</h2>
			<ul>
				<?php wp_list_cats('hierarchical=0'); ?>
			</ul>

</div>

<div id="infomenu">
	<h2>Uh oh! The dreaded 404...</h2>
	<p>What happened? If you're seeing this page by following a link, please notifiy someone to update their links. If you typed in the address, check the address again.</p>

</div>

</div> <!-- closes container -->

<?php include(TEMPLATEPATH . '/bottombar.php') ?>

<?php get_footer(); ?>
