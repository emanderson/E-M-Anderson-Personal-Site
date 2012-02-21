<div class="archived_right">
	<div class="archived_sub_right">
	<h3>Search</h3>
	<?php include (TEMPLATEPATH . '/searchform.php'); ?>
	</div>
	<div class="archived_sub_right">
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(2) ) : ?>
	<?php endif; ?>
	</div>
</div>