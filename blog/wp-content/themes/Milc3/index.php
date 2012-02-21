<?php get_header(); ?>

	<div id="content" class="narrowcolumn">

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
		</div>

	<?php if (have_posts()) : ?>
		
		<?php while (have_posts()) : the_post(); ?>
				
				<div class="alt">
				<h2 class="archivelist" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>
					<small> 
						<?php the_time('j F Y') ?> | 
						<?php the_time('G:i') ?> | 
						<?php the_category(', ') ?> | 
						<?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?>
						
						
			  	</small>
				
				<div class="entry">
					<?php the_excerpt() ?>
				</div>
		

			</div>
      <br /><br />
						

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
		</div>

<!--<br /><br />
What are you doing here? Quick! Get <a href="http://www.damn.be">out of here</a>!-->
		
	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
