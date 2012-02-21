<?php get_header(); ?>


  <?php if ($sirius->option['ads'] == 'adsan') {
   $postnum = 1; $showads = $sirius->option['adscat']; } ?>


  <div id="content">

  <?php /* -- Schema -- */
    global $sirius; if ($sirius->option['shortnews'] == 'shortnewsaus') { ?>
		
	 <?php if (have_posts()) :  while (have_posts()) : the_post(); ?>

   <div class="post" id="post-<?php the_ID(); ?>">

    <?php the_date('','<small>','</small>'); ?>

      <h1 class="storytitle" id="title-<?php the_ID(); ?>"><a href="<?php echo get_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link','sirius') ?>: <?php the_title(); ?>"><?php the_title(); ?></a> <?php edit_post_link('<img src="'.get_bloginfo(template_directory).'/images/edit.gif" alt="'.__('Edit Link','sirius').'" />','<span class="editlink">', '</span>'); ?></h1>

    	 <div class="storycontent">
	
        	<?php the_content(''.__('more...','sirius').''); ?>
	
	      	<?php link_pages('<strong>'.__('Pages','sirius').': </strong>', '<br /><br />', 'number'); ?>

      </div>

    	<div class="meta">
    	
  		<img src="<?php bloginfo('template_directory'); ?>/images/comment-big.gif" alt="<?php echo __('Comments','sirius'); ?>"/>&nbsp;<?php comments_popup_link(''. __('Comments','sirius').'', ''. __('1 Comment','sirius').'', ''. __('% Comments','sirius').''); ?>
       | <?php echo __('Categories','sirius'); ?>: <?php the_category(', ') ?> | Autor: <?php the_author() ?>

       </div>

     </div> <!--  close post -->			
	
	<!--
	<?php trackback_rdf(); ?>
	-->

        <?php /* -- Advertisement Area -- */
         global $sirius; if ($sirius->option['ads'] == 'adsan') {
         if ($postnum == $showads) {  ?>
         <br/><br/><div align="center">	
         <?php echo $sirius->option['adscode']; ?>
         </div>
         <br/>
         <?php } $postnum++; echo '<br/><br/><br/>'; } else { ?>
         <br/><br/><br/><br/>	
          <?php } ?>


		<?php endwhile;  else : ?>
	

		<h2 class="center"><?php echo __('Not Found','sirius'); ?></h2>
		
		<p class="center"><?php echo __('Sorry, no posts matched your criteria.','sirius'); ?></p>
	
  	<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>


	<?php   }
         /* ---------------------------------------------------- */
  else   /* ---- Start Short News ------------------------------ */
         /* ---------------------------------------------------- */
         { ?>
	
	

     <?php if ($posts) {
           function stupid_hack($str){
               return preg_replace('|</ul>\s*<ul class="linklog">|', '', $str);
               }
          ob_start('stupid_hack');
          foreach($posts as $post)
          {
          start_wp();
          if ( in_category(''.$sirius->option['shortnewscat'].'') && !is_single() ) : ?>
          

         <div class="linklogpost">
           <ul class="linklog">
             <li id="p<?php the_ID(); ?>">
                <?php echo wptexturize($post->post_content); ?>&nbsp;
                <span class="kommentieren">
                |&nbsp;<?php comments_popup_link('Kommentare', '1 Kommentar','% Kommentare')?>
                 <?php edit_post_link('<img src="'.get_bloginfo(template_directory).'/images/edit.gif" alt="'.__('Edit Link','sirius').'" />','<span class="editlink">', '</span>'); ?>
               </span>
             </li>
           </ul>
        </div>

        <?php /* -- Advertisement Area -- */
         global $sirius; if ($sirius->option['ads'] == 'adsan') {
         if ($postnum == $showads) {  ?>
         <div align="center">	
         <?php echo $sirius->option['adscode']; ?>
         </div>
         <br/><br/>
         <?php } $postnum++; } ?>	


<?php else: // If it's a regular post or a permalink page ?>

   <div class="post" id="post-<?php the_ID(); ?>">

    <?php the_date('','<small>','</small>'); ?>

      <h1 class="storytitle" id="title-<?php the_ID(); ?>"><a href="<?php echo get_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link','sirius') ?>: <?php the_title(); ?>"><?php the_title(); ?></a> <?php edit_post_link('<img src="'.get_bloginfo(template_directory).'/images/edit.gif" alt="'.__('Edit Link','sirius').'" />','<span class="editlink">', '</span>'); ?></h1>

    	 <div class="storycontent">
	
        	<?php the_content(''.__('more...','sirius').''); ?>
	
	      	<?php link_pages('<strong>'.__('Pages','sirius').': </strong>', '<br /><br />', 'number'); ?>

      </div>

    	<div class="linklogmeta">
    	
  		<img src="<?php bloginfo('template_directory'); ?>/images/comment-big.gif" alt="Kommentare"/>&nbsp;&nbsp;<?php comments_popup_link('Kommentare', '1 Kommentar', '%&nbsp;Kommentare'); ?>
       | <?php echo __('Categories','sirius'); ?>: <?php the_category(', ') ?> | Autor: <?php the_author() ?>

       </div>

     </div> <!--  close post -->		

	
	
	<!--
	<?php trackback_rdf(); ?>
	-->


        <?php /* -- Advertisement Area -- */
         global $sirius; if ($sirius->option['ads'] == 'adsan') {
         if ($postnum == $showads) {  ?>
         <br/><br/><div align="center">	
         <?php echo $sirius->option['adscode']; ?>
         </div>
         <br/>
         <?php } $postnum++; echo '<br/><br/>'; } else { ?>
         <br/><br/><br/><br/>	
          <?php } ?>	
      




		<?php endif; ?>





		
	<?php } } else { ?>
	

		<h2 class="center"><?php echo __('Not Found','sirius'); ?></h2>
		
		<p class="center"><?php echo __('Sorry, no posts matched your criteria.','sirius'); ?></p>
	
  	<?php include (TEMPLATEPATH . "/searchform.php"); ?>	

	
	
	   <?php }} ?>
	
	
    		<div class="navigation">
		
     <?php posts_nav_link('', '<img src="'.get_bloginfo(template_directory).'/images/back.png" alt="'.__('Next Entries','sirius').'" />&nbsp;', '<img src="'.get_bloginfo(template_directory).'/images/forward.png" alt="'.__('Previous Entries','sirius').'" />'); ?>
		 	
   </div>

  </div>  <!-- close content -->




<?php get_sidebar(); ?>

<?php get_footer(); ?>
