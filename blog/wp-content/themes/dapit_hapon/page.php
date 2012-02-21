<?php get_header(); ?>
<?php get_sidebar(); ?>
<div id="content_pages">	
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="entrybox" id="post-<?php the_ID(); ?>">			
			<div class="pagesheader">
				<div class="pagetitlebox">
					<?php the_title(); ?>
				</div>
			</div>
			<div class="pagestext">
			  <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
				
				<p><?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?></p>
			</div>
<?php endwhile; endif; ?>
	
</div>
</div>
<?php get_footer(); ?>