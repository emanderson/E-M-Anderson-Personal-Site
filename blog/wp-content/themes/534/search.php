<?php

if( isset($_GET['ajax']) ) {
	$wp_query->set('posts_per_archive_page', 5);

	$_results  = '<h2>Results</h2>';
	$_results .= '<ul>';
	$posts = $wp_query->get_posts();
	if( have_posts() ) {
		while ( have_posts() ) {
			the_post();
			$counter++;
			$_results .= '<li><a href="' . apply_filters('the_permalink', get_permalink()) . '">' . the_title('', '', false) . '</a></li>';
		}
	} else {
		$_results .= '<li>No search results!</li>';
	}
	$_results .= '</ul>';
	echo WP_Dark::utf8_encode($_results);

	die;
}

?><?php get_header(); ?>

<div id="maincontainer">
<div class="content">

<?php
$wp_query->set('posts_per_page', 2);
$wp_query->set('posts_per_archive_page', 2);
$posts_per_page = 2;
$posts = $wp_query->get_posts();
while ( have_posts() ) : the_post();  $counter++; if($counter == 1) { ?>
<div id="postone">
<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
<div class="post">
<?php the_content(); ?>
<p class="postdata"><?php the_time('F jS, Y') ?> | <?php the_category(', ') ?> | <a href="<?php the_permalink(); ?>"><?php comments_number('No comments', '1 comment', '% comments'); ?></a></p>
</div>
</div>


<?php } else { ?>
<div id="posttwo">
<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
<div class="post">
<?php the_content(); ?>
<p class="postdata"><?php the_time('F jS, Y') ?> | <?php the_category(', ') ?> | <a href="<?php the_permalink(); ?>"><?php comments_number('No comments', '1 comment', '% comments'); ?></a></p>
</div>
</div>


<?php } endwhile; ?>
</div>

<?php get_footer(); ?>