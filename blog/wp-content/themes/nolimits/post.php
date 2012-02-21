<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h2>	
	<?php the_content(); ?>	
	<div class="posted"><?php the_time('M d Y h:i a'); ?>
	|
	<?php the_category(' and ');?>
	|	
	<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?><?php edit_post_link(' | edit this'); ?>
	</div>
<?php comments_template(); // Get wp-comments.php template ?>
