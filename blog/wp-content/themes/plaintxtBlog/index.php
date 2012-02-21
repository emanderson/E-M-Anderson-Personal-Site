<?php 
	get_header();
	get_sidebar();
?>

<div id="content" class="narrowcolumn">
 
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

	<div id="post-<?php the_ID(); ?>" class="post">
		<div class="post-header">
			<h2 class="post-title"><a href="<?php the_permalink() ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<h3 class="post-date"><?php the_time('d-M-y') ?></h3>
		</div><!-- END POST-HEADER  -->
		<div class="post-entry">
			<?php the_content(); ?>
			<?php link_pages('<p style="font-weight:bold;">Pages: ', '</p>', 'number'); ?>
		</div><!-- END POST-ENTRY -->
		<div class="post-metadata">
			<p class="post-footer">Filed in <?php the_category(', ') ?> | <a href="<?php the_permalink() ?>" rel="permalink" title="Permalink to <?php the_title(); ?>">Permalink</a> | <?php comments_popup_link('Comments (0) &raquo;', 'Comments (1) &raquo;', 'Comments (%) &raquo;'); ?> <?php edit_post_link('Revise', ' | ', ''); ?></p>
		</div><!-- END POST-METADATA -->
		<!-- <?php trackback_rdf(); ?> -->
	</div><!-- END POST -->	

<?php endwhile; ?>

	<div class="navigation">
		<div class="alignleft"><?php next_posts_link('&laquo; Older posts') ?></div>
		<div class="alignright"><?php previous_posts_link('Newer posts &raquo;') ?></div>
		<div class="middle"><a href="<?php echo get_settings('home'); ?>/" title="Home: <?php bloginfo('name'); ?>">Home</a></div>
	</div><!-- END NAVIGATION -->

<?php else : ?>
<?php /* INCLUDE FOR ERROR TEXT */ include (TEMPLATEPATH . '/errortext.php'); ?>
<?php endif; ?>

</div><!-- END CONTENT -->

<?php get_footer(); ?>