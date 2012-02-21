      <div id="sidebar">
		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar()) { ?>
		<div class="top"></div>
		<div class="middle">
		  <div class="title"><h3><?php _e('Menu'); ?></h3></div>
          <ul id="navlist">
            <li id="active"><a href="<?php bloginfo('url'); ?>" id="current">Home</a></li>
            <li><a href="<?php bloginfo('rss2_url'); ?>" title="RSS">RSS</a></li>
            <li><a href="mailto:<?php echo antispambot(bloginfo('admin_email')); ?>">Contact</a></li>
			<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
		    <li><?php wp_loginout(); ?></li>
          </ul>
		</div>
		<div class="bottom"></div>
	  
	  
	    <div class="top"></div>
		<div class="middle">
		  <div class="title"><h3><?php _e('Search'); ?></h3></div>
		  <?php include(TEMPLATEPATH . '/searchform.php'); ?>
		</div>
		<div class="bottom"></div>
		
		
		<div class="top"></div>
		<div class="middle">
		  <div class="title"><h3><?php _e('Calendar'); ?></h3></div>
		  <?php get_calendar(); ?>
		</div>
		<div class="bottom"></div>
		
		
	    <div class="top"></div>
		<div class="middle">
		  <div class="title"><h3><?php _e('Pages'); ?></h3></div>
		  <ul><?php wp_list_pages('sort_column=post_title&title_li=&categorize=0' ); ?></ul>
		</div>
		<div class="bottom"></div>
		
		
		<div class="top"></div>
		<div class="middle">
		  <div class="title"><h3><?php _e('Categories'); ?></h3></div>
		  <ul><?php wp_list_categories('title_li=&categorize=0&depth=1&hide_empty=1&hierarchical=1'); ?></ul>
		</div>
		<div class="bottom"></div>

	  
		<div class="top"></div>
		<div class="middle">
		  <div class="title"><h3><?php _e('Blogroll'); ?></h3></div>
		  <ul>
		    <?php wp_list_bookmarks('title_li=&categorize=0'); ?> 
		  </ul>
		</div>
		<div class="bottom"></div>


        <div class="top"></div>
		<div class="middle">
		  <div class="title"><h3><?php _e('Tag Cloud'); ?></h3></div>
		  <p id="tagcloud">
		    <?php wp_tag_cloud(); ?>
		  </p>
		</div>
		<div class="bottom"></div>
	  
	    <?php if (function_exists('wp_theme_switcher') && is_home()) { ?>
        <div class="top"></div>
		<div class="middle">
		  <div class="title"><h3><?php _e('Theme Switcher'); ?></h3></div>
          <?php get_theme_switcher(); ?>
		</div>
		<div class="bottom"></div>
	    <?php } ?>
		<?php } ?>
	  </div>
	 
		
