<?php /* Fusion/digitalnature */ ?>

 <!-- sidebar (container) -->
<div id="sidebar">
  <!-- sidebar wrap -->
  <div class="wrap">
     <ul>
     <li>
          <?php get_search_form(); ?>
		</li>

           <!-- Author information is disabled per default. Uncomment and fill in your details if you want to use it.
			<li><h2>Author</h2>
			<p>A little something about you, the author. Nothing lengthy, just an overview.</p>
			</li>
			-->

			<?php if ( is_404() || is_category() || is_day() || is_month() ||
						is_year() || is_search() || is_paged() ) {
			?> <li>

			<?php /* If this is a 404 page */ if (is_404()) { ?>
			<?php /* If this is a category archive */ } elseif (is_category()) { ?>
			<p>You are currently browsing the archives for the <?php single_cat_title(''); ?> category.</p>

			<?php /* If this is a yearly archive */ } elseif (is_day()) { ?>
			<p>You are currently browsing the <a href="<?php bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> blog archives
			for the day <?php the_time('l, F jS, Y'); ?>.</p>

			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<p>You are currently browsing the <a href="<?php bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> blog archives
			for <?php the_time('F, Y'); ?>.</p>

			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<p>You are currently browsing the <a href="<?php bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> blog archives
			for the year <?php the_time('Y'); ?>.</p>

			<?php /* If this is a monthly archive */ } elseif (is_search()) { ?>
			<p class="error">You have searched the <a href="<?php echo bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> blog archives
			for <strong>'<?php the_search_query(); ?>'</strong>. If you are unable to find anything in these search results, you can try one of these links.</p>

			<?php /* If this is a monthly archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<p>You are currently browsing the <a href="<?php echo bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> blog archives.</p>

			<?php } ?>

			</li> <?php }?>



            <li>
              <!-- sidebar menu (categories) -->
              <ul class="nav">
                <?php echo preg_replace('@\<li([^>]*)>\<a([^>]*)>(.*?)\<\/a>@i', '<li$1><a$2><span>$3</span></a>', wp_list_categories('show_count=0&echo=0&exlude=181&title_li=')); ?>
              <?php //wp_list_categories('show_count=1&title_li=<h2>Categories</h2>'); ?>
              </ul>
              <!-- /sidebar menu -->
            </li>

           <?php 	/* Widgetized sidebar, if you have the plugin installed. */
		    if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>

            <?php /* If this is the frontpage */ if ( is_home() || is_page() ) { ?>
			<?php wp_list_bookmarks(); ?>
    		<?php } ?>

			<li class="box-wrap">
              <div class="box">
               <h2>Archives</h2>
               <div class="inside">
				<ul>
				<?php wp_get_archives('type=monthly'); ?>
				</ul>
                </div>
               </div>

			</li>

			<?php /* If this is the frontpage */ if ( is_home() || is_page() ) { ?>

			<li class="box-wrap">
              <div class="box">
               <h2>Meta</h2>
               <div class="inside">
			   <ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
					<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
					<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
					<?php wp_meta(); ?>
				</ul>
                </div>
               </div>
			</li>
    		<?php } ?>
			<?php endif; ?>
     </ul>
  </div><!-- /sidebar wrap -->
</div><!-- /sidebar -->
