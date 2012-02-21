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

<?php comments_template(); // Get wp-comments.php template ?>
<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

	<div class="navigation">
		<div class="left"><?php previous_post('&laquo; %','','yes') ?></div>
		<div class="right"><?php next_post(' % &raquo;','','yes') ?></div>
		<div class="clear"></div>
	</div>

</div>


<div id="infomenu">
	<h2>Entry Details</h2>
	<p>You&rsquo;re currently reading &ldquo;<?php the_title(); ?>,&rdquo; an entry on <?php bloginfo('name'); ?></p>
	<dl>
		<dt>Published:</dt>
		<dd><?php the_time('F d, Y');?> around <?php the_time('ga') ?></dd>
	</dl>
	<dl>
		<dt>Category:</dt>
		<dd><?php the_category(', ') ?></dd>
	</dl>
	<dl>
		<dt>Comments:</dt>
		<dd><?php comments_number(__('No comments yet'), __('1 comment so far'), __('% comments so far')); ?> </dd>
	</dl>
	<?php edit_post_link('Edit this entry.', '<dl><dt>Edit:</dt><dd> ', '</dd></dl>'); ?>

</div>

</div> <!-- closes container -->


<?php include(TEMPLATEPATH . '/bottombar.php') ?>


<?php get_footer(); ?>
