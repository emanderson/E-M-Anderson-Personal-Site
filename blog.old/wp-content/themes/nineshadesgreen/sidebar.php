<div id="sidebar">
<h1 class="sidetitle">Welcome</h1><div class="hr"><hr /></div><br />

		<ul>
			<li><h2><?php _e('Author'); ?></h2>
			<!--Link to your image here.
			For best results, make it 150 pixels wide--><img src="http://i33.photobucket.com/albums/d77/whatsupkids/yourimagehere.jpg" alt="Your Image Here" width="150px" class="centered" />
			<p>A little something about you, the author. Nothing lengthy, just an overview.</p>
			<div class="hr"><hr /></div><br /></li>



<?php /* If this is a category archive */ if (is_category()) { ?><li>
			<p>You are currently browsing the archives for the <?php single_cat_title(''); ?> category.</p></li>
			
			<?php /* If this is a daily archive */ } elseif (is_day()) { ?><li>
			<p>You are currently browsing the <a href="<?php echo get_settings('siteurl'); ?>"><?php echo bloginfo('name'); ?></a> daily archives
			.</p>
			</li>
			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?><li>
			<p>You are currently browsing the <a href="<?php echo get_settings('siteurl'); ?>"><?php echo bloginfo('name'); ?></a> monthly archives
			.</p></li>

      <?php /* If this is a yearly archive */ } elseif (is_year()) { ?><li>
			<p>You are currently browsing the <a href="<?php echo get_settings('siteurl'); ?>"><?php echo bloginfo('name'); ?></a> yearly archives
			.</p></li>
			
		 <?php /* If this is a monthly archive */ } elseif (is_search()) { ?><li>
			<p>You have searched the <a href="<?php echo get_settings('siteurl'); ?>"><?php echo bloginfo('name'); ?></a> weblog archives
			for <strong>'<?php echo wp_specialchars($s); ?>'</strong>. If you are unable to find anything in these search results, you can try one of these links.</p></li>

			<?php /* If this is a monthly archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?><li>
			<p>You are currently browsing the <a href="<?php echo get_settings('siteurl'); ?>"><?php echo bloginfo('name'); ?></a> weblog archives.</p></li>

			<?php } ?>

		</ul>
			
		<div id="popout"><ul>
			<?php wp_list_pages('title_li=<h2>' . __('Pages') . '</h2>' ); ?>

			<li><h2><?php _e('Archives'); ?></h2>
				<ul>
				<?php wp_get_archives('type=monthly'); ?>
				</ul>
			</li>

			<li><h2><?php _e('Categories'); ?></h2>
				<ul>
				<?php list_cats(0, '', 'name', 'asc', '', 1, 0, 0, 1, 1, 1, 0,'','','','','') ?>
				</ul>
			</li>
			
				<?php get_links_list(); ?>


				<li><h2>Users</h2>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
				</ul></li>
				
				<li><h2>Meta</h2>
				<ul>
					<li><a href="http://validator.w3.org/check/referer" title="<?php _e('This page validates as XHTML 1.0 Transitional'); ?>"><?php _e('Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr>'); ?></a></li>
					<li><a href="http://wordpress.org/" title="<?php _e('Powered by WordPress, state-of-the-art semantic personal publishing platform.'); ?>">WordPress</a></li>
					<?php wp_meta(); ?>
				</ul>
				</li>
			
		</ul></div>
<a href="<?php echo $PHP_SELF; ?>?css=nopop" title="Click here to switch to non-popout menu" id="nopoplink">Popout Menu not working?</a>

<a href="<?php echo $PHP_SELF; ?>?" title="Click here to switch back to the popout-style menu" id="poplink">Back to Popout Menu</a>

</div>

