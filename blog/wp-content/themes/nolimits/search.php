<?php get_header() ?>
	<div id="content" class="narrowcolumn">	
	<h3>Search Results for '<?php echo $s; ?>'</h3>	
	<?php if ($posts) { ?>	
		<?php $post = $posts[0]; /* Hack. Set $post so that the_date() works. */ ?>								
		<?php foreach ($posts as $post) : start_wp(); ?>				
			<?php require(TEMPLATEPATH. "/post.php");?>
		<?php endforeach; ?>
		<div class="navigation">
			<div class="alignleft"><?php posts_nav_link('','','&laquo; Older Entries') ?></div>
			<div class="alignright"><?php posts_nav_link('','Newer Entries &raquo;','') ?></div>
		</div>		
	<?php } else { ?>
		<h3 class="center">Not Found</h3>		
		<p>Please try with another word or brwose through the archives by month or category.<p>
	<?php } ?>		
	</div>
<?php get_sidebar(); ?>	
<?php get_footer(); ?>
