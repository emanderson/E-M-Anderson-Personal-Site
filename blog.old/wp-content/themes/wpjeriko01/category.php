<?php get_header(); ?>

		<div id="featured"><div>
			<div class="fsingle">
				<h1>Browsing the <?php $catname = get_the_category(); echo $catname[0]->cat_name; ?> category</h1>
			</div>
			<div class="clearfix"></div>
		</div></div>

		<div id="main">
			<div id="content">

<?php query_posts('posts_per_page=-1&cat='.$catname[0]->cat_ID); ?>
				<div class="entry">
					<p>Below is a list of every entry made in the <?php echo $catname[0]->cat_name; ?> category.</p>

						<ul id="archivelist">
<?php while(have_posts()) : the_post() ?>
							<li><span><?php the_time('d. M Y'); ?></span> <a href="<?php the_permalink(); ?>" title="Read <?php the_title(); ?>"><?php the_title(); ?></a></li>
<?php endwhile; ?>
						</ul>
				</div>

			</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
