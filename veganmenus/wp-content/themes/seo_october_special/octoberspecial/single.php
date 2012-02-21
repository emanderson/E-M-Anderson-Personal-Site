<?php get_header(); ?>
<div id="content_wrapper">
	<div id="content_inner" class="clearfix">
		<div class="content_left">
		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div class="post" id="post-<?php the_ID(); ?>">
				<div class="post_date">
				<?php the_time('M jS Y') ?><br />
				Tags: <?php the_category(', ') ?>
					<div class="extra_status">
					<?php edit_post_link('Edit this post', '', ''); ?>
					</div>
				</div>
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<div class="entry">
				<?php the_content('[...]'); ?>
				</div>			
				<div class="clear"></div>
			</div>
			<?php endwhile; ?>
			<?php else : ?>
			<h2>Nothing to see here</h2>
			<p>You seemed to have found a mislinked file, page, or search query with zero results. If you feel that you've reached this page in error, double check the URL and or search string and try again.</p>
			<p>Alternatively, a more personalized method of tracking down and searching for content can be found <a href="#bottom_box">below</a>.</p>
			<?php endif; ?>
		</div>
		<div class="content_right">
		<?php include (TEMPLATEPATH . '/main_right.php'); ?>
		</div>
	</div>
</div>
<div id="bottom_wrapper">
	<div id="bottom_inner" class="clearfix">
		<div class="bottom_left">
		<?php comments_template(); ?>
		</div>
		<?php include (TEMPLATEPATH . '/bottom_right.php'); ?>
		<div class="clear"></div>
		<div id="categories">
		<h3>Browse by Category</h3>
			<ul>
			<?php wp_list_cats('sort_column=name&optioncount=0'); ?>
			</ul>
		</div>
	</div>
</div>
<?php get_footer(); ?>