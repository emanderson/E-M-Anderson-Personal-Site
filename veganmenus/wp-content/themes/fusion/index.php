<?php /* Fusion/digitalnature */ ?>

<?php get_header(); ?>

<!-- main content -->
<div id="main-content">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

            <!-- post -->
			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">

                <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

                <!-- story header -->
                <div class="postheader">
                    <div class="postinfo">
    				<p>Posted by <?php the_author_posts_link(); ?> in <?php the_category(', ') ?> on <?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> -->

                    <span class="editlink"><?php edit_post_link('Edit', '',''); ?></span></p>
                    </div>
                </div>
                <!-- /story header -->


				<small></small>

				<div class="postbody entry">
					<?php the_content('Read the rest of this entry &raquo;'); ?>
				</div>
                <p class="tags"><?php the_tags('Tags: ', ', ', ''); ?></p>
                <p class="postcontrols">
                  <?php
                  global $id, $comment;
  	              $number = get_comments_number( $id );
                  ?>
                  <a class="<?php if($number<1) { echo 'no '; }?>comments" href="<?php comments_link(); ?>"><?php comments_number('No Comments', '1 Comment', '% Comments'); ?></a>
                </p>
                <br clear="all" />
		    </div>
            <!-- /post -->

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
            <br clear="all" />
		</div>

	<?php else : ?>

		<h2>Not Found</h2>
		<p class="error">Sorry, but you are looking for something that isn't here.</p>
		<?php get_search_form(); ?>

	<?php endif; ?>

</div>
<!-- /main content -->

</div>
<!-- /main -->
</div>
<!-- /main wrapper -->

<?php get_sidebar(); ?>

<!-- clear main & sidebar sections -->
<br clear="left" />
<!-- /clear main & sidebar sections -->

<?php get_footer(); ?>
