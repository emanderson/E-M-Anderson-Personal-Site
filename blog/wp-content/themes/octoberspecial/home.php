<?php get_header(); ?>
<div id="content_wrapper">
	<div id="content_inner" class="clearfix">
		<div class="content_left">
		<?php $top_query = new WP_Query('showposts=1'); ?>
		<?php while($top_query->have_posts()) : $top_query->the_post(); $first_post = $post->ID; ?>
			<div class="post" id="post-<?php the_ID(); ?>">
				<div class="post_date">
				<?php the_time('M jS Y') ?><br />
				Tags: <?php the_category(', ') ?>
					<div class="extra_status">
					<?php comments_popup_link('No Comments', 'One Comment', '% Comments'); ?>
					</div>
				</div>
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<div class="entry">
					<?php the_content('[...]'); ?>
					</div>
					<div class="clear"></div>
			</div>
		<?php endwhile; ?>
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
				<?php query_posts('showposts=6'); ?>
				<?php while(have_posts()) : the_post(); if(!($first_post == $post->ID)) : ?>
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
				<?php endif; endwhile; ?>
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