<?php include('header_archive.php'); ?>
		
		<div id="content_box">

			<div id="content">
		
				<?php if (have_posts()) : ?>
		
					<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
			
					<?php /* If this is a category archive */ if (is_category()) { ?>				
						<h2 class="archive_head">Entries Tagged as '<?php echo single_cat_title(); ?>'</h2>
					
					<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
						<h2 class="archive_head">Entries from <?php the_time('F Y'); ?></h2>
					
					<?php /* If this is a search */ } elseif (is_search()) { ?>
						<h2 class="archive_head">Search Results</h2>
		
				<?php } ?>

				<?php while (have_posts()) : the_post(); ?>
					<div class="post">
						<h4><?php the_time('l, F jS, Y') ?></h4>
						<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
						
						<div class="entry">
							<?php the_excerpt() ?>
						</div>
				
						<div class="post_meta">
							<p class="num_comments"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></p>
							<p class="tagged">Filed under <?php the_category(', ') ?></p>
						</div> 
					</div>
			
				<?php endwhile; ?>
				
				<div class="navigation">
					<p class="previous"><?php previous_posts_link('Previous Entries') ?></p>
					<p class="next"><?php next_posts_link('Next Entries') ?></p>
				</div>
	
				<?php else : ?>
			
					<h2 class="center">Not Found</h2>
					<?php include (TEMPLATEPATH . '/searchform.php'); ?>
			
				<?php endif; ?>
				
			</div>
		
			<?php get_sidebar(); ?>
			
		</div>
		
<?php get_footer(); ?>