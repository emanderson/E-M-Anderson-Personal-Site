<?php get_header(); ?>

		<div id="featured"><div>
<?php if(have_posts()) : the_post() ?>
			<div class="fsingle"><h1><?php the_title(); ?></h1></div>
		</div></div>

		<div id="main">
			<div id="content">
				<div class="entry">
					<?php the_content(); ?>
				</div>
<?php endif; ?>

<?php comments_template(); ?>
			</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
