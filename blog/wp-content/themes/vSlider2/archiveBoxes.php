<!-- 
These are the archive boxes
This can be included when all archive lookup possibilities are needed
-->


<!-- Archives by month -->
<?php include (TEMPLATEPATH . '/pagePostTop.php'); ?>
Archives by Month
<?php include (TEMPLATEPATH . '/pagePostMiddle.php'); ?>
	<ul>
		<?php wp_get_archives('type=monthly'); ?>
	</ul>
	<p></p>
<?php include (TEMPLATEPATH . '/pagePostBottom.php'); ?>


<!-- Archives by category -->
<?php include (TEMPLATEPATH . '/pagePostTop.php'); ?>
Archives by Category
<?php include (TEMPLATEPATH . '/pagePostMiddle.php'); ?>
	<ul>
		<?php wp_list_cats(); ?>
	</ul>
	<p></p>
<?php include (TEMPLATEPATH . '/pagePostBottom.php'); ?>



<!-- Check if Ultimate Tag Warrior is installed -->
<?php if (function_exists('UTW_ShowWeightedTagSetAlphabetical')) { ?>
	<!-- Tag Cloud -->
	<?php include (TEMPLATEPATH . '/pagePostTop.php'); ?>
	Tag Cloud
	<?php include (TEMPLATEPATH . '/pagePostMiddle.php'); ?>
		<p>
			<?php UTW_ShowWeightedTagSetAlphabetical("coloredsizedtagcloud") ?>
		</p>	
	<?php include (TEMPLATEPATH . '/pagePostBottom.php'); ?>
<?php } ?>