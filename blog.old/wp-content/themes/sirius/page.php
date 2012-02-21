<?php get_header(); ?>



	<div id="content" class="widecolumn">
				
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	

	
		<div class="post" id="post-<?php the_ID(); ?>">
		
    	<h1 class="storytitle" id="title-<?php the_ID(); ?>"><a href="<?php echo get_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link','sirius') ?>: <?php the_title(); ?>"><?php the_title(); ?></a> <?php edit_post_link('<img src="'.get_bloginfo(template_directory).'/images/edit.gif" alt="'.__('Edit Link','sirius').'" />','<span class="editlink">', '</span>'); ?></h1>

		

    	 <div class="storycontent">
	
        	<?php the_content(''.__('more...','sirius').''); ?>
	
	      	<?php link_pages('<strong>'.__('Pages','sirius').': </strong>', '<br /><br />', 'number'); ?>

      </div>	


  		
	
	
		</div>  <!-- close post -->
		
		
  		
  		
    <?php /* -- Commentform -- */
    if (function_exists('sirius_seitenkommentare')) { sirius_seitenkommentare();} ?>
	
	
	

	<?php endwhile; else: ?>
	
   	<p><?php echo __('Sorry, no posts matched your criteria.','sirius'); ?></p>
	
  <?php endif; ?>
	
	
	</div>  <!-- close content -->
	


     <?php /* -- Sidebar -- */
      if (function_exists('sirius_seitensidebar')) { sirius_seitensidebar();} ?>



<?php get_footer(); ?>
