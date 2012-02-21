	<center>
	<div id="shelf">
	 <div style="hegiht: 500px; width: 675px;" class="well">
		<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(2) ) : else : ?>
		<?php /* There is no need to make identical classes in CSS, so if there is no
             enabled widgets we are useing their style class so the default shelf bar
             will sill look awesome */ ?>
             

  			<?php wp_list_pages('title_li=<div class="widget-title">Pages</div>' ); ?>


			<div id="categories" class="widget widget_categories">
       <div class="widget-title">Categories</div>
				<ul>
				<?php wp_list_cats('sort_column=name&optioncount=1&hierarchical=0'); ?>
				</ul>
			</div>
			
      <div id="searchform" class="widget widget_wpsearch">
       <div class="widget-title">Looking glass</div>
				<?php include (TEMPLATEPATH . '/searchform.php'); ?>
			 </div>
			</div>

		<?php endif; ?>
	 </div>
	</div>
</center>
<div id="handle">
 <a href="#" onClick="shelffx.toggle(); blur(); return false;" class="btn-nav-search">Navigate/Search</a>
</div>
