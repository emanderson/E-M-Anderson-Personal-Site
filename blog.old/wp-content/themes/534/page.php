<?php get_header(); ?>

<div id="maincontainer">
<div class="content">

<?php if (have_posts()) : while(have_posts()) : the_post(); ?>
<div id="pagepost">
<h2><?php the_title(); ?></h2>
<div class="post">
<?php the_content(); ?>
</div>
</div>
<?php endwhile; endif; ?>

</div>

<?php get_footer(); ?>