<!-- 
Standard page look
-->

<?php get_header(); ?>

	<div id="content">

	<?php if (have_posts()) : ?>
		
		<?php while (have_posts()) : the_post(); ?>
			
			<!-- Include the post block -->
			<?php include (TEMPLATEPATH . '/pagePostTop.php'); ?>
			<?php the_title(); ?>
			<?php include (TEMPLATEPATH . '/pagePostMiddle.php'); ?>
			<?php the_content(); ?>
			<!-- Metadata - tags, categories, comments and so on... -->
			<p class="postmetadata"> 					
				<?php edit_post_link('Edit','','<strong>&nbsp;&nbsp;&nbsp; </strong>'); ?>
			</p> 
			<?php include (TEMPLATEPATH . '/pagePostBottom.php'); ?>
			
			<?php comments_template(); ?>
		<?php endwhile; ?>
		
	<?php else : ?>

		<!-- Include the notfound block -->
		<?php include (TEMPLATEPATH . '/notfound.php'); ?>	

	<?php endif; ?>

	</div>
		

<?php get_sidebar(); ?>

<?php get_footer(); ?>