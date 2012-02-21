<?php get_header(); ?>
	
	<div id="primary">
		
		<?php if(have_posts()) : ?>
		
		<?php while(have_posts()) : the_post(); ?>
		
		<div class="entry" id="post-<?php the_ID(); ?>">
			
			<h1 class="entry-title"><a href="<?php echo get_permalink($post->post_parent); ?>" rev="attachment"><?php echo get_the_title($post->post_parent); ?></a> &rarr; <?php the_title(); ?></h1>
			
			<div class="entry-byline">
				<span class="entry-date"><abbr class="updated" title="<?php the_time('Y-m-d\TH:i:sO'); ?>"><?php the_time('M jS, Y'); ?></abbr></span>
				<address class="author vcard"><?php _e('by '); ?><a class="url fn" href="<?php the_author_url(); ?>"><?php the_author(); ?></a>. </address>
				<?php edit_post_link('Edit', '[', ']'); ?>
			</div>
				
			<div class="entry-content">
				<p class="attachment"><a href="<?php echo wp_get_attachment_url($post->ID); ?>"><?php echo wp_get_attachment_image( $post->ID, 'medium' ); ?></a></p>
				<div class="caption"><?php if ( !empty($post->post_excerpt) ) the_excerpt(); // this is the "caption" ?></div>
				<?php the_content('Continue reading...'); ?>
			</div>
			
			<div class="gnavigation">
				<div class="gnavleft"><?php previous_image_link() ?></div>
				<div class="gnavright"><?php next_image_link() ?></div>
				<div class="clear"></div>
			</div>
			
		</div><!--.entry-->
		
		<?php comments_template(); ?>
		
		<?php endwhile; ?>
		
		<?php include (TEMPLATEPATH . '/navigation.php'); ?>
		
		<?php else : ?>
		
		<div class="entry">
			<h2 class="entry-title"><?php _e('Not Found'); ?></h2>
			<div class="entry-content">
			<p>Sorry, what you are looking for isn't here.</p>
			<?php include (TEMPLATEPATH . "/searchform.php"); ?>
			</div>
		</div>
		
		<?php endif; ?>	

	</div><!--#primary-->
	
<?php get_sidebar(); ?>
	
<?php get_footer(); ?>