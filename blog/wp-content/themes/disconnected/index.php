	<?php get_header(); ?>
	<div id="main">
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
<h2><?php _e('Inward'); ?></h2> 
		<?php get_sidebar(); ?>

		<h2><?php _e('Outward'); ?></h2>
		<ul>
		<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar(outward) ) : ?>
<?php if ((function_exists('get_flickrRSS')) && is_home() && !(is_paged())) { ?>
<li><strong>Flickr</strong></li> 
	<div class="sb-flickr">
		<div>
			<?php get_flickrRSS(); ?>
		</div>
	</div>
	<?php } ?>
                  <?php
                   $link_cats = $wpdb->get_results("SELECT cat_id, cat_name FROM $wpdb->linkcategories");
 foreach ($link_cats as $link_cat) {
 ?>
                  <li><div id="linkcat-<?php echo $link_cat->cat_id; ?>"><strong><?php echo $link_cat->cat_name; ?></strong></div></li>
                
    <?php wp_get_links($link_cat->cat_id); ?>
   
  
 <?php } ?>


	<?php endif; ?>
	</ul>


	</div>
	
<?php get_footer(); ?>
</div>
</div>
</body>
</html>
