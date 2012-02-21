<?php get_header(); ?>

		<div id="featured"><div>
			<div class="fsingle"><h1>Ooops!</h1></div>
		</div></div>

		<div id="main">
			<div id="content">
				<div class="entry">
					<p>We're sorry, but the page you've requested doesn't exist. But maybe you're interested in some other articles?</p>

					<h2>10 recent posts</h2>

<?php $my_query = new WP_query('showposts=10'); ?>
					<ul id="archivelist">
				<?php if($my_query->have_posts()) : while($my_query->have_posts()) : $my_query->the_post() ?><li><span><?php the_time('d. M Y'); ?></span> <a href="<?php the_permalink(); ?>" title="Read '<?php the_title(); ?>'"><?php the_title(); ?></a></li>
<?php endwhile; endif; ?>
				</div>

			</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
