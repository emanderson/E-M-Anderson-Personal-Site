<?php /*
	Template Name: HomePage
*/ ?>

<?php get_header(); ?>
	
	<div id="primary" class="page">
		
		<?php if(have_posts()) : ?>
		
		<?php while(have_posts()) : the_post(); ?>
		
		<div class="entry" id="post-<?php the_ID(); ?>">
			
			<div class="entry-content">
				<?php the_content(); ?>
				<?php wp_link_pages('before=<p><strong>' . __('Pages:') . '</strong>&after=</p>'); ?>
			</div>
			
		</div><!--.entry-->
		
		<?php endwhile; ?>
		<?php endif; ?>	

	</div><!--#primary-->
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>