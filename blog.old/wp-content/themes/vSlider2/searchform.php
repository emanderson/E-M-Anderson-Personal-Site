<!-- 
This is the search box 
This piece should be included wherever search is needed
-->

<div class="searchform">
	<form name="searchform" method="get" id="searchform" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<div>
		<input class="search-box" type="text" 
			name="s" 
			value="<?php if($s != '')  echo wp_specialchars($s, 1); else echo get_option('vSlider_text_search'); ?>" 			
			onfocus="if(this.value=='<?php echo get_option('vSlider_text_search') ?>') this.value=''"
			onblur="if(this.value=='') this.value='<?php echo get_option('vSlider_text_search') ?>'"/>
		<input type="hidden" id="searchsubmit" value="Search" />
	</div>
	</form>
</div>