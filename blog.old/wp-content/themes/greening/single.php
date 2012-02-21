<?php get_header(); ?>

	<div id="content">
		<div id="inner_content">
			<?php get_sidebar(); ?>
			<div id="text">
				
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div class="post" id="post-<?php the_ID(); ?>">
					<div class="post_header">
						<?php edit_post_link("[ edit ]","<span class='admin_edit_link'>","</span>"); ?>
						<a class="post_title" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a>
						<div class="post_date"><?php the_time('F jS, Y') ?> <?php the_time() ?><!-- by <?php the_author() ?> --></div>
					</div>
					<div class="post_content">
						<?php the_content('Read the rest of this entry &raquo;'); ?>
						<div class="visual_clear_2"></div>
					</div>
					<div class="post_footer">
						<div class="post_category">Posted in <?php the_category(', ') ?> by <a class="author_url" href="<?php the_author_url(); ?>" title="<?php the_author_description(); ?>"><?php the_author(); ?></a><br /><?php link_pages('Pages ', '', 'number'); ?></div>
						<div class="post_comments"><?php comments_rss_link('RSS 2.0'); ?></div>
						<div class="visual_clear_2"></div>
					</div>
				</div>
		
	<?php comments_template(); ?>
	
	<?php endwhile; else: ?>
	
		<div class="pagetitle">Sorry, no posts matched your criteria.</div>
	
<?php endif; ?>

			</div>
			<div class="visual_clear"></div>
		</div>
	</div>

<?php get_footer(); ?>
