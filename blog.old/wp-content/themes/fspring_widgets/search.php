<?php
get_header();
?>

<div id="content">
<h2>Search results</h2>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div class="entry <?php if(is_home() && $post==$posts[0] && !is_paged()) echo ' firstpost';?>">
    <h3 class="entrytitle" id="post-<?php the_ID(); ?>"> <a href="<?php the_permalink() ?>" rel="bookmark">
      <?php the_title(); ?>
      </a> </h3>
	  <div class="entrymeta">
        	<?php the_time('F dS, Y'); 
			echo " | Category: ";the_category(',');?>
		</div>
    <div class="entrybody">
      <?php the_content(__('Read more'));?>
      
<?php			comments_popup_link( 'No comments ','1 comment ','% comments ',	'comments-link ','Comments are off for this post '); 
			edit_post_link(__('<strong>Edit</strong>'));?>
      
    </div>
    <!--
	<?php trackback_rdf(); ?>
	-->
  </div>
  <?php comments_template(); // Get wp-comments.php template ?>
  <?php endwhile; else: ?>
  <p>
    <?php _e('Sorry, no posts matched your criteria.'); ?>
  </p>
  <?php endif; ?>
  <p>
    <?php posts_nav_link(' &#8212; ', __('&laquo; Previous Page'), __('Next Page &raquo;')); ?>
  </p>
</div>
<?php get_sidebar(); ?>
<!-- The main column ends  -->
<?php get_footer(); ?>
