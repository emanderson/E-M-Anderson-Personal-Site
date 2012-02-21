
  <div class="footer">

      Sirius <?php echo __('Theme by','sirius'); ?> <a href="http://blogshop.de/" title="blogshop">Olaf A. Schmitz</a> - <?php bloginfo('name'); ?> <?php echo __('is powered by','sirius'); ?> <a href="http://wordpress.org" title="WordPress">WordPress</a>  (<a href="http://wordpress.de" title="WordPress Deutschland">WP.de</a>) - <?php wp_loginout(); ?>

      <!-- <?php echo $wpdb->num_queries; ?> queries. <?php timer_stop(1); ?> seconds. -->
      <br/>

   <?php /* -- Blogbeschreibung -- */
     if (function_exists('sirius_footerextrain')) { sirius_footerextrain();} ?>


  </div>
   
   
  </div> <!-- close rap -->
    

     <!-- Sirius design by Olaf A. Schmitz - http://blogshop.de/ -->
  	
  	
    	<?php wp_footer(); ?>
    	
</body>
</html>
