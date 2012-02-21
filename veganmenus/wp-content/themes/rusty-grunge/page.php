<?php get_header() ?>    
		<div id="main" class="clearfix">
			<div id="content">
			  <div class="inner">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<h1 class="post"><?php the_title(); ?></h1>
						<?php the_content(); ?>
				 </div>
			<?php endwhile; ?>
			
			<?php else : ?>
				<h1>Not Found</h1>
				<p>Sorry, but you are looking for something that isn't here.</p>
				<?php get_search_form(); ?>
				<div class="postmeta"></div>
			<?php endif; ?>
			</div>
    </div>
	<?php get_sidebar() ?>
    <div class="clearboth"></div>
    </div>
<?php get_footer() ?>