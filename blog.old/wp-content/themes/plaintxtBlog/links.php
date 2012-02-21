<?php
/*
Template Name: Links
*/
?>
<?php 
	get_header();
	get_sidebar();
?>
 
<div id="content" class="narrowcolumn">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div id="post-<?php the_ID(); ?>" class="post">
		<div class="post-header">
			<h2 class="post-title"><?php the_title(); ?></h2>
		</div><!-- END POST-HEADER  -->
		<div class="post-entry">
			<?php the_content(); ?>
			<ul class="list">
<?php
	$link_cats = $wpdb->get_results("SELECT cat_id, cat_name FROM $wpdb->linkcategories");
	foreach ($link_cats as $link_cat) {
?>
				<li id="page-linkcat-<?php echo $link_cat->cat_id; ?>">
					<h2><?php echo $link_cat->cat_name; ?></h2>
					<ul>
						<?php get_links($link_cat->cat_id, '<li>', '</li>', ' &mdash; ', FALSE, '', TRUE, FALSE, -1, TRUE); ?>
					</ul>
				</li>
<?php } ?>
			</ul>
			<?php edit_post_link('Edit this page', '<p>[', ']</p>'); ?>
		</div><!-- END POST-ENTRY -->
		<!-- <?php trackback_rdf(); ?> -->
	</div><!-- END POST -->

<?php endwhile; endif; ?>

</div><!-- END CONTENT -->

<?php get_footer(); ?>