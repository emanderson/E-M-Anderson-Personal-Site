	<div id="sidebar">
		<div id="header">
			<h1><a href="<?php echo get_settings('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
			<h2><?php bloginfo('description'); ?></h2>
		</div>
		<div class="middle">
				<ul id="pages"><li><h2 class="about">Pages</h2>
					<ul>
						<?php wp_list_pages('sort_column=ID&title_li=' ); ?>
					</ul>
				</li>
				</ul>		
		</div>
		<div class="right">
				<ul><li><h2 class="search">Search</h2>
					<ul>
					<li style="border:none;">
					<?php include (TEMPLATEPATH . '/searchform.php'); ?>
					</li>
					</ul>
					</li>
				</ul>
		</div>
		<div class="clear"></div>
		<!--
		<div style="padding: 0 10px 0 30px;margin:0;color: #666;">
			<?php /* If this is a 404 page */ if (is_404()) { ?>
			
			<?php /* If this is a category archive */ } elseif (is_category()) { ?>
			<p>You are currently browsing the archives for the <?php single_cat_title(''); ?> category.</p>
			
			<?php /* If this is a yearly archive */ } elseif (is_day()) { ?>
			<p>You are currently browsing the <a href="<?php bloginfo('home'); ?>/"><?php echo bloginfo('name'); ?></a> weblog archives
			for the day <?php the_time('l, F jS, Y'); ?>.</p>
			
			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<p>You are currently browsing the <a href="<?php bloginfo('home'); ?>/"><?php echo bloginfo('name'); ?></a> weblog archives
			for <?php the_time('F, Y'); ?>.</p>

      <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<p>You are currently browsing the <a href="<?php bloginfo('home'); ?>/"><?php echo bloginfo('name'); ?></a> weblog archives
			for the year <?php the_time('Y'); ?>.</p>
			
		 <?php /* If this is a monthly archive */ } elseif (is_search()) { ?>
			<p>You have searched the <a href="<?php echo bloginfo('home'); ?>/"><?php echo bloginfo('name'); ?></a> weblog archives
			for <strong>'<?php echo wp_specialchars($s); ?>'</strong>. If you are unable to find anything in these search results, you can try one of these links.</p>

			<?php /* If this is a monthly archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<p>You are currently browsing the <a href="<?php echo bloginfo('home'); ?>/"><?php echo bloginfo('name'); ?></a> weblog archives.</p>

			<?php } ?>						
		</div>
		-->
		
		<div class="middle">
				<ul><li><h2 class="cats">Category</h2>
					<ul>
	  		    	<?php wp_list_cats('sort_column=name&optioncount=1&title_li=' . __('Categories') ); ?>
					</ul>
					</li>
				</ul>
		</div>
		<div class="right">		
			<?php if (function_exists('get_calendar')) { ?>
					<ul><li><h2 class="cal"><?php _e('Archives'); ?></h2>
						<ul>
							<li><?php get_calendar(); ?></li>
						</ul>
						</li>
					</ul>
			<?php } else { ?>
					<ul><li><h2 class="cal"><?php _e('Archives'); ?></h2>
						<ul>
						<?php wp_get_archives('type=monthly'); ?>
						</ul>
						</li>
					</ul>
			<?php } ?>
		</div>
		<div class="clear"></div>
		<div style="padding: 0 10px;">				
			<?php if (!is_home()) { ?>
			
				<ul><li><h2 class="file">Recent Entries</h2>
					<ul>
						<?php wp_get_archives('type=postbypost&limit=10'); ?>			
					</ul>
					</li>
				</ul>
			<?php } ?>
				
			<?php if (function_exists('get_recent_comments')) { ?>
				<!-- Get the plugin at http://freepressblog.org/wordpress-plugins/recent-comments-plugin/ -->
				 <!-- Recent Commenters (Quantity,Length,MaxCommentsPerPost)-->
				<ul><li><h2 class="comment">Recent Comments</h2>
						   <?php echo get_recent_comments(5, 7, 3); ?>
					 </li>
				 </ul>
			<?php } ?>
			
			<ul>
				<li><h2 class="blogroll">LINKS</h2>
				<ul class="links">
				<?php get_links_list('name'); ?>
				</ul>
				</li>
			</ul>
			<div class="clear"></div>
			<ul><li><h2 class="meta">Meta</h2>
				<ul>
				<?php /* If this is the frontpage */ 
				  /* if ( is_home() ) { */ ?>				
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
				<?php /* } */ ?>
				<li>
					<a href="http://validator.w3.org/check/referer"><img src="<?php bloginfo('template_url'); ?>/img/xhtml10.png" width="80" height="15" alt="XHTML Valid" /></a>
					<a href="http://jigsaw.w3.org/css-validator/check/referer"><img src="<?php bloginfo('template_url'); ?>/img/css.png" width="80" height="15" alt="CSS Valid" /></a>
					<a href="feed:<?php bloginfo('rss2_url'); ?>"><img src="<?php bloginfo('template_url'); ?>/img/xmlfeed.gif" width="80" height="15" alt="XML Feed" /></a><br/>
					<a href="feed:<?php bloginfo('comments_rss2_url'); ?>"><img src="<?php bloginfo('template_url'); ?>/img/rsscomments.gif" width="80" height="15" alt="RSS Comments"/></a>
					<a href="http://gmpg.org/xfn"><img src="<?php bloginfo('template_url'); ?>/img/xfn-btn.gif" alt="XFN Friendly" /></a>
					<a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform."><img src="<?php bloginfo('template_url'); ?>/img/wordpress.gif" width="80" height="15" alt="Wordpress.Org"/></a>
				</li>
				<?php wp_meta(); ?>
				</ul>
				</li>
			</ul>
	</div>
</div>	

