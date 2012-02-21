<div id="archived_posts">
<?php query_posts('showposts=5'); ?>
<?php while(have_posts()) : the_post(); if(!($first_post == $post->ID)) : ?>
	<div class="archived_posts_date">
	<?php the_time('F jS Y') ?><br />
	Tags: <?php the_category(', ') ?>
	<?php comments_popup_link('No Comments', 'One Comment', '% Comments'); ?>
	</div>
	<h3><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title() ?></a></h3>
		<div class="archived_entry">
		<?php the_content_rss('', TRUE, '', 50); ?>
		</div>
	<div class="clear"></div>
<?php endif; endwhile; ?>
</div>