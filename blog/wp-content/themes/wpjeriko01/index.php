<?php get_header(); ?>

<?php if(have_posts()) : the_post() ?>
<?php $time = time() - strtotime($post->post_date);
$time = $time / 60 / 60 / 24;
if((int)$time < 1) { $time = ' class="star"'; } else { $time = ''; } ?>
			<div id="featured"><div <?php echo $time; ?>>
			<div class="fheader">
				<h1><a href="<?php the_permalink(); ?>" title="Read '<?php the_title(); ?>'"><?php the_title(); ?></a></h1>
				<p class="meta"><?php the_time('d. M Y'); ?> <img src="<?php bloginfo('stylesheet_directory'); ?>/_img/featured_comments.png" width="14" height="11" alt="Comments"/> <strong><a href="<?php the_permalink(); ?>#comments" title="Read the comments to <?php the_title(); ?>"><?php comments_number('0 comments','1 comment','% comments'); ?></a></strong></p>
				<?php edit_post_link('<img src="'.get_bloginfo(template_directory).'/_img/pencil.png" alt="Edit this post"/>','<p class="editlink">','</p>') ?>
			</div>
			<div class="fcontent">
				<?php if(function_exists(the_excerpt_reloaded)) {
					the_excerpt_reloaded(100,'<a>','excerpt',TRUE,' read more',FALSE,1,FALSE);
				} else {
					the_excerpt();
				} ?>
			</div>
			<div class="clearfix"></div>
		</div></div>
<?php endif; ?>

		<div id="main">
			<div id="content">

<?php while(have_posts()) : the_post() ?>
				<div class="entry">
					<h1><a href="<?php the_permalink(); ?>" title="Read '<?php the_title(); ?>'"><?php the_title(); ?></a></h1>
					<p class="meta"><?php the_time('d. M Y'); ?> <img src="<?php bloginfo('stylesheet_directory'); ?>/_img/content_comments.png" width="14" height="11" alt="Comments"/> <strong><a href="<?php the_permalink(); ?>#comments" title="Read the comments to <?php the_title(); ?>"><?php comments_number('0 comments','1 comment','% comments'); ?></a></strong> <?php edit_post_link('<img src="'.get_bloginfo(template_directory).'/_img/pencil.png" alt="Edit this post"/>'); ?></p>

					<?php if(function_exists(the_excerpt_reloaded)) {
						the_excerpt_reloaded(100,'<a><img>','excerpt',TRUE,'read more');
					} else {
						the_excerpt();
					} ?>
				</div>
<?php endwhile; ?>

				<div class="navigation">
					<div class="alignleft"><?php posts_nav_link('', '','&laquo; Older postings'); ?></div>
					<div class="alignright"><?php posts_nav_link('','Newer postings &raquo;',''); ?></div>
				</div>
				<div class="clearfix"></div>

<?php if(is_home() && function_exists(get_recent_comments)) : ?>
				<div class="entry" style="margin-top: 2em;">
					<h1>Recent comments</h1>

					<ul id="commentlist">
						<?php get_recent_comments(); ?>
					</ul>
				</div>
<?php endif; ?>

			</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
