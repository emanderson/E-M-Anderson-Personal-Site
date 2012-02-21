 
    <div id="footer">
	  <div class="top"></div>
	  
	  <div class="middle">
	    <div class="block">
		  <h3><?php _e('Last 5 Posts'); ?></h3>
          <ul>
		    <?php get_archives('postbypost', '5', 'html', '', '', FALSE); ?> 
          </ul>
	    </div>
	  
	    <div class="block">
		  <h3><?php _e('Archives'); ?></h3>
	      <ul>
			<?php get_archives('monthly', '7', 'html', '', '', TRUE); ?>
		  </ul>
	    </div>
		
	    <div class="block">
		  <br />
	      <p>
		    This <a href="http://www.wordpress.org/" rel="tag">WordPress</a> theme - 
			<a href="http://www.theenglishguy.co.uk/openair-theme/" rel="tag" title="OpenAir WordPress Theme">OpenAir</a> - was
			created by <a href="http://www.theenglishguy.co.uk/" title="Theme Designer: Richard Dows" rel="tag">Richard Dows</a>.
			<br /><br />
			To keep track of the RSS, consider subscribing to the <a href="<?php bloginfo('rss2_url'); ?>" 
		    title="Syndicate this site using RSS">RSS Feed</a> and the <a href="<?php bloginfo('comments_rss2_url'); ?>" 
		    title="The latest comments to all posts in RSS">Comments RSS Feed</a>
	      </p>
	    </div>
		
		<div class="spacer">&nbsp;</div>
	  </div> <!-- end .middle //-->
	  
	  <div class="bottom"></div>
	</div> <!-- end #footer //-->
	<?php wp_footer(); ?>
  </div> <!-- end #wrap //-->
</body>
</html>