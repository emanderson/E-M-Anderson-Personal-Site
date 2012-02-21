<?php
/*
Template Name: Archives
*/
?>
<?php get_header(); ?>
<div id="main">
		<div id="content">			
			<div class="post">
				<h2>Last 50 Entries</h2>			
				<div class="post-content">
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