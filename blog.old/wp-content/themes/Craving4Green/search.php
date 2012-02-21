<?php get_header(); ?>
<div id="main">
		<div id="content">
		<?php if ($posts) { ?>	
		<?php $post = $posts[0]; /* Hack. Set $post so that the_date() works. */ ?>
		<div class="post">
			<h2 class="post-title">Search Results for '<?php echo $s; ?>'</h2>			
			<p class="day-date">Did you find what you wanted ?</p>		
		</div>
		<?php } ?>
			<?php if ($posts) : foreach ($posts as $post) : start_wp(); ?>
			<div class="post">
				<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<p class="day-date">Posted by <em><?php the_author_posts_link() ?></em> on <em><?php the_time('d M Y'); ?></em> | Tagged as: <em><?php the_category(', ') ?></em> <?php edit_post_link(); ?></p>
				<div class="post-content"><?php the_content('Continue Reading &#187;'); ?>
				<p class="post-info">
					<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
				</p>
				<!--
				<?php trackback_rdf(); ?>
				-->
			</div>
			<?php comments_template(); ?>
		</div>
			<?php endforeach; else: ?>
			<div class="post">
				<h2 class="post-title">Oooops...Not Found</h2>
				<div class="post-content">
				<p>After searching for your keywords extensively, The server has responded with a 'Not Found'.<br/>
					May be, Its time for you to change the query and try again.<br/>
					Dont loose your heart, just yet !</p>
				</div>
			</div>
			<?php  endif; ?>
		<p align="center"><?php posts_nav_link() ?></p>
	</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>