<?php
/*
Template Name: Archives
*/
?>
<?php get_header(); ?>

	<div id="content_2">
			<div id="inner_content">
				<div id="text">

					<div class="post_content">
						<h2>Archives by Month:</h2>
						  <ul>
							<?php wp_get_archives('type=monthly'); ?>
						  </ul>
						
						<h2>Archives by Subject:</h2>
						  <ul>
							 <?php wp_list_cats(); ?>
						  </ul>
					</div>
				</div>
				<div class="visual_clear"></div>
			</div>
		</div>

<?php get_footer(); ?>