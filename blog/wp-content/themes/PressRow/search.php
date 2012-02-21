<?php include('header.php'); ?>

		<div id="content_box">
		
			<div id="content">

				<?php if (have_posts()) : ?>
			
					<h2 class="archive_head">Search Results</h2>
			
					<?php while (have_posts()) : the_post(); ?>
							
						<div class="post">
							<h4><?php the_time('l, F jS, Y') ?></h4>
							<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
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
			
					<h2 style="text-align: center; margin-bottom: 15px;">No posts found. Try a different search?</h2>
					<?php include (TEMPLATEPATH . '/searchform.php'); ?>
			
				<?php endif; ?>
				
			</div>

			<?php get_sidebar(); ?>

		</div>

<?php get_footer(); ?>