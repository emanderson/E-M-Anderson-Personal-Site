<?php get_header(); ?>

	<div id="content">

		<div id="left_side">&nbsp;</div>
		<div id="right_side">&nbsp;</div>
		<div id="inner_content">
			<?php get_sidebar(); ?>
			<div id="text">

		<?php if (have_posts()) : ?>

		 <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
<?php /* If this is a category archive */ if (is_category()) { ?>				
		<div class="pagetitle">Archive for the '<?php echo single_cat_title(); ?>' Category</div>
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<div class="pagetitle">Archive for <?php the_time('F jS, Y'); ?></div>
		
	 <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<div class="pagetitle">Archive for <?php the_time('F, Y'); ?></div>

		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<div class="pagetitle">Archive for <?php the_time('Y'); ?></div>
		
	  <?php /* If this is a search */ } elseif (is_search()) { ?>
		<div class="pagetitle">Search Results</div>
		
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<div class="pagetitle">Author Archive</div>

		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<div class="pagetitle">Blog Archives</div>

		<?php } ?>

		<?php while (have_posts()) : the_post(); ?>

			<div class="post" id="post-<?php the_ID(); ?>">
				<div class="post_header">
					<?php edit_post_link("[ edit ]","<span class='admin_edit_link'>","</span>"); ?>
					<a class="post_title" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a>
					<div class="post_date"><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></div>
				</div>
				<div class="post_content">
					<?php the_content('(more...)'); ?>
				</div>
				<div class="post_footer">
					<div class="post_category">Posted in <?php the_category(', ') ?> by <a class="author_url" href="<?php the_author_url(); ?>" title="<?php the_author_description(); ?>"><?php the_author(); ?></a><br /><?php link_pages('Pages ', '', 'number'); ?></div>
					<div class="post_comments"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></div>
				</div>
			</div>
	
		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries') ?></div>
		</div>
			
	<?php else : ?>

		<div class="pagetitle">Not Found</div>

	<?php endif; ?>
		
			</div>
			<div class="visual_clear"></div>
		</div>
	</div>

<?php get_footer(); ?>