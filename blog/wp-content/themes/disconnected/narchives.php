<?php
/*
Template Name: Post Archives
*/
?>
	<?php get_header();?>	
	<div id="main">
	<div id="content">
<h2>Archives by Month:</h2>
  <ul>
    <?php wp_get_archives('type=monthly'); ?>
  </ul>

<h2><?php _e('Archives by Subject'); ?>:</h2>
  <ul>
     <?php wp_list_cats(); ?>
  </ul>
	</div>
	<div id="sidebar">
<h2><?php _e('Navigation'); ?></h2>
<ul>
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