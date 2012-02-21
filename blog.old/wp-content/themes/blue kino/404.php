	<?php get_header(); ?>
	<div id="content">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="entry">
			<div class="rounded-box">
				<div class="top-left-corner"><div class="top-left-inside">&bull;</div></div>
			   <div class="top-right-corner"><div class="top-right-inside">&bull;</div></div>
			   <div class="bottom-left-corner"><div class="bottom-left-inside">&bull;</div></div>
			   <div class="bottom-right-corner"><div class="bottom-right-inside">&bull;</div></div>
				<div class="box-contents">
				  	<h2>Error 404 &ndash; File not Found</h2>
	
					<p>Sorry, but the page you were looking for could not be found.</p>
				</div>
			</div>
		</div>
		<?php endwhile; ?>
		<?php previous_posts_link('+ recientes') ?>
		<?php next_posts_link('+ antiguos') ?>
		<?php endif; ?>
	</div>
	<?php get_footer(); ?>