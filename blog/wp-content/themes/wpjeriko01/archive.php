<?php get_header(); ?>

		<div id="featured"><div>
			<div class="fsingle">
				<h1>Browsing <?php single_month_title(' '); ?></h1>
			</div>
			<div class="clearfix"></div>
		</div></div>

		<div id="main">
			<div id="content">

<?php $amonth = substr($m,4); ?>
<?php $ayear = substr($m,0,4); ?>
<?php query_posts('posts_per_page=-1&monthnum='.$amonth.'&year'.$ayear); ?>
				<div class="entry">
			<p>Below is a list of every entry made in <?php single_month_title(' '); ?> 

						<ul id="archivelist">
<?php while(have_posts()) : the_post() ?>
							<li><span><?php the_time('d. M Y'); ?></span> <a href="<?php the_permalink(); ?>" title="Read <?php the_title(); ?>"><?php the_title(); ?></a></li>
<?php endwhile; ?>
						</ul>
				</div>

			</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
