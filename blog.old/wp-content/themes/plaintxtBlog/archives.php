<?php
/*
Template Name: Archives
*/
?>
<?php 
	get_header();
	get_sidebar();
?>

<div id="content" class="narrowcolumn">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div id="post-<?php the_ID(); ?>" class="post">
		<div class="post-header">
			<h2 class="post-title"><?php the_title(); ?></h2>
		</div><!-- END POST-HEADER  -->
		<div class="post-entry">
			<?php the_content(); ?>
			<div class="clearer"></div>
			<div class="content-column">
				<ul class="list">
					<li id="category-archives">
						<h2>Category Archives</h2>
						<ul>
							<?php wp_list_cats('sort_column=name&optioncount=1&feed=(RSS)&feed_image='.get_bloginfo('template_url').'/icons/feed.png&hierarchical=1'); ?>
						</ul>
					</li>
				</ul>
			</div><!-- END CONTENT-COLUMN -->
			<div class="content-column">
				<ul class="list">
					<li id="monthly-archives">
						<h2>Monthly Archives</h2>
						<ul>
							<?php wp_get_archives('type=monthly&show_post_count=1'); ?>
						</ul>
					</li>
				</ul>
			</div><!-- END CONTENT-COLUMN -->
			<div class="clearer"></div>
			<div class="content-column">
				<ul class="list">
					<li id="all-xml-feeds">
						<h2>XML Feeds</h2>
						<ul>
							<li>Atom 1.0 <a href="<?php bloginfo('atom_url'); ?>" title="<?php bloginfo('name'); ?> Atom (XML) Feed" rel="alternate" type="application/atom+xml"><img src="<?php bloginfo('stylesheet_directory'); ?>/icons/feed.png" alt="Atom XML Feed" /></a></li>
							<li>RSS 2.0 <a href="<?php bloginfo('rss2_url'); ?>" title="<?php bloginfo('name'); ?> RSS 2.0 (XML) Feed" rel="alternate" type="application/rss+xml"><img src="<?php bloginfo('stylesheet_directory'); ?>/icons/feed.png" alt="RSS 2.0 XML Feed" /></a></li>
							<li>Comments RSS 2.0 <a href="<?php bloginfo('comments_rss2_url'); ?>" title="<?php bloginfo('name'); ?> Comments RSS 2.0 (XML) Feed" rel="alternate" type="application/rss+xml"><img src="<?php bloginfo('stylesheet_directory'); ?>/icons/feed.png" alt="Comments RSS 2.0 XML Feed" /></a></li>
							<li>RDF/RSS 1.0 <a href="<?php bloginfo('rdf_url'); ?>" title="<?php bloginfo('name'); ?> RDF/RSS 1.0 (XML) Feed" rel="alternate" type="application/rdf+xml"><img src="<?php bloginfo('stylesheet_directory'); ?>/icons/feed.png" alt="RDF/RSS 1.0 XML Feed" /></a></li>
							<li>RSS 0.92 <a href="<?php bloginfo('rss_url'); ?>" title="<?php bloginfo('name'); ?> RSS 0.92 (XML) Feed" rel="alternate" type="text/xml"><img src="<?php bloginfo('stylesheet_directory'); ?>/icons/feed.png" alt="RSS 0.92 XML Feed" /></a></li>
						</ul>
					</li>
				</ul>
			</div><!-- END CONTENT-COLUMN -->
			<div class="content-column">
				<ul class="list">
					<li id="recent-posts">
						<h2>Recent Posts</h2>
						<ul>
							<?php get_archives('postbypost', '10', 'custom', '<li>', '</li>'); ?>
						</ul>
					</li> 
				</ul>
			</div><!-- END CONTENT-COLUMN -->
			<?php edit_post_link('Edit this page', '<p>[', ']</p>'); ?>
		</div><!-- END POST-ENTRY -->
		<!-- <?php trackback_rdf(); ?> -->
	</div><!-- END POST -->

<?php endwhile; endif; ?>

</div><!-- END CONTENT -->

<?php get_footer(); ?>