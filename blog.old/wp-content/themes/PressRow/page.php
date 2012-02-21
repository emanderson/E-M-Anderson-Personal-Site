<?php include('header_about.php'); ?>

		<div id="content_box">
		
			<div id="content">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div class="post" id="post-<?php the_ID(); ?>">
						<h2 style="padding-top: 0;"><?php the_title(); ?></h2>
						<div class="entry">
							<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
				
							<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
						</div>
					</div>
				<?php endwhile; endif; ?>

			</div>

			<?php get_sidebar(); ?>

		</div>

<?php get_footer(); ?>