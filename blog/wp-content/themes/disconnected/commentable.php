<?php
/*
Template Name: Page w/ Comments
*/
?>
	<?php get_header();?>	
	<div id="main">
	<div id="content">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="page">
		<div class="page-info"><h2 class="page-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<?php /*Posted by <?php the_author(); ?>*/ ?><?php edit_post_link('(edit this)'); ?></div>

			<div class="page-content">
				<?php the_content(); ?>
				<?php comments_template(); // Get wp-comments.php template ?>
	
				<?php link_pages('<p><strong><?php _e('Pages'); ?>:</strong> ', '</p>', 'number'); ?>
	
			</div>
		</div>
	  <?php endwhile; endif; ?>
	</div>
	<div id="sidebar">
<h2><?php _e('Navigation'); ?></h2>
<ul>
<li><strong><?php _e('Search'); ?></strong></li>
<li>
			<form id="searchform" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<div style="text-align:left">
					<p><input type="text" name="s" id="s" size="14" />&nbsp;<input type="submit" name="submit" value="<?php _e('Go'); ?>" /></p>
				</div>
			</form></li>

<?php wp_list_pages('title_li=<strong>Pages</strong>' ); ?>
</ul>

<h2><?php _e('Elsewhere'); ?></h2>
<ul>

<?php if ((function_exists('related_posts')) &&  is_page()) { ?> 
	<li><strong>Related Entries</strong></li>
		
			<?php related_posts(10, 0, '<li>', '</li>', '', '', false, false); ?>
		
	
	<?php } ?>
	<?php if ((function_exists('blc_latest_comments'))) { ?> 
	<li><strong><?php _e('Comments'); ?></strong></li>
		
			<?php blc_latest_comments('5','3','false'); ?>
		
	
	<?php } ?>
<li><strong><?php _e('Latest'); ?></strong></li>
		
		
			<?php wp_get_archives('type=postbypost&limit=10'); ?>
	
</ul>
	</div>

<?php get_footer();?>
</div>
</div>
</body>
</html>