<?php
/*
Template Name: Archives
*/
?>

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
<ul class="listsforpages"><li><h2>Archives by Month:</h2>
  <ul>
    <?php wp_get_archives('type=monthly'); ?>
  </ul></li>
 <li><h2>Archives by Subject:</h2>
   <ul>
     <?php wp_list_cats(); ?>
  </ul> </li></ul>
  
			</div>

<?php endwhile; endif; ?>	
</div>
</div>
<?php get_footer(); ?>