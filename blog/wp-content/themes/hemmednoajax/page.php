<?php 
get_header();
?>

<div id="singlecontent">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<!-- <?php the_date('','<h2>','</h2>'); ?> -->

	<div class="post">
		 <h3 class="posttitle" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
		
		<div class="postcontent">
			<?php the_content() ?>
			<?php wp_link_pages(); ?>
		</div>
			
		<!--
		<?php trackback_rdf(); ?>
		-->
		
	</div>

<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php posts_nav_link(' &#8212; ', __('&laquo; Previous Page'), __('Next Page &raquo;')); ?>

</div>

<div id="infomenu">
	<h2>Page Info</h2>
	<p>You&rsquo;re currently reading &ldquo;<?php the_title(); ?>,&rdquo; a page on <?php bloginfo('name'); ?></p>
	<dl>
		<dt>Published:</dt>
		<dd><?php the_time('F d, Y');?> around <?php the_time('ga') ?></dd>
	</dl>
	<?php edit_post_link('Edit this page.', '<dl><dt>Edit:</dt><dd> ', '</dd></dl>'); ?>

</div>

</div> <!-- closes container -->

<?php include(TEMPLATEPATH . '/bottombar.php') ?>

<?php get_footer(); ?>
