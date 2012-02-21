<?php get_header() ?>    
  <div id="main" class="clearfix">
    <div id="content">
        <div class="inner">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					  <div class="calendar"><small><?php the_time('M'); ?></small> <strong><?php the_time('j'); ?></strong></div>
							<h1 class="post"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h1>       
							<div class="posted">Posted on <span><?php the_time('l, F j, Y'); ?></span> in <span><?php the_category(', ') ?></span></div>
						<br class="clearboth" />
						<?php the_content(); ?>
						<div class="postfooter"><span class="comments"><?php comments_popup_link('Comments (0)', 'Comment (1)', 'Comments (%)'); ?></span> | <?php edit_post_link('Edit'); ?>
						<?php if (function_exists('the_tags')) { ?>
						  <?php the_tags('<span class="tags">Tags: ', ', ', '</span>'); ?>
						<?php } ?>
						</div>
					</div>
	
			<?php endwhile; ?>
	
			<?php else : ?>
				<h1>Not Found</h1>
				<p>Sorry, but you are looking for something that isn't here.</p>
				<?php get_search_form(); ?>
				<div class="postmeta"></div>
			<?php endif; ?>
				<div class="clearboth"></div>
				<div class="navigation">
					<div class="alignleft"><?php next_posts_link('&laquo; Previous Posts') ?></div>
					<div class="alignright"><?php previous_posts_link('Next Posts &raquo;') ?></div>
				</div>
			</div>
    </div>
      
	<?php get_sidebar() ?>
    <div class="clearboth"></div>
  </div>
  
<?php get_footer() ?>