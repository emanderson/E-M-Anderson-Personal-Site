<?php get_header() ?>
	<div id="content">	
	<?php if ($posts) { ?>	
		<?php $post = $posts[0]; /* Hack. Set $post so that the_date() works. */ ?>
		<h3>Search Results for '<?php echo $s; ?>'</h3>			
		<div class="post-footer">Did you find what you wanted ?</div>		
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
		<div class="navigation">
			<div class="alignleft"><?php posts_nav_link('','','&laquo; Older Entries') ?></div>
			<div class="alignright"><?php posts_nav_link('','Newer Entries &raquo;','') ?></div>
		</div>	
	<?php } else { ?>
		<h2 class="center">Not Found</h2>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php } ?>		
	</div>
	<?php get_sidebar(); ?>
<?php get_footer(); ?>
</div>
</body>
</html>
