<div class="post-info"><p class="numerals"><?php the_ID(); ?>
         </p><h2 class="post-title entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h2>
</div>
<div class="post-content entry-content">
	<?php the_content(); ?>
	<div class="post-info">
		<?php wp_link_pages(); ?>											
	</div>
	<div class="post-footer entry-meta"><b><?php _e('Posted'); ?>:</b> <abbr class="published" title="
      <?php the_time('Y-m-d\TH:i:sO') ?>
        "><?php if (function_exists('time_since')) {
echo time_since(abs(strtotime($post->post_date_gmt . " GMT")), time()) . " ago";
} else {
the_time('d M, Y');
} ?></abbr> | <?php comments_popup_link('No Comments', '1 Comment', '[%] Comments'); ?><br/>
    <b>
      <span class='entry-category'><?php _e('Categories'); ?>:
    </b> <?php the_category(' , '); ?>
    | <b><?php _e('Tags'); ?>:</b> 
    	<?php if (function_exists(the_tags)) {
    		the_tags("", ", ", "");
    	} elseif (function_exists(UTW_ShowTagsForCurrentPost)) {
							 UTW_ShowTagsForCurrentPost("commalist");
						 } ?></span> |
              <b><?php _e('By') ?>:</b> <span class='author vcard fn'><a class="url fn" href="<?php the_author_url(); ?>"><?php the_author(); ?></a></span>.
          
<?php edit_post_link('(edit this)'); ?>&nbsp;</div>
</div>
