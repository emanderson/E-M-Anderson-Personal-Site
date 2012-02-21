<!--
	Default sidebar template
-->

	<div id="sidecolumn">
		
		<div class="sidebar">
			<!-- Search -->
			<?php include (TEMPLATEPATH . '/searchform.php'); ?>
		</div>

		<!-- Sidebar quick about block -->
		<?php if (get_option('vSlider_quickabout_enabled')) { ?>
			<div class="hr"></div>		

			<div class="sidebar">
				<?php echo stripslashes(get_option('vSlider_quickabout_text')) ?>
			</div>
		<?php } ?>
		
		
		<!-- Show subpages, if available -->		
		<?php 
			if (is_page() && $post) {
			
				$current_page = $post->ID;
				while($current_page) {
					$page_query = $wpdb->get_row("SELECT ID, post_title, post_parent FROM $wpdb->posts WHERE ID = '$current_page'");
					$current_page = $page_query->post_parent;
				}
				
				$parent_id = $page_query->ID;
				$parent_title = $page_query->post_title;

				$test_for_child = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_parent = '$parent_id'");

				if($test_for_child) { 
		?>
				
			<div class="hr"></div>
			
			<div class="sidebar">			
				<a href="<?php echo get_settings('siteurl') . '/' . get_page_uri($parent_id) ?>"><h2><?php echo $parent_title; ?> </h2>	</a>		
				<ul>
					<?php wp_list_pages('sort_column=menu_order&title_li=&child_of='. $parent_id); ?>
				</ul>
			</div>
		<?php } } ?>
				
				
		<!-- Check if WeatherIcon is installed	-->
		<?php if (function_exists('WeatherIcon')) { ?>
			
			<div class="hr"></div>
	
			<div class="sidebar">
				<!-- Weather -->
				<h2><?php echo get_option('vSlider_text_weather') ?></h2>
				<ul class="weather">
					<?php WeatherIcon('EHEH') ?>			
				</ul>
			</div>
		<?php } ?>
		
		
		
		<!-- Ads -->		
		<?php if (function_exists('adsense_deluxe_ads')) { ?>
			<div class="hr"></div>
			
			<div class="sidebar">
				<h2><?php echo get_option('vSlider_text_ads') ?></h2>
				<ul>
					<li>
						<?php adsense_deluxe_ads('sidebar_ads'); ?>
					</li>
				</ul>	
			</div>
		<?php } ?>
		
		
		<!-- Check if Gallery2 is installed	-->
		<?php if (function_exists('g2_sidebarimageblock')) { ?>
			
			<div class="hr"></div>
	
			<div class="sidebar">
				<!-- Photo Block -->
				<h2><?php echo get_option('vSlider_text_sidebarphoto') ?></h2>				
				
				<div class="centered">
					<?php print g2_sidebarimageblock(); ?>
				</div>
			</div>
		<?php } ?>
		

			
		<div class="hr"></div>

		<div class="sidebar">
			<!-- Categories -->
			<h2><?php echo get_option('vSlider_text_categories') ?></h2>
			<ul>
				<?php 
					$rssimage = get_bloginfo('template_directory') . "/images/rss.gif";
				?>
				<?php list_cats(true, '', 'name', 'asc', '', true, false, true, true, true, true, 0, '',false,'',$rssimage,'',true) ?>
			</ul>
		</div>
			
		<div class="hr"></div>

		<div class="sidebar">
			<!-- Archives -->
			<h2><?php echo get_option('vSlider_text_archives') ?></h2>
			<ul>
				<?php wp_get_archives('type=monthly&show_post_count=1'); ?>
			</ul>
		</div>
		
		<div class="hr"></div>

		<div class="sidebar">
			<!-- Links -->
			<h2><?php echo get_option('vSlider_text_links') ?></h2>
			<ul>
				<?php get_links_list(); ?>			
			</ul>
			
			<!-- Sponsered links, if plugin is available -->
			<?php if (function_exists('adsense_deluxe_ads')) { ?>			
				<ul>
					<li>		
						<h2>Sponsored links</h2>
					</li>	
					<li>		
						<div class="center">
						<?php adsense_deluxe_ads('sidebar_links'); ?></div>
					</li>		
				</ul>			
			<?php } ?>
		</div>

		
		<div class="hr"></div>

		<div class="sidebar">
			<!-- Login -->
			<ul>
				<li>
					<!-- Login -->
					<?php wp_loginout(); ?> 
				</li>
				<?php wp_register(); ?>
			</ul>
		</div>
	</div>

