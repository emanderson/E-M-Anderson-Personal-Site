
	<div id="secondary_nav">
		
		<div id="secondary_nav_content">
		
		<ul>
		<?php if ( !function_exists('dynamic_sidebar')
			  || !dynamic_sidebar() ) : ?>	
		
		<li class="footerlist">	
		<h2>Categories</h2>
			<ul>
				<?php wp_list_categories('orderby=name&title_li='); ?>
			</ul>
		</li>
		
		
		<li class="taglist">
		<h2>Tags</h2>
				<div class="wp-tag-cloud">
				<?php wp_tag_cloud('format=flat&unit=px&smallest=10&largest=24'); ?>
				</div>
		</li>
		
		<li class="footerlist">
		<h2>Archives</h2>
			<ul>
				<?php wp_get_archives('format=html'); ?>
			</ul>
		</li>
		
		
		<li class="footerlist">
		<h2>Blogroll</h2>
			<ul>
				<?php wp_list_bookmarks('categorize=0&title_li=0&title_after=&title_before=');?>
			</ul>

		</li>
			
		<?php endif; ?>
		
	     </ul>
		</div>
		<div class="clear"></div>
	</div>
	
	<div id="footer">
	<div class="copyright">
	<p><a href="http://http://andreamignolo.com/ocular-professor/">Ocular Professor</a> by <a href="http://andreamignolo.com">Mignolo</a> &sect; Powered by 
		<a href="http://wordpress.org">WordPress</a>
	</p>
	</div>

</div>


</body>
<?php wp_footer(); ?>
</html>