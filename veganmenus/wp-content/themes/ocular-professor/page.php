<?php get_header(); ?>


<div id="wrapper">
	
	<div id="single" class="page">
		
		<h2><?php the_title(); ?></h2>
		
	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>

		<div class="post">
                <?php the_content('&#187; Continue Reading'); ?>
		</div>

		<div class="main_meta">
			<ul>
				<?php if (is_page('About')) { ?>
					<li><strong>Quickly:</strong> <?php the_author_description() ?> </li>
					<?php } elseif (is_page()) { ?>
							
					<li><?php the_time('F jS, Y'); ?></li>
					<li>Posted in <?php the_category(', ') ?></li>
							
				<?php } ?>
			</ul>
					
			<p class="edit"><?php edit_post_link('Edit', '', ''); ?></p>
		</div>

        <?php endwhile; ?>


    <?php else : ?>

        <div class="fourohfour">
	        <img src="<?php bloginfo('template_directory'); ?>/images/mal.jpg" alt="a questioning duck" class="notfound" />
	    </div>

    <?php endif; ?>
	<div class="clear"></div>
	</div>

</div> <!-- end wrapper -->
<?php get_footer(); ?>