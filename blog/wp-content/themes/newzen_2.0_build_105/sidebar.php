<div id="container">
	<div id="content">
		<!-- about menu -->
		<h3 class="display" title="about"><a href="#">about</a></h3>
		<div style="overflow: hidden; opacity: 0.9999; visibility: visible; height: 1%;" class="stretcher">
		<img src="<?php bloginfo('stylesheet_directory'); ?>/images/avatar.jpg" width="50" height="50" align="left" hspace="5" vspace="5"><br>
		<?php newzen_aboutme(); ?>
		<br>
		</div>

		<!-- search menu -->
		<h3 class="display" title="search"><a href="#">search</a></h3>
	    <div style="overflow: hidden; opacity: 0; visibility: hidden; height: 0px;" class="stretcher">
		<p><center>
			<?php include (TEMPLATEPATH . '/searchform.php'); ?>
		</center><br></p>
		</div>

		<!-- navigation menu -->
		<h3 class="display" title="navigation"><a href="#">navigation</a></h3>
		<div style="overflow: hidden; opacity: 0; visibility: hidden; height: 0px;" class="stretcher">
			<p><div align="left">
			<?php wp_list_pages('sort_column=menu_order&title_li='); ?>
		</div></p>
		</div>
		
		<!-- archives menu -->
		<h3 class="display" title="archives"><a href="#">archives</a></h3>
		<div style="overflow: hidden; opacity: 0; visibility: hidden; height: 0px;" class="stretcher">
		<p>
		<div align="center" id="navmenu">
			<ul>
				<li><?php wp_get_archives('type=monthly'); ?></li> 
			</ul>
		</div>
		<br></p>
		</div>
		
		<!-- categories menu -->
		<h3 class="display" title="categories"><a href="#">categories</a></h3>
		<div style="overflow: hidden; opacity: 0; visibility: hidden; height: 0px;" class="stretcher">
		<p>
		<div align="left">
			<?php wp_list_cats('sort_column=name&optioncount=1&feed=RSS'); ?>
		</div>
		<br></p>
		</div>
		<!-- end sidebar menu -->
	</div>
</div>