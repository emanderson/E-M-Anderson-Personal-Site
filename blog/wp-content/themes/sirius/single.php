<?php get_header(); ?>



	<div id="content" class="widecolumn">
				
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	
  	<div class="navigation">
			<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
			<div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
		</div>

	
		<div class="post" id="post-<?php the_ID(); ?>">
		
    	<h1 class="storytitle" id="title-<?php the_ID(); ?>"><a href="<?php echo get_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link','sirius') ?>: <?php the_title(); ?>"><?php the_title(); ?></a> <?php edit_post_link('<img src="'.get_bloginfo(template_directory).'/images/edit.gif" alt="'.__('Edit Link','sirius').'" />','<span class="editlink">', '</span>'); ?></h1>

		

    	 <div class="storycontent">
	
        	<?php the_content(''.__('more...','sirius').''); ?>
	
	      	<?php link_pages('<strong>'.__('Pages','sirius').': </strong>', '<br /><br />', 'number'); ?>

      </div>	


         <?php /* -- Advertisement Area -- */
         global $sirius; if ($sirius->option['ads'] == 'adsan') { ?>
         <div align="center">	
         <?php echo $sirius->option['adscode']; ?>
         </div>
         <br/><br/>
        <?php } ?>	
     
     
  			<p class="postmetadata alt">
					<small>
					
            <?php echo __('This entry was posted on','sirius'); the_time(' l j. F Y ');  echo __('at','sirius');  the_time(' H:i'); echo __(' and is filed under: ','sirius');  the_category(', ') ?>.

            <?php echo __('You can follow any responses to this entry through ','sirius'); comments_rss_link('RSS'); ?>.
									
						<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Both Comments and Pings are open ?>
						 | <a href="<?php trackback_url(true); ?>" rel="trackback" title="<?php echo __('Trackback URI','sirius'); ?>"><?php echo __('Trackback URI','sirius'); ?></a>.
						
						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Only Pings are Open ?>	
            <?php echo __('Responses are currently closed. ','sirius'); ?> | <a href="<?php trackback_url(true); ?>" rel="trackback">Trackback URI</a>.
		
        		<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Comments are open, Pings are not ?>
            <?php echo __('Pinging is currently not allowed.','sirius'); ?>
			         
						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
					  	// Neither Comments, nor Pings are open ?>
				    <?php echo __('Both comments and pings are currently closed.','sirius'); ?>
					
          	<?php } ?>
						
					</small>
				</p>
	
	
		</div>  <!-- close post -->
		
		    
		
 	<?php comments_template(); ?>
	

	<?php endwhile; else: ?>
	
   	<p><?php echo __('Sorry, no posts matched your criteria.','sirius'); ?></p>
	
  <?php endif; ?>
	
	
	</div>  <!-- close content -->
	

      <?php /* -- Sidebar -- */
      if (function_exists('sirius_beitragssidebar')) { sirius_beitragssidebar();} ?>


<?php get_footer(); ?>
