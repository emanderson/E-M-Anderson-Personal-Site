<?php get_header(); ?>
<?php get_sidebar(); ?>
	<div id="content">		
	<?php if (have_posts()) : ?>
		
		<?php while (have_posts()) : the_post(); ?>
		<div class="entrybox" id="post-<?php the_ID(); ?>">

		
			<div class="datetitlewrapper">
				<div class="datebox">
					<div class="datenum"><?php the_time('j') ?></div>
					<div class="dateother"><?php the_time('M Y') ?></div>
				</div>
				
				<div class="titlebox">				
					<div class="entrytitlebox"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></div>
					<div class="comtitlebox">Posted in <?php the_category(', ') ?> by <?php the_author() ?> at <?php the_time('g:i a'); ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></div>
				</div>
			</div>

			
			<div class="entrytext">
		<?php the_excerpt(); ?>
			</div>
		
		</div>
		
	<?php endwhile; ?>		
		
			<div class="nextbackbox">
				<div class="prevbox"><?php next_posts_link('&lt;&lt; Previous Entries') ?></div>
				<div class="nextbox"><?php previous_posts_link('Next Entries &gt;&gt;') ?></div>
			</div>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>

	

		</div>

<?php get_footer(); ?>