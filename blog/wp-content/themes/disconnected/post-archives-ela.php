<?php
/*
Template Name: Post Archives ELA
*/
?>
<?php require('wp-config.php'); $single = 1; $siteurl = get_settings('siteurl'); ?>

<?php get_header();?>	
	<div id="main">
	<div id="content">

    <?php if (have_posts()) { while (have_posts()) { the_post(); ?>

		<div class="page">

			
		<div class="page-info">
				<h2 class="page-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<?php edit_post_link('(edit this)'); ?>
			</div>
		
			<div class="itemtext">

<p><?php _e('This is the front page of the'); ?> <?php bloginfo('name'); ?> <?php _e('archives. Through here, you will be able to move down into the archives by way of time or category. If you are looking for something specific, perhaps you should try the searching from the home page'); ?>.</p><br />
			<?php af_ela_super_archive('num_entries=1&num_comments=1&number_text=<span>%</span>&comment_text=<span>%</span>&closed_comment_text=<span>-</span>&selected_text='.urlencode('')); ?>



			<br /><div style='clear: both;'>&nbsp;</div>
							
		</div>

		<?php } ?>
		<?php /* If there is nothing to loop */  } else { $notfound = '1'; /* So we can tell the sidebar what to do */ ?>
		
			<div class="center">
				<h2>Not Found</h2>
			</div>
		
			<div class="item">
			<div class="itemtext">
				<p><?php _e('Oh no! You're looking for something which just isn't here! Fear not however,
				errors are to be expected, and luckily there are tools on the sidebar for you to
				use in your search for what you need'); ?>.</p>
			</div>
			</div>

		<?php /* End Loop Init */ } ?>



</div>


	</div>
	<div id="sidebar">
<h2>Navigation</h2>
<ul>
<li><strong>Search</strong></li>
<li>
			<form id="searchform" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<div style="text-align:left">
					<p><input type="text" name="s" id="s" size="14" />&nbsp;<input type="submit" name="submit" value="<?php _e('Go'); ?>" /></p>
				</div>
			</form></li>

<li><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>">Main Page</a></li>
<?php wp_list_pages('title_li=<strong>Pages</strong>' ); ?>
</ul>

	</div>

<?php get_footer();?>
</div>
</div>
</body>
</html>	