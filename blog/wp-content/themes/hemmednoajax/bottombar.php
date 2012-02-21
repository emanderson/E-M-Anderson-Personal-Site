<!-- begin bottombar -->
<div id="bottomcontainer">

<div id="bottombar">	

	<div class="bottombarbox">
	<div class="bottombarboxheader">
		<div class="iconimg">
			<img src="<?php bloginfo('template_directory'); ?>/images/links.gif" alt="Links" />
		</div>
		<h2><?php _e('Light Reading'); ?></h2>
	</div>

		<ul><?php get_links_list('id'); ?></ul>
	</div>
	
	<?php if (function_exists('get_recent_comments')) { ?>
	<div class="bottombarbox">
		<div class="bottombarboxheader">
			<div class="iconimg">
				<img src="<?php bloginfo('template_directory'); ?>/images/comment.gif" alt="Comments" />
			</div>
				<h2><?php _e('Recent Comments'); ?></h2>
		</div>

		<ul>
			<?php get_recent_comments(); ?>
		</ul> 
	</div>
	<?php } ?> 

	<div class="bottombarbox">
	<div class="bottombarboxheader">
		<div class="iconimg">
			<img src="<?php bloginfo('template_directory'); ?>/images/posts.gif" alt="Posts" />
		</div>
		<h2><?php _e('Latest Posts'); ?></h2>
		
	</div>
		<?php query_posts('showposts=10'); ?>
		<ul>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<li><a href="<?php the_permalink() ?>"><span class="date"><?php the_time('m.d') ?></span> <?php the_title() ?> </a></li>
			<?php endwhile; endif; ?>
		</ul>
	</div>

</div>
</div> <!-- closes bottom container -->
<div id="bottomclose"></div>