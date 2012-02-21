<div class="post-info"><p class="post-date"><?php the_ID(); ?>
         </p><h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h2>
</div>
<div class="post-content">
	<?php the_content(); ?>
	<div class="post-info">
		<?php wp_link_pages(); ?>											
	</div>
	<div class="post-footer"><b><?php _e('Posted'); ?></b> <?php if (function_exists('time_since')) {
echo time_since(abs(strtotime($post->post_date_gmt . " GMT")), time()) . " ago";
} else {
the_time('d M, Y');
} ?> | <?php comments_popup_link('No Comments', '1 Comment', '[%] Comments'); ?><br/>
<b><?php _e('Categories'); ?>:</b> <?php the_category(' , '); ?>
<?php if (function_exists(UTW_ShowTagsForCurrentPost)) { ?>
							| <b><?php _e('Tags'); ?>:</b> <?php UTW_ShowTagsForCurrentPost("commalist") ?>.
						<?php } ?>
<?php edit_post_link('(edit this)'); ?>&nbsp;</div>
</div>