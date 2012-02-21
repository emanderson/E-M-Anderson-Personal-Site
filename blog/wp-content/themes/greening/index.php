<?php get_header(); ?>

	<div id="content">
		<div id="inner_content">

			<?php get_sidebar(); ?>

			<div id="text">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

				<div class="post" id="post-<?php the_ID(); ?>">
					<div class="post_header">
						<?php edit_post_link("[ edit ]","<span class='admin_edit_link'>","</span>"); ?>
						<a class="post_title" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a>
						<div class="post_date"><?php the_time('F jS, Y') ?> <?php the_time() ?><!-- by <?php the_author() ?> --></div>
					</div>
					<div class="post_content">
						<?php the_content('(more...)'); ?>
						<div class="visual_clear_2"></div>
					</div>
					<div class="post_footer">
						<div class="post_category">Posted in <?php the_category(', ') ?> by <a class="author_url" href="<?php the_author_url(); ?>" title="<?php the_author_description(); ?>"><?php the_author(); ?></a><br /><?php link_pages('Pages ', '', 'number'); ?></div>
						<div class="post_comments"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></div>
						<div class="visual_clear_2"></div>
					</div>
				</div>

		<?php endwhile; ?>

				<div class="navigation">
					<div class="alignleft"><?php next_posts_link('Previous Entries') ?></div>
					<div class="alignright"><?php previous_posts_link('Next Entries') ?></div>
					<div class="visual_clear_2"></div>
				</div>

	<?php else : ?>

				<div class="pagetitle">Sorry, but you are looking for something that isn't here.</div>

	<?php endif; ?>

			</div>
			<div class="visual_clear"></div>
		</div>
	</div>

<?php get_footer(); ?>