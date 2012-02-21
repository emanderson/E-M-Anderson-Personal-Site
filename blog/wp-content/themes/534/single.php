<?php get_header(); ?>

<div id="maincontainer">
<div class="content">

<?php if (have_posts()) : while(have_posts()) : the_post(); ?>
<div id="postone">
<h2><?php the_title(); ?></h2>
<div class="post">
<?php the_content(); ?>
<p class="postdata"><?php the_time('F jS, Y') ?> | <?php the_category(', ') ?></p>
</div>
</div>

<div id="posttwo">
<h2><?php comments_number('No comments', '1 comment', '% comments'); ?></h2>
<?php comments_template(); ?>
</div>
<?php endwhile; endif; ?>

</div>

<?php get_footer(); ?>