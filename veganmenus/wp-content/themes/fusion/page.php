<?php /* Fusion/digitalnature */ ?>

<?php get_header(); ?>

<!-- main content -->
<div id="main-content">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
   <div class="post" id="post-<?php the_ID(); ?>">
    <h2><?php the_title(); ?></h2>
    <div class="entry">
     	<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
        <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
    </div>
   </div>
   <?php endwhile; endif; ?>
   
   <p><span class="editlink relative"><?php edit_post_link('Edit this entry'); ?></span></p>
</div>
<!-- /main content -->

</div>
<!-- /main -->
</div>
<!-- /main wrapper -->

<?php get_sidebar(); ?>

<!-- clear main & sidebar sections -->
<br clear="left" />
<!-- /clear main & sidebar sections -->

<?php get_footer(); ?>