<?php 
get_header();
?>

<div id="searchresult">

	<?php if (have_posts()) : ?>
	
	<?php /* If this is a category archive */ if (is_category()) { ?>				
	<h2>Entries in the '<?php echo single_cat_title(); ?>' category</h2>
			
	<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
	<h2>Entries written on <?php the_time('F jS, Y'); ?></h2>
			
	<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
	<h2>Entries written in <?php the_time('F Y'); ?></h2>
	
	<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
	<h2>Entries written in <?php the_time('Y'); ?></h2>

	<?php } ?>

		<ul>
		<?php while (have_posts()) : the_post(); ?>
			<li><span class="date"><?php the_time('m.d') ?></span> <a href="<?php the_permalink() ?>"><?php the_title(); ?></a> 
				 posted in 
				<?php the_category(', ') ?></li>
			<?php endwhile; ?>
		</ul>
		
	<div class="navigation">
		<div class="left"><?php next_posts_link('<span>&laquo;</span> Previous Entries') ?></div>
		<div class="right"><?php previous_posts_link('Next Entries <span>&raquo;</span>') ?></div>
		<div class="clear"></div>
	</div>
		
<?php else : ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

</div>

<div id="infomenu">
	<h2>Archive Details</h2>
<p><?php
$numposts = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_status = 'publish'");
if (0 < $numposts) $numposts = number_format($numposts);

$numcats = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->categories");
if (0 < $numcats) $numcats = number_format($numcats);
?>
<?php printf(__('There are currently %1$s posts contained within %3$s categories. Have fun digging.'), $numposts, 'edit.php', $numcats, 'categories.php'); ?>
</p>
</div>

</div> <!-- closes container -->
<?php include(TEMPLATEPATH . '/bottombar.php') ?>

<?php get_footer(); ?>
