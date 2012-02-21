		<div id="primary" class="sidebar">
			<ul>
		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar() ) :  ?>
		<?php if ( !is_home() || is_paged() ) { ?>
				<li id="home-link">
					<h3><a href="<?php bloginfo('home') ?>" title="<?php echo wp_specialchars(get_bloginfo('name'), 1) ?>"><?php _e('&lsaquo; Home', 'veryplaintxt') ?></a></h3>
				</li>
		<?php } ?>
				<li id="search">
					<h3><label for="s"><?php _e('Search', 'veryplaintxt') ?></label></h3>
					<form id="searchform" method="get" action="<?php bloginfo('home') ?>">
						<div>
							<input id="s" name="s" type="text" value="<?php echo wp_specialchars(stripslashes($_GET['s']), true) ?>" size="10" />
							<input id="searchsubmit" name="searchsubmit" type="submit" value="<?php _e('Find', 'veryplaintxt') ?>" />
						</div>
					</form>
				</li>
<?php wp_list_pages('title_li=<h3>'.__('Contents').'</h3>&sort_column=post_title' ) ?>

				<li id="categories">
					<h3><?php _e('Categories', 'veryplaintxt'); ?></h3>
					<ul><?php if ( function_exists('wp_list_categories') ) : 
wp_list_categories('title_li=&orderby=name&use_desc_for_title=1&hierarchical=1'); else :
wp_list_cats('sort_column=name&hierarchical=1'); endif; ?>

					</ul>
				</li>
				<li id="archives">
					<h3><?php _e('Archives', 'veryplaintxt') ?></h3>
					<ul>
<?php wp_get_archives('type=monthly') ?>

					</ul>
				</li>
<?php widget_veryplaintxt_links() ?>

				<li id="rss-links">
					<h3><?php _e('RSS Feeds', 'veryplaintxt') ?></h3>
					<ul>
						<li><a href="<?php bloginfo('rss2_url') ?>" title="<?php echo wp_specialchars(get_bloginfo('name'), 1) ?> RSS 2.0 Feed" rel="alternate" type="application/rss+xml"><?php _e('All posts', 'veryplaintxt') ?></a></li>
						<li><a href="<?php bloginfo('comments_rss2_url') ?>" title="<?php echo wp_specialchars(bloginfo('name'), 1) ?> Comments RSS 2.0 Feed" rel="alternate" type="application/rss+xml"><?php _e('All comments', 'veryplaintxt') ?></a></li>
					</ul>
				</li>
				<li id="meta">
					<h3><?php _e('Meta', 'veryplaintxt') ?></h3>
					<ul>
						<?php wp_register() ?>
						<li><?php wp_loginout() ?></li>
						<?php wp_meta() ?>
					</ul>
				</li>
		<?php endif; // END SIDEBAR WIDGETS  ?>
			</ul>
		</div>