	<li class="<?php if ( is_home() or is_archive() or is_single() or is_paged() or is_search() or (function_exists('is_tag') and is_tag()) ) 
	{ ?>current_page_item<?php } else { ?>page_item<?php } ?>"><a title="<?php bloginfo('name'); ?>" href="<?php bloginfo('url'); ?>">Home</a></li>
	<?php wp_list_pages("depth=1&title_li=&sort_column={echo $pp_sort_pages}&exclude={echo $pp_exclude_pages}"); ?>