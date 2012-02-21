<?php get_header(); ?>

<div id="wrapper">
		<?php if (have_posts()) : ?>
		
		<?php $featured_query = new WP_Query('category_name=featured&showposts=1');
  			while ($featured_query->have_posts()) : $featured_query->the_post();
  			$do_not_duplicate = $post->ID; ?>

<div id="featured">
	
	<div id="main_feature">
		<?php the_content('&raquo; Continue Reading...'); ?>
	</div>
				
	<div class="main_meta">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<ul>
					<li><?php the_time('F jS, Y'); ?></li>
					<li>Posted in <?php the_category(', ') ?></li> 
					<?php the_tags('<li>Tagged ', ', ', '</li>'); ?>
					<li><?php comments_popup_link('No Comments', '1
                	Comment', '% Comments'); ?></li>
				</ul>
				<p class="edit"><?php edit_post_link('Edit', '', ''); ?></p>
	</div>
	
<div class="clear"></div>
</div>
		<?php endwhile; ?>
		
		<?php endif; ?>
		



	
	<div id="home_content">
			
    	<?php if (have_posts()) : ?>
		
        <?php while (have_posts()) : the_post();
				if( $post->ID == $do_not_duplicate ) continue; update_post_caches($posts); ?>
		<div class="post">
				<?php the_content('&raquo; Continue Reading...'); ?>
		</div>
			
		<div class="main_meta">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<ul>
					<li><?php the_time('F jS, Y'); ?></li>
					<li>Posted in <?php the_category(', ') ?></li>  
					<?php the_tags('<li>Tagged ', ', ', '</li>'); ?>
					<li><?php comments_popup_link('No Comments', '1
			                Comment', '% Comments'); ?></li>
				</ul>
				<p class="edit"><?php edit_post_link('Edit', '', ''); ?></p>
		</div>

        <?php endwhile; ?>

		<div class="archive_nav">
		<div class="left"><?php next_posts_link('&laquo; Older Entries') ?></div><div class="right"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>



    <?php else : ?>

        <div class="fourohfour">
	        <img src="<?php bloginfo('template_directory'); ?>/images/mal.jpg" alt="a questioning duck" class="notfound" />
	    </div>
	<?php endif; ?>
	</div>

</div> <!-- end wrapper -->
<?php get_footer(); ?>