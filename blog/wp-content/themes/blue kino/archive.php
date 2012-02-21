<?php get_header(); ?>

<div id="content">
   <?php if (have_posts()) : ?>
   <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
   <?php while (have_posts()) : the_post(); ?>
	<div class="entry">
   	<div class="rounded-box">
	      <div class="top-left-corner"><div class="top-left-inside">&bull;</div></div>
   	   <div class="top-right-corner"><div class="top-right-inside">&bull;</div></div>
      	<div class="bottom-left-corner"><div class="bottom-left-inside">&bull;</div></div>
	      <div class="bottom-right-corner"><div class="bottom-right-inside">&bull;</div></div>
   	   <div class="box-contents">
 			    <h2><a href="<?php the_permalink() ?>" title="Permalink"><?php the_title(); ?></a></h2>
				<?php the_content(); ?>
				<div class="pie">
					<span class="date"><?php the_time('j / F / Y') ?></span>&nbsp;
					<span class="categories"><?php the_category(', '); ?></span>&nbsp;
					<span class="comments">
						<?php comments_popup_link('Comentarios (0)', 'Comentarios (1)', 'Comentarios (%)'); ?>
					</span>
				</div>
			</div>
		</div>
	</div>
   <?php endwhile; ?>
   <?php previous_posts_link('+ recientes') ?>
	<?php next_posts_link('+ antiguos') ?>
   <?php endif; ?>
</div>
<?php get_footer(); ?>
