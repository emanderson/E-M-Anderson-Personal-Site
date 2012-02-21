<?php /*
	Template Name: Links
*/ ?>

<?php get_header(); ?>

	<div id="primary" class="page-template">
		
		<div class="entry" id="post-<?php the_ID(); ?>">
			
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php bloginfo('name'); ?> Links"><?php the_title(); ?></a></h1>
			
			<div class="entry-content">
				<ul>
					<?php wp_list_bookmarks('title_li=&category_before=&category_after='); ?>
				</ul>
			</div>
			
		</div><!--.entry-->
		
	</div><!--#primary-->
	
<?php get_sidebar(); ?>
	
<?php get_footer(); ?>