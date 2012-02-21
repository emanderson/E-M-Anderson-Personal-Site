<?php
get_header();
?>

<div id="content">
<?php if (have_posts()) : ?>

	<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
	<?php 
	if (is_category()) { ?>				
		<h2>Archive for the '<?php echo single_cat_title(); ?>' Category</h2>
	<?php }
	 
	elseif (is_day()) { ?>
		Archive for <?php the_time('F jS, Y'); ?></h2>
	<?php }
	
	elseif (is_month()) { ?>
		<h2>Archive for <?php the_time('F, Y'); ?></h2>
	<?php } 
	
	elseif (is_year()) { ?>
		<h2>Archive for <?php the_time('Y'); ?></h2>
	<?php } 
	
	elseif (is_search()) { ?>
		<h2>Search Results</h2>
	<?php } 
	
	elseif (is_author()) { ?>
		<h2>Author Archive</h2>
	<?php }
	 
	elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2>Blog Archives</h2>
	<?php } ?>

<?php while (have_posts()) : the_post(); ?>

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
