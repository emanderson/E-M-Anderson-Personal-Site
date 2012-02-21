  <?php get_header(); ?>

    <div id="middle">
	  <?php if (have_posts()) {  ?>
	  <div id="top_content" class="content">
		<!--
	      Be sure to keep the id, so we can discount this post later on
		  //-->
		<?php while (have_posts()) : the_post();
		      require("post.php");
		      endwhile; ?>
			  
		<div class="navigation">
		  <div class="align-left"><h3><?php next_posts_link('&laquo; Older Entries'); ?></h3></div>
		  <div class="align-right"><h3><?php previous_posts_link('Newer Entries &raquo;'); ?></h3></div>
		</div>

	    <div class="spacer">&nbsp;</div>
	  </div>
	  
	  <!--
	    Here is the first (top) section of the theme, showing our latest post,
		or the reader's preferred category latest post.
		//-->
	  <?php require("sidebar.php"); ?>
	  
	  <div class="spacer">&nbsp;</div>
	</div>
        <?php } ?> <!-- end have_posts() check //-->
		
    <?php get_footer(); ?>