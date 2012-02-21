<?php get_header();?>	
	<div id="content">
		<?php if ($posts) { ?>
			<h3><?php echo single_cat_title(); ?></h3>			
			<br/>				
			<?php foreach ($posts as $post) : start_wp(); ?>				
				<div class="post">
					<?php require(TEMPLATEPATH. "/post.php");?>					
				</div>
			<?php endforeach; ?>
			<p align="center"><?php posts_nav_link() ?></p>		
		<?php } else { ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
		<?php } ?>
			
	</div>
<?php get_sidebar()?>	
<?php get_footer()?>