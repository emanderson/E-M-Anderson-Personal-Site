<?php include('header.php'); ?>

		<div id="content_box">
		
			<div id="content">
				
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
					<div class="navigation">
						<div class="previous"><?php previous_post_link('%link') ?></div>
						<div class="next"><?php next_post_link('%link') ?></div>
					</div>
				
					<div class="post" id="post-<?php the_ID(); ?>">
						<h4><?php the_time('l, F jS, Y') ?>...<?php the_time() ?></h4>
						<h2><?php the_title(); ?></h2>
				
						<div class="entry">
							<span class="jump"><a href="<?php the_permalink() ?>#comments">Jump to Comments</a></span>
							<?php the_content('<p>Read the rest of this entry &raquo;</p>'); ?>
				
							<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
				
							<div class="post_meta">
								<p class="num_comments"><?php comments_number('No Comments', '1 Comment', '% Comments'); ?></p>
								<p class="tagged">Filed under <?php the_category(', ') ?></p>
							</div>
						</div>
					</div>
					
					<?php comments_template(); ?>
				
				<?php endwhile; else: ?>
				
					<p>Sorry, no posts matched your criteria.</p>
				
				<?php endif; ?>
			
			</div>
			
			<?php get_sidebar(); ?>
			
		</div>

<?php get_footer(); ?>