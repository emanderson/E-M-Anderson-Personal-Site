<?php /* Fusion/digitalnature */ ?>

<?php get_header(); ?>

<!-- main content -->
<div id="main-content">

<?php get_search_form(); ?>

<h2>Archives by Month:</h2>
	<ul>
		<?php wp_get_archives('type=monthly'); ?>
	</ul>

<h2>Archives by Subject:</h2>
	<ul>
		 <?php wp_list_categories(); ?>
	</ul>

</div>
<!-- /main content -->

</div>
<!-- /main -->
</div>
<!-- /main wrapper -->

<?php get_sidebar(); ?>

<!-- clear main & sidebar sections -->
<br clear="left" />
<!-- /clear main & sidebar sections -->

<?php get_footer(); ?>