<?php 
/*
 Template Name: Archives 
 */
?>
<?php get_header(); ?>

<div id="content">
	<div class="entry">
   	<div class="rounded-box">
	      <div class="top-left-corner"><div class="top-left-inside">&bull;</div></div>
   	   <div class="top-right-corner"><div class="top-right-inside">&bull;</div></div>
      	<div class="bottom-left-corner"><div class="bottom-left-inside">&bull;</div></div>
	      <div class="bottom-right-corner"><div class="bottom-right-inside">&bull;</div></div>
   	   <div class="box-contents">
      	   <h2>Archivos por tema:</h2>
	         <ul id="archives"><?php wp_list_cats('sort_order=desc'); ?></ul>
	
	         <h2>Todos los archivos</h2>
	         <ul><?php wp_get_archives('type=postbypost'); ?></ul>
   	   </div>
	   </div>
   </div>
</div>
<?php get_footer(); ?>
