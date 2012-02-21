	<?php get_header();?>	
	<div id="content">
		<?php if ($posts) { ?>
			<h3><?php echo single_cat_title(); ?></h3>
			<div class="post-footer">Category Archive</div>		
			<br/>				
			<?php foreach ($posts as $post) : start_wp(); ?>				
				<div class="post">
					<div class="post-title"><em><?php the_category(' and ');?></em><?php the_time('d M Y h:i a'); ?></div>
					<p class="post-info"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a> <?php edit_post_link('(edit this)'); ?></p>
					<div class="post-content">
						<?php the_content('<br/>Continue Reading &#187;'); ?>
						<p class="post-info">
							<?php wp_link_pages(); ?>											
						</p>
						<!--
							<?php trackback_rdf(); ?>
						-->
					</div>
					<div class="post-footer"><?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;','','<span>Comments Off</span>'); ?></div>
					<?php comments_template(); // Get wp-comments.php template ?>
				</div>
			<?php endforeach; ?>
			<p align="center"><?php posts_nav_link() ?></p>		
		<?php } else { ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
		<?php } ?>			
	</div>
	<?php get_sidebar(); ?>	
<?php get_footer()?>