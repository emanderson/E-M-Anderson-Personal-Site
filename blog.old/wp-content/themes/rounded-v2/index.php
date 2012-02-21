<?php 
get_header();
?>
<!-- this was to download zip file from offcicial theme's page
i left the image used, feel free to modify it
-->














<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


	
<div class="post">
	 <div class="postop"><div class="pheadfill">&nbsp;</div></div>

							
							
							<div class="storycontent">

									 <h3 class="storytitle" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a> <?php the_date('','<span class="date">','</span>'); ?></h3>

									<div class="meta"><?php _e("Filed under:"); ?> <?php the_category(',') ?> &#8212; <?php the_author() ?> @ <?php the_time() ?> <?php edit_post_link(__('Edit This')); ?>
									</div><!-- end META -->

								<?php the_content(__('(more...)')); ?>

<div class="reset">&nbsp;</div>

							</div><!-- end STORYCONTENT -->

						

							
							
							<!--
							<?php trackback_rdf(); ?>
							-->


</div><!-- end POST -->

<div class="feedback">
									<?php comments_popup_link(__('<span class="nocomment">no</span> <span class="nextcomments"><span class="noflavor">com</span>ment</span>'), __('<span class="acomment">1</span> <span class="nextcomments"><span class="oneflavor">Com</span>ment</span>'), __('<span class="arecomments">% </span><span class="nextcomments"><span class="areflavor">Com</span>ments</span>')); ?>
							</div><!-- end FEEDBACK -->



<?php comments_template(); // Get wp-comments.php template ?>


<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?php
ob_start();
	bloginfo('template_directory');
	$path = ob_get_clean();
?>
<div id="pagination">
<?php posts_nav_link('&nbsp;','<img src="'.$path.'/img/previous.gif" alt="Previous page"/>','<img src="'.$path.'/img/next.gif" alt="Next page" />') ?>
</div>

<?php get_footer(); ?>