	<?php get_header();?>	
	<div id="content">
		<?php if ($posts) { ?>	
		<?php $post = $posts[0]; /* Hack. Set $post so that the_date() works. */ ?>
		<?php if (is_day()) { ?>
			<h3><?php the_time('l, F jS, Y'); ?></h3>						
		<?php } elseif (is_month()) { ?>
			<h3><?php the_time('F Y'); ?></h3>
		<?php } elseif (is_year()) { ?>
			<h3><?php the_time('Y'); ?></h3>		
		<?php } ?>				
		<br/>				
		<?php foreach ($posts as $post) : start_wp(); ?>				
			<?php require(TEMPLATEPATH. "/post.php");?>	
		<?php endforeach; ?>
		<p align="center"><?php posts_nav_link() ?></p>		
		<?php } else { ?>
			<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>			
		<?php } ?>			
	</div>
<?php get_sidebar();?>	
<?php get_footer();?>