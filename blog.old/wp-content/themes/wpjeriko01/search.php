<?php get_header(); ?>

		<div id="featured"><div>
			<div class="fsingle">
				<h1>Search results for '<?php echo $s; ?>'</h1>
			</div>
			<div class="clearfix"></div>
		</div></div>

		<div id="main">
			<div id="content">

				<div class="entry">
			<p>Below is a list of every entry that matches with the search term '<?php echo $s; ?>'</p> 

						<ul id="archivelist">
<?php while(have_posts()) : the_post() ?>
							<li><span><?php the_time('d. M Y'); ?></span> <a href="<?php the_permalink(); ?>" title="Read <?php the_title(); ?>"><?php the_title(); ?></a></li>
<?php endwhile; ?>
						</ul>
				</div>

			</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
