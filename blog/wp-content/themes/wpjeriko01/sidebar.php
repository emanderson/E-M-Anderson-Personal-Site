			<div id="sidebar">
			<?php if(!is_search()) {
				$search_text = "search this site";
			} else {
				$search_text = "$s";
			} ?>
		<form method="get" id="searchform" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<fieldset>
			<input type="text" value="<?php echo wp_specialchars($search_text, 1); ?>" name="s" id="s" onfocus="if (this.value == 'search this site') {this.value = '';}" onblur="if (this.value == '') {this.value = 'search this site';}" />
			<input type="submit" id="searchsubmit" style="display:none;" value="go" />
			</fieldset>
		</form>

<?php if ( !function_exists('dynamic_sidebar')
	|| !dynamic_sidebar() ) : ?>

				<h2>Meta</h2>
				<ul id="about">
				</ul>

				<h2>Categories</h2>
				<ul id="categories">
					<?php wp_list_cats('children=0'); ?>
				</ul>

				<h2>Archive</h2>
				<ul id="archive">
					<?php wp_get_archives('title_li='); ?>
				</ul>

				<h2>Feeds</h2>
				<ul id="feeds">
					<li><a href="<?php bloginfo('rss_url'); ?>" title="<?php bloginfo('name'); ?> Article Feed">Article Feed</a></li>
					<li><a href="<?php bloginfo('comments_rss2_url'); ?>" title="<?php bloginfo('name'); ?> Comments Feed">Comments Feed</a></li>
				</ul>
<? endif; ?>

			</div>
			<div class="clearfix"></div>

