<?php get_header(); ?>




  <div id="content">


 	  <?php if (have_posts()) :  while (have_posts()) : the_post(); ?>


   <div class="post" id="post-<?php the_ID(); ?>">
    

    <?php the_date('','<small>','</small>'); ?>

      <h1 class="storytitle" id="title-<?php the_ID(); ?>"><a href="<?php echo get_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link','sirius') ?>: <?php the_title(); ?>"><?php the_title(); ?></a> <?php edit_post_link('<img src="'.get_bloginfo(template_directory).'/images/edit.gif" alt="'.__('Edit Link','sirius').'" />','<span class="editlink">', '</span>'); ?></h1>


    	 <div class="excerpt">
	
        	<?php the_excerpt(); ?>
	
	      	<a href="<?php echo get_permalink() ?>"  title="<?php echo __('more...','sirius'); ?>"><?php echo __('more...','sirius'); ?></a>
	      	
      </div>



		<?php endwhile; ?>



		<div class="navigation">
		
     <?php posts_nav_link('', '<img src="'.get_bloginfo(template_directory).'/images/back.png" alt="'.__('Next Entries','sirius').'" />&nbsp;', '<img src="'.get_bloginfo(template_directory).'/images/forward.png" alt="'.__('Previous Entries','sirius').'" />'); ?>
		 	
   </div>
   
		
	<?php else : ?>
	

		<h2 class="center"><?php echo __('Not Found','sirius'); ?></h2>
		
		<p class="center"><?php echo __('Sorry, no posts matched your criteria.','sirius'); ?></p>
	
  	<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>
	


  </div>  <!-- close content -->




<?php get_sidebar(); ?>

<?php get_footer(); ?>
