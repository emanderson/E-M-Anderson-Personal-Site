	<div id="sidebar">
		<ul>
			<li>Search
				<?php include (TEMPLATEPATH . '/searchform.php'); ?>
			</li>

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

			
			<?php if (is_page())	wp_list_pages('title_li=Pages' ); ?>

			<li>
	   		<?php _e('Categories'); ?>
				<ul>
	      	<?php wp_list_cats('sort_column=name&optioncount=1&title_li=' . __('Categories') ); ?>
				</ul>
			</li>
		
			<li>Archives
				<ul>
				<?php wp_get_archives('type=monthly'); ?>
				</ul>
			</li>

				<?php
				 $link_cats = $wpdb->get_results("SELECT cat_id, cat_name FROM $wpdb->linkcategories");
				 foreach ($link_cats as $link_cat) {
				?>
				  <li id="linkcat-<?php echo $link_cat->cat_id; ?>"><?php echo $link_cat->cat_name; ?>
				   <ul>
				    <?php wp_get_links($link_cat->cat_id); ?>
				   </ul>
				  </li>
				<?php } ?>

				<li>Meta
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
					<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
					<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
					<?php wp_meta(); ?>
				</ul>
				</li>
			
		</ul>
	</div>

