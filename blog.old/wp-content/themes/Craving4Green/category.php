<?php get_header(); ?>
<div id="main">
		<div id="content">
			<div class="post">
				<h2 class="post-title"><?php echo single_cat_title(); ?></h3>
				<p class="day-date">Archived Posts from this Category</p>
			</div>
			<?php if ($posts) : foreach ($posts as $post) : start_wp(); ?>
			<div class="post">
				<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<p class="day-date">Posted by <em><?php the_author_posts_link() ?></em> on <em><?php the_time('d M Y'); ?></em> | Tagged as: <em><?php the_category(', ') ?></em> <?php edit_post_link(); ?></p>
				<div class="post-content"><?php the_content('Continue Reading &#187;'); ?>
				<p class="post-info">
					<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
				</p>
				<!--
				<?php trackback_rdf(); ?>
				-->
			</div>
			<?php comments_template(); ?>
		</div>
			<?php endforeach; else: ?>
			<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
			<?php  endif; ?>
		<p align="center"><?php posts_nav_link() ?></p>
	</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>