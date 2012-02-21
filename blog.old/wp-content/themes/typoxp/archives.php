<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>

<div id="left">
<div id="content">
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
</div>	

<?php get_footer(); ?>
