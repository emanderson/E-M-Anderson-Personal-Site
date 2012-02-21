<?php get_header() ?>    
  <div id="main" class="clearfix">
  	<div id="content">
		  <div class="inner">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<h1 class="post"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h1>       
							<div class="posted">Posted on <span><?php the_time('l, F j, Y'); ?></span> in <span><?php the_category(', ') ?></span></div>
							<?php the_content(); ?>
						<div class="postfooter"><?php edit_post_link('Edit'); if(edit_post_link) echo " | "; ?>
						<?php if (function_exists('the_tags')) { ?>
						  <?php the_tags('<span class="tags">Tags: ', ', ', '</span>'); ?>
						<?php } ?>
						</div>
						<div class="navigation">
							<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
							<div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
						</div>
						
				<?php comments_template(); ?>
				
				</div>
			<?php endwhile; ?>
			
			<?php else : ?>
				<h1>Not Found</h1>
				<p>Sorry, but you are looking for something that isn't here.</p>
				<?php get_search_form(); ?>
				<div class="postmeta"></div>
			<?php endif; ?>
			</div>
		</div>
	<?php get_sidebar() ?>
    <div class="clearboth"></div>
  </div>
  
<?php get_footer() ?>