<?php get_header(); ?>
<div class="rowcontainer">
<div class="threequartercolumn">
			
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="entry<?php if(is_home() && $post==$posts[0] && !is_paged()) echo ' firstpost';?>">
  <!--<h2 class="entrydate">
    <?php the_date() ?>
  </h2>-->
  <h3 class="entrytitle" id="post-<?php the_ID(); ?>"> <a href="<?php the_permalink() ?>" rel="bookmark">
    <?php the_title(); ?>
    </a> </h3>
  <div class="entrybody">
    <div class="entrymeta">
      <?php the_time('F dS Y') ?>
      Posted in
      <?php the_category(',') ?>
      <?php edit_post_link(__('<strong>Edit</strong>')); ?>
    </div>
    <?php the_content(__('(Read the article)')); ?>
    <p class="comments_link">
      <?php 
		$comments_img_link = '<img src="' . get_stylesheet_directory_uri() . '/images/comments.gif"  title="comments" alt="*" />';
		comments_popup_link(' Comments(0)', $comments_img_link . ' Comments(1)', $comments_img_link . ' Comments(%)'); 
	?>
    </p>
  </div>
  <!--
	<?php trackback_rdf(); ?>
	-->
</div>
<?php comments_template(); // Get wp-comments.php template 
 endwhile; else: ?>
<p>
  <?php _e('Sorry, no posts matched your criteria.'); ?>
</p>
<?php endif; ?>
<p>
  <?php posts_nav_link(' &#8212; ', __('&laquo; Previous Page'), __('Next Page &raquo;')); ?>
</p>

</div>
<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>

</body>
</html>