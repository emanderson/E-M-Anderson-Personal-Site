<?php 
get_header();
?>

<div id="searchresult">

<?php if (have_posts()) : ?>

<h2>Search results for &ldquo;<?php echo wp_specialchars($s, 1); ?>&rdquo;</h2>

		<ul>
		<?php while (have_posts()) : the_post(); ?>
			<li><span class="date"><?php the_time('m.j') ?></span> <a href="<?php the_permalink() ?>"><?php the_title(); ?></a> 
				 posted in 
				<?php the_category(', ') ?></li>
			<?php $results++; ?>
		<?php endwhile; ?>
		</ul>

	<div class="navigation">
		<div class="left"><?php next_posts_link('<span>&laquo;</span> Previous Entries') ?></div>
		<div class="right"><?php previous_posts_link('Next Entries <span>&raquo;</span>') ?></div>
		<div class="clear"></div>
	</div>
		
<?php else : ?>
<p><?php _e('Sorry, no posts matched your search. Try some other words.'); ?></p>
<?php endif; ?>


</div>


<div id="infomenu">
	<h2>Search Details</h2>
	<p>You searched for &ldquo;<?php echo wp_specialchars($s, 1); ?>&rdquo; in <?php bloginfo('name'); ?>.
	</p>

</div>

</div> <!-- closes container -->

<?php include(TEMPLATEPATH . '/bottombar.php') ?>

<?php get_footer(); ?>
