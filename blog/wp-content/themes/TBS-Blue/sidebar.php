<!-- START SIDEBAR -->
	<div id="sidebar">
		<?php include('searchform.php'); ?>
		<!-- ><h3>About the Author</h3>
		<p><?php the_author_description(); ?> </p> -->
		<!-- 
		<h3>Categories</h3>
		<ul>
			<?php list_cats(FALSE, '', 'ID',
			'asc', '', TRUE, FALSE, 
			FALSE, FALSE, TRUE, 
			FALSE, FALSE, '', FALSE, 
			'', '', '1,33', 
			TRUE); ?>
 	  	</ul>
	-->

		<h3>Recent Posts</h3>
		<ul>
			<?php
			$posts = get_posts('numberposts=10&order=DESC');
			foreach ($posts as $post) : start_wp(); ?>
			<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>    
			<?php endforeach; ?>
		</ul>
		<h3>Monthly Archives</h3>
		<ul>
			<?php wp_get_archives('type=monthly'); ?>
		</ul>
		<h3>Links</h3>
		<ul>
			<?php wp_get_links(1); ?>
		</ul>
	</div>
<!-- END SIDEBAR -->
