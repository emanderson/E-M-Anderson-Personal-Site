<p class="post-date"><?php the_time('D j M Y'); ?></p>
<div class="post-info">
	<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h2>
	<p><?php _e('Posted by '); ?><?php the_author(); ?><?php _e(' under '); ?><?php the_category(', '); ?><?php edit_post_link(' (edit this)'); ?>
	<br/>
	<?php comments_popup_link('No Comments', '1 Comment', '[%] Comments'); ?></p>
</div>
<div class="post-content">
	<?php the_content(); ?>
	<div class="post-info">
		<?php wp_link_pages(); ?>											
	</div>
	<!--
		<?php trackback_rdf(); ?>
	-->
	<div class="post-footer">&nbsp;</div>
</div>