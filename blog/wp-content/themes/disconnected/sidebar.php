<ul>
<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar(inward) ) : ?>
<li><strong><?php _e('Search'); ?></strong></li>
<li>
			<form id="searchform" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<div style="text-align:left">
					<p><input type="text" name="s" id="s" size="14" />&nbsp;<input type="submit" name="submit" value="<?php _e('Go'); ?>" /></p>
				</div>
			</form></li>
<li><strong>Subscribe:</strong></li>
		<li>
			<a href="<?php bloginfo('rss2_url'); ?>" title="Subscribe to my feed" rel="alternate"><img src="wp-content/themes/disconnected/img/feed-icon-50x50-aqua.gif" alt="feed icon aqua" /></a></li>

<?php if ((function_exists('related_posts')) && is_single() && ($notfound != '1')) { ?> 
	<li><strong><?php _e('Related Entries'); ?></strong></li>
		
			<?php related_posts(10, 0, '<li>', '</li>', '', '', false, false); ?>
		
	</div>
	<?php } ?>
	<?php if ((function_exists('blc_latest_comments'))) { ?> 
	<li><strong><?php _e('Comments'); ?></strong></li>
		
			<?php blc_latest_comments('5','3','false'); ?>
		
	
	<?php } ?>
<li><strong><?php _e('Latest'); ?></strong></li>
		
		
			<?php wp_get_archives('type=postbypost&limit=10'); ?>
<?php if (function_exists('wp_theme_switcher')) { ?>
<li><strong><?php _e('Themes'); ?>:</strong></li>
       <li> <?php wp_theme_switcher('dropdown'); ?>
  </li><?php } ?>
	<?php endif; ?>	
	</ul>