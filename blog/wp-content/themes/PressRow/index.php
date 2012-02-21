<?php include('header.php'); ?>

		<div id="content_box">
		
			<div id="content">
			
				<?php query_posts('showposts=3'); //displays X number of posts on the page ?>

				<?php if (have_posts()) : ?>
					
					<?php while (have_posts()) : the_post(); ?>
							
						<div class="post" id="post-<?php the_ID(); ?>">
							<h4><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></h4>
							<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
							
							<div class="entry">
								<?php the_content('Keep reading &rarr;'); ?>
							</div>
							
							<div class="post_meta">
								<p class="num_comments"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></p>
								<p class="tagged">Filed under <?php the_category(', ') ?></p>
							</div>
						</div>
				
					<?php endwhile; ?>
					
				<?php else : ?>
			
					<h2 class="center">Not Found</h2>
					<p class="center">Sorry, but you are looking for something that isn't here.</p>
					<?php include (TEMPLATEPATH . "/searchform.php"); ?>
			
				<?php endif; ?>
			</div>

			<?php get_sidebar(); ?>
		
		</div>

<?php get_footer(); ?>