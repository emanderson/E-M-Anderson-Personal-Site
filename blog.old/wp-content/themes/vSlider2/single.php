<!-- 
This is the single post template.
This shows only one post, with full details and its comments
-->

<?php get_header(); ?>

	<div id="content">
				
  	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<!-- Navigation -->
		<div class="navigation">
			<div class="alignleft"><?php previous_post('&laquo; %','','yes') ?></div>
			<div class="alignright"><?php next_post(' % &raquo;','','yes') ?></div>
		</div>
		
		<!-- Include the post block -->
		<?php include (TEMPLATEPATH . '/post.php'); ?>
		

		
		<?php comments_template(); ?>
	
	<?php endwhile; else: ?>
	
		<!-- Include the notfound block -->
		<?php include (TEMPLATEPATH . '/notfound.php'); ?>	
	
<?php endif; ?>
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>