<?php get_header(); ?>

	<div id="pagestripe"><div id="pageblock">&#160;</div></div>
	<div id="content" class="single">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>">
		<h2><?php the_title(); ?></h2>

				<?php the_content('<p>Read the rest of this page &raquo;</p>'); ?>

		</div>
	  <?php endwhile; endif; ?>

	</div>

<hr />
<div id="footer" class="single">	

	<p>
		<?php bloginfo('name'); ?> uses <a href="http://ulfpettersson.se/design/modern/">Modern</a> &#8212; designed by <a href="http://ulfpettersson.se/">Ulf Pettersson</a> and powered by
		<a href="http://wordpress.org">WordPress</a>.
	</p>
</div>
</div>

</body>
</html>