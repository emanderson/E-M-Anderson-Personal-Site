	<?php get_header();?>	
	<div id="main">
	<div id="content">
		
		<div class="page">
		<div class="page-info"><h2 class="page-title">404 - Not Found</h2>
		</div>

			
				
	
				These aren't the droids you're looking for.  Try using the search function at the right, or check out some other recent posts.
	
			</div>
		</div>
	  
	</div>
	<div id="sidebar">
<h2><?php _e('Navigation'); ?></h2>
<ul>
<li><strong><?php _e('Search'); ?></strong></li>
<li>
			<form id="searchform" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<div style="text-align:left">
					<p><input type="text" name="s" id="s" size="14" />&nbsp;<input type="submit" name="submit" value="<?php _e('Go'); ?>" /></p>
				</div>
			</form></li>

<?php wp_list_pages('title_li=<strong>Pages</strong>' ); ?>
</ul>
<h2><?php _e('Elsewhere'); ?></h2>
<ul>

	<?php if ((function_exists('blc_latest_comments'))) { ?> 
	<li><strong><?php _e('Comments'); ?></strong></li>
		
			<?php blc_latest_comments('5','3','false'); ?>
		
	
	<?php } ?>
<li><strong><?php _e('Latest'); ?></strong></li>
		
		
			<?php wp_get_archives('type=postbypost&limit=10'); ?>
		
</ul>
	</div>

<?php get_footer();?>
</div>
</div>
</body>
</html>