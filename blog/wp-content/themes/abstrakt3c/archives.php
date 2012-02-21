<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>
<?php include ('sidebar4.php'); ?>
<div id="content" class="narrowcolumn">

<?php include (TEMPLATEPATH . '/searchform.php'); ?>

<h2>Archives by Month:</h2>
  <ul>
    <?php wp_get_archives('type=monthly'); ?>
  </ul>

<h2>Archives by Subject:</h2>
  <ul>
     <?php wp_list_cats(); ?>
  </ul>

</div>	
<?php include ('sidebar3.php'); ?>
<?php get_footer(); ?>
