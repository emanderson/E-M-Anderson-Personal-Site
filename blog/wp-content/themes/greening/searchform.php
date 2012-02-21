<?php
	$default_searched_string = "Type your search here.";
?>
<script language="JavaScript" type="text/javascript">
	<!--
	function clear_search_input( the_input ) {
		if( the_input && the_input.value && the_input.value == "<?php echo $default_searched_string; ?>" ) {
			the_input.value = "";
		}
	}
	-->
</script>
<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
		<?php
			$searched_string = wp_specialchars($s, 1);
			if( !$searched_string ) {
				$searched_string = $default_searched_string;
			}
		?>
		<input type="text" value="<?php echo $searched_string; ?>" name="s" id="s" onfocus="clear_search_input( this )" />
</form>