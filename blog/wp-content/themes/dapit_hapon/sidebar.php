	<div id="wrapper">	
		<div id="side">
		<div class="sidenavbox">
		<ul>
		
		<li class="pagelink">
			<ul class="pagelink">
				<li><a href="<?php echo get_settings('home'); ?>/">Home</a></li>
				<?php wp_list_pages('title_li='); ?>
			</ul>
		</li>

		<li class="list2">
			<?php include (TEMPLATEPATH . '/searchform.php'); ?>
		</li>
		
		<li class="list2">
		
		<!-- THIS IS WHERE YOU WILL PUT INFO ABOUT YOU. YOU CAN CHANGE "AUTHOR" TO YOUR NAME. -->
		<h2>Author</h2>
			<p class="list2">
			<!--THE TEXT ABOUT YOU BEGINS HERE -->
			A little something about you, the author. Nothing lengthy, just an overview. 
			<!-- AND END HERE -->
			</p> 
		</li>
		
		<li class="list2"><h2>Archives:</h2>
		<form id="archiveform" action=""><select name="archive_chrono" onchange="window.location =
		(document.forms.archiveform.archive_chrono[document.forms.archiveform.archive_chrono.selectedIndex].value);">
		<option value=''>Select Month</option>
		<?php get_archives('monthly','','option'); ?>
		</select>
		</form>
		</li>
		
		<li class="list2"><h2>Categories</h2>
			<ul class="linklist">
				<?php wp_list_cats('sort_column=name&optioncount=0&hierarchical=0'); ?>
			</ul>
		</li>
		
		<?php /* If this is the frontpage */ if ( is_home() ) { ?>				
				<li class="list2"><h2>Meta</h2>
			<ul class="linklist">
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
			<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
			<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
			<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
			<?php wp_meta(); ?>
			</ul>
		</li>
		<?php get_links_list(); ?>
	
			<?php } ?>

		</ul>
		
	</div>
</div>