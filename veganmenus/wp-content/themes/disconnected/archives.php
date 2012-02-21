<?php
/*
Template Name: Post Archives
*/
?>
	<?php get_header();?>	
	<div id="main">
    <div id="content">
      <div class="column left">
        <h2>
          <?php _e('Archives by Month'); ?>:
        </h2>
        <ul>
          <?php wp_get_archives('type=monthly'); ?>
        </ul>
      </div>
      <div class="column right">
        <h2>
          <?php _e('Archives by Subject'); ?>:
        </h2>
        <ul>
          <?php wp_list_cats(); ?>
        </ul>
      </div>
      <div class="clear">
      	<h2><?php _e('Tags'); ?></h2>
      	<?php if (function_exists(wp_tag_cloud)) { wp_tag_cloud('smallest=0.8&largest=1.5&unit=em&format=flat&orderby=count&number=50&order=DESC'); } ?>
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