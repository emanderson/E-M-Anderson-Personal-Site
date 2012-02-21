<?php
/*
Template Name: Archives
*/
?>
<?php get_header(); ?>
<div id="main">
		<div id="content">			
			<div class="post">
				<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<p class="day-date"><?php edit_post_link(); ?></p>
				<div class="post-content">
				<h2><?php _e('by Categories'); ?></h2>
					<ul>
						<?php list_cats(0, '', 'name', 'ASC', '/', true, 0, 1);    ?>
					</ul>
					
					<h2><?php _e('by Month'); ?></h2>
					<ul><?php wp_get_archives('type=monthly'); ?></ul>
				<h2>Last 50 Entries</h2>			
					<ul>
					<?php $posts = query_posts('showposts=50');?>			
					<?php if ($posts) : foreach ($posts as $post) : start_wp(); ?>
						<li><h4><em><?php the_time('d M Y'); ?></em><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h4></li>
					<?php endforeach; else: ?>
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
					<?php endif; ?>		
					</ul>					
				</div>
			</div>
	</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>