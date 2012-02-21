<div class="post-title"><em><?php the_category('&amp;');?></em><?php the_time('d M Y h:i a'); ?></div>
<p class="post-info"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a><?php edit_post_link('edit post'); ?></p>
<div class="post-content">
	<?php the_content(); ?>
	<p class="post-info-co">
		<?php wp_link_pages(); ?>											
	</p>
	<!--
		<?php trackback_rdf(); ?>
	-->
</div>
<div class="post-footer"><?php comments_popup_link(__('No Comments Yet'), __('Comments (1)'), __('Comments (%)')); ?></div>