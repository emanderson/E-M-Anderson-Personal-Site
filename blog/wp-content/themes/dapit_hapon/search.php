<?php get_header(); ?>
<?php get_sidebar(); ?>
<div id="content_pages">	
<?php if (have_posts()) : ?>
<div class="entrybox">			
			<div class="pagesheader">
				<div class="pagetitlebox">
					Search Results
				</div>
<br /><br />
<?php while (have_posts()) : the_post(); ?>
		<div class="archivetext" id="post-<?php the_ID(); ?>">
					<span class="titleboxarchive"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></span><br />
					<span class="archivedatebox"><br /><?php the_time('l, F jS, Y') ?><br />
					<?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></span><br />
					<?php the_excerpt(); ?>
		</div>
<?php endwhile; ?>

			<div class="nextbackbox">
				<div class="prevbox"><?php next_posts_link('&lt;&lt; Previous Entries') ?></div>
				<div class="nextbox"><?php previous_posts_link('Next Entries &gt;&gt;') ?></div>
			</div>
</div>
</div>
			
	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>

	<?php endif; ?>
  

	

</div>
<?php get_footer(); ?>