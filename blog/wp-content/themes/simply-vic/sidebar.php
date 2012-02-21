	</div>
	<div id="sidebar">
		<ul>
			
			<li><?php include (TEMPLATEPATH . '/searchform.php'); ?></li>

			<!-- Author information is disabled per default. Uncomment and fill in your details if you want to use it.
			<li><h2>Author</h2>
			<p>A little something about you, the author. Nothing lengthy, just an overview.</p>
			</li>
			-->

			
			<?php /* If this is a 404 page */ if (is_404()) { ?>
			<?php /* If this is a category archive */ } elseif (is_category()) { ?>
			<li><p>You are currently browsing the archives for the <?php single_cat_title(''); ?> category.</p></li>
			
			<?php /* If this is a yearly archive */ } elseif (is_day()) { ?>
			<li><p>You are currently browsing the <a href="<?php bloginfo('home'); ?>/"><?php echo bloginfo('name'); ?></a> weblog archives
			for the day <?php the_time('l, F jS, Y'); ?>.</p></li>
			
			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<li><p>You are currently browsing the <a href="<?php bloginfo('home'); ?>/"><?php echo bloginfo('name'); ?></a> weblog archives
			for <?php the_time('F, Y'); ?>.</p></li>

      <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<li><p>You are currently browsing the <a href="<?php bloginfo('home'); ?>/"><?php echo bloginfo('name'); ?></a> weblog archives
			for the year <?php the_time('Y'); ?>.</p></li>
			
		 <?php /* If this is a monthly archive */ } elseif (is_search()) { ?>
			<li><p>You have searched the <a href="<?php echo bloginfo('home'); ?>/"><?php echo bloginfo('name'); ?></a> weblog archives
			for <strong>'<?php echo wp_specialchars($s); ?>'</strong>. If you are unable to find anything in these search results, you can try one of these links.</p></li>

			<?php /* If this is a monthly archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<li><p>You are currently browsing the <a href="<?php echo bloginfo('home'); ?>/"><?php echo bloginfo('name'); ?></a> weblog archives.</p></li>

			<?php } ?>

			
			<?php wp_list_pages('sort_column=ID&title_li=<h2>Pages</h2>' ); ?>

			<?php if (function_exists('get_calendar')) { ?>
		    <li><h2><?php _e('Archives'); ?></h2>
					<ul>
						<li style="color:#999;text-align:center;"><?php get_calendar(); ?></li>
					</ul>
        </li>
			<?php } else { ?>
				<li>
					<h2><?php _e('Archives'); ?></h2>
					<ul>
						<?php wp_get_archives('type=monthly'); ?>
					</ul>
				</li>
			<?php } ?>

			<li><h2>Categories</h2>
				<ul>
	      	<?php wp_list_cats('sort_column=name&optioncount=1&title_li=' . __('Categories') ); ?>
				</ul>
			</li>

			<?php if (!is_home()) { ?>
			<li><h2>Recent Entries</h2>
				<ul>
					<?php wp_get_archives('type=postbypost&limit=10'); ?>			
				</ul>
			</li>
			<?php } ?>
			
			<?php if (function_exists('get_recent_comments')) { ?>
				<!-- Get the plugin at http://freepressblog.org/wordpress-plugins/recent-comments-plugin/ -->
				<li><h2>Recent Comments</h2>
				 <!-- Recent Commenters (Quantity,Length,MaxCommentsPerPost)-->
			   <?php echo get_recent_comments(5, 7, 3); ?>
				 </li>
			<?php } ?>
			
			<?php /* If this is the frontpage */ if ( is_home() ) { ?>				
			
				<?php /* get_links_list(); */ ?>
				
				<li><h2>Meta</h2>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<li>
						<br/>
						<a href="http://validator.w3.org/check/referer"><img src="<?php bloginfo('template_url'); ?>/img/xhtml10.png" width="80" height="15" alt="XHTML Valid" /></a>
						<a href="http://jigsaw.w3.org/css-validator/check/referer"><img src="<?php bloginfo('template_url'); ?>/img/css.png" width="80" height="15" alt="CSS Valid" /></a><br/>
						<a href="feed:<?php bloginfo('rss2_url'); ?>"><img src="<?php bloginfo('template_url'); ?>/img/xmlfeed.gif" width="80" height="15" alt="XML Feed" /></a>
						<a href="feed:<?php bloginfo('comments_rss2_url'); ?>"><img src="<?php bloginfo('template_url'); ?>/img/rsscomments.gif" width="80" height="15" alt="RSS Comments"/></a><br/>
						<a href="http://gmpg.org/xfn"><img src="<?php bloginfo('template_url'); ?>/img/xfn-btn.gif" alt="XFN Friendly" /></a>
						<a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform."><img src="<?php bloginfo('template_url'); ?>/img/wordpress.gif" width="80" height="15" alt="Wordpress.Org"/></a>
					</li>
					<!-- To test the SIFR 
					<li style="margin-top: 5px;">Use sIFR? (Requires refresh)<br/>
					<a href="javascript:sIFR.preferenceManager.disable()">no</a> | <a href="javascript:sIFR.preferenceManager.enable()">yes</a> | <a href="javascript:sIFR.preferenceManager.storage.reset()">forget</a><br/>
					<a href="javascript:sIFR.rollback();">Remove sIFR headlines</a></p>	
					</li>
					-->
				</ul>
				</li>

			<?php } ?>
		</ul>
	</div>

