<?php /* Don't remove this line. */ require('./wp-blog-header.php'); ?>

<?php get_header() ?>
	<div id="main">
	<div id="content">	
	<?php if ($posts) { ?>	
		<?php $post = $posts[0]; /* Hack. Set $post so that the_date() works. */ ?>
		<h3><?php _e('Search Results for '); ?>'<?php echo $s; ?>'</h3>			
		<div class="post-info">Did you find what you wanted ?</div>		
		<br/>				
		<?php foreach ($posts as $post) : start_wp(); ?>				
			<?php require('post.php'); ?>
		<?php endforeach; ?>
		<div class="navigation">
			<div class="alignleft"><?php posts_nav_link('','','&laquo; Older Entries') ?></div>
			<div class="alignright"><?php posts_nav_link('','Newer Entries &raquo;','') ?></div>
		</div>	
	<?php } else { ?>
		<h2 class="center"><?php _e('Not Found'); ?></h2>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php } ?>		
	</div>
	<div id="sidebar">
		<h2><?php _e('Currently Browsing'); ?></h2><ul><li><p><?php _e('You have searched the archives
			for '); ?><strong>'<?php echo $s; ?>'</strong>. <?php _e('If you are unable to find anything in these search results, you can try one of these links'); ?>.</p></li></ul>
<h2><?php _e('Elsewhere'); ?></h2>
		<?php get_sidebar(); ?>
	</div>
<?php get_footer(); ?>
</div>
</div>
</body>
</html>
