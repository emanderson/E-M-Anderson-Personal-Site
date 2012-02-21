<?php get_header(); ?>

	<div id="content" class="narrowcolumn">


		<h1><?php echo __('Error','sirius'); ?> 404 - <?php echo __('Not Found','sirius'); ?></h1>


     <p>

        <?php echo __('Sorry, but you are looking for something that is not here.','sirius'); ?>

        <br/><?php echo __(' Do you want to go','sirius'); ?> <a href="<?php echo get_settings('home'); ?>/"><?php echo __('Home','sirius'); ?></a>?

        <br/><br/><?php echo __('Search the archives:','sirius'); ?>

    </p>

      
    <?php include (TEMPLATEPATH . '/searchform.php'); ?>
    
  
	</div>

<?php // get_sidebar(); ?>

<?php get_footer(); ?>
