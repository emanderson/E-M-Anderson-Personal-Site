<?php get_header(); ?>
<?php get_sidebar(); ?>
<div id="content_pages">	
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="entrybox" id="post-<?php the_ID(); ?>">			
			<div class="pagesheader">
				<div class="pagetitlebox">
					ERROR!!!!
				</div>
			</div>
			<div class="pagestext">
<p>Error 404 - Not Found</p>
			</div>
<?php endwhile; endif; ?>
	
</div>
</div>
<?php get_footer(); ?>