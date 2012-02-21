<?php get_header(); ?>

	<div id="content" class="narrowcolumn">
			<?php
				// Here is the call to only make two posts show up on the homepage REGARDLESS of your options in the control panel
				//query_posts('showposts=3');
			?>
	<?php if (have_posts()) : ?>
		
		<?php while (have_posts()) : the_post(); ?>
				
			<div class="post" id="post-<?php the_ID(); ?>">
				<h2>	
				<?php foreach((get_the_category()) as $cat) {  if ($cat->cat_name == 'Noteworthy') { ?>
				<img src="<?php bloginfo('template_url'); ?>/images/star.png" alt="Favorite Entry"  /></span>
				<?php } } ?>
				<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a>				
				</h2>
				<?php /* Support for noteworthy plugin */ if (function_exists(nw_noteworthyLink)) { ?><span class="postmetadata"><?php nw_noteworthyLink($post->ID); ?></span><?php } ?> 

	  			<p class="postmetadata">
				<?php edit_post_link('<img src="'.get_bloginfo(template_directory).'/images/pencil.png" alt="Edit Link" align="absmiddle" />','<span class="editlink">','</span>'); ?>
				<img src="<?php bloginfo('stylesheet_directory'); ?>/images/time.png" align="absmiddle" alt="Published at" /> <?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> -->	
				&nbsp;
				<img src="<?php bloginfo('stylesheet_directory'); ?>/images/tag_blue.png" align="absmiddle" alt="Category" /> <?php the_category(', ') ?>	
				&nbsp;
				<img src="<?php bloginfo('stylesheet_directory'); ?>/images/comments.png" align="absmiddle" alt="Comments" /> <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>		
			
				</p>	
				<div class="entry">
					<?php the_content('Continue reading &raquo;'); ?>
				</div>

			</div>
	
		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
		</div>
		
	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
