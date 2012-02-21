<?php get_header(); ?>
<div id="content_wrapper">
	<div id="content_inner" class="clearfix">
		<div class="content_left">
			<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
				<div class="post" id="post-<?php the_ID(); ?>">
					<div class="post_date">
					</div>
					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<div class="entry">
					<?php the_content('[...]'); ?>
					</div>
				<div class="clear"></div>
				</div>
			<?php endwhile; ?>
			<?php else : ?>
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
			<div id="archived_posts">
				<?php query_posts('showposts=5'); ?>
				<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>
					<div class="archived_posts_date">
					<?php the_time('F jS Y') ?><br />
					Tags: <?php the_category(', ') ?><br /><br />
					<?php comments_popup_link('No Comments', 'One Comment', '% Comments'); ?>
					</div>
				<h3><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title() ?></a></h3>
					<div class="archived_entry">
					<?php the_content_rss('', FALSE, '', 50); ?>
					</div>
				<div class="clear"></div>
				<?php endwhile; ?>
				<?php else : ?>
				<?php endif; ?>
				<br />
			</div>
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