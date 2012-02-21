<?php get_header(); ?>
<div id="content_wrapper">
	<div id="content_inner" class="clearfix">
		<div class="content_left">
			<div class="post">
				<h2>Nothing to see here</h2>
				<div class="entry">
				<p>You seem to have found a mislinked file or page.</p>
				</div>			
				<div class="clear"></div>
			</div>
		</div>
		<div class="content_right">
		<?php include (TEMPLATEPATH . '/main_right.php'); ?>
		</div>
	</div>
</div>
<div id="bottom_wrapper">
	<div id="bottom_inner" class="clearfix">
		<div class="bottom_left">
		<?php comments_template(); ?>
		</div>
		<?php include (TEMPLATEPATH . '/bottom_right.php'); ?>
		<div class="clear"></div>
		<div id="categories">
		<h3>Browse by Category</h3>
			<ul>
			<?php wp_list_cats('sort_column=name&optioncount=0'); ?>
			</ul>
		</div>
	</div>
</div>
<?php get_footer(); ?>