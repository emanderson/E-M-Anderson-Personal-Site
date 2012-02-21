<?php 
$themename = "PrimePress";
$shortname = "pp";
$options = array (

	array(	"name" => "Layout Options",
			"desc" => "Choose your preferred layout.",
			"id" => $shortname."_admin_heading",
			"type" => "info"),

	array(	"name" => "Content Width",
			"desc" => "Select the width of the content column. sidebar width is automatically adjusted.",
			"id" => $shortname."_layout_setup",
			"type" => "select",
			"std" => "content-540px",
			"options" => array("content-480px", "content-540px", "content-580px", "content-620px")),

	array(	"name" => "Sidebar Options",
			"desc" => "How many sidebars do you want ?",
			"id" => $shortname."_sidebar_option",
			"type" => "select",
			"std" => "3 sidebars",
			"options" => array("1 sidebar", "2 sidebars", "3 sidebars")),

	array(	"name" => "FeedBurner",
			"desc" => "Your custom FeedBurner settings.",
			"id" => $shortname."_admin_heading",
			"type" => "info"),

	array(	"name" => "FeedBurner Address",
			"desc" => "enter your custom FeedBurner address.",
			"id" => $shortname."_feed_address",
			"std" => "",
			"type" => "text"),

	array(	"name" => "FeedBurner ID",
			"desc" => "enter your <a href='http://www.techtrot.com/feedburner-feed-id/'>FeedBurner ID</a> to enable eMail subscription.",
			"id" => $shortname."_feed_id",
			"std" => "",
			"type" => "text"),

	array(	"name" => "Main Menu Settings",
			"desc" => "The navigation menu tabs at the top.",
			"id" => $shortname."_admin_heading",
			"type" => "info"),

	array(	"name" => "Exclude",
			"desc" => "Enter a comma-separated list of <a href='http://www.techtrot.com/wordpress-page-id/'>Page IDs</a> to be excluded from the main menu tabs (example - 5,9,22).",
			"id" => $shortname."_exclude_pages",
			"std" => "",
			"type" => "text"),

	array(	"name" => "Sort by",
			"desc" => "'<strong>menu_order</strong>' - sorts the Pages by Page Order<br /> '<strong>post_title</strong>' - sorts Pages alphabetically (by title)<br /> '<strong>post_date</strong>' - sort Pages by their creation date.",
			"id" => $shortname."_sort_pages",
			"type" => "select",
			"std" => "menu_order",
			"options" => array("menu_order", "post_title", "post_date"))

);

function mytheme_add_admin() {
	global $themename, $shortname, $options;
	if ( $_GET['page'] == basename(__FILE__) ) {
		if ( 'save' == $_REQUEST['action'] ) {
			foreach ($options as $value) {
				update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
			foreach ($options as $value) {
                if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
			header("Location: themes.php?page=pp-options.php&saved=true");
			die;
		} else if( 'reset' == $_REQUEST['action'] ) {
			foreach ($options as $value) {
				delete_option( $value['id'] ); }
			header("Location: themes.php?page=pp-options.php&reset=true");
			die;
		}
	}
	
	add_theme_page($themename." Options", "PrimePress Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');

}

function mytheme_admin() {
	global $themename, $shortname, $options;
	if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
	if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';

?>
<div class="wrap">
<h2><?php echo $themename; ?> Settings</h2>

<form method="post">

<table class="form-table">

<?php foreach ($options as $value) { 
    
if ($value['type'] == "text") { ?>

<tr valign="middle"> 
    <th scope="row" ><?php echo $value['name']; ?>:</th>
    <td>
        <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" size="50" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" /><br />
		<?php echo $value['desc']; ?>
    </td>
</tr>

<?php } elseif ($value['type'] == "info") { ?>

    <tr><th scope="row" colspan="2" style="background:#fff; padding:30px 10px 0 0; border:0; font-size:15px; font-weight:bold;"><?php echo $value['name']; ?></th></tr>
	<tr><th scope="row" colspan="2" style="background:#fff; padding:6px 10px 10px 0; font-size:13px; font-weight:normal;"><?php echo $value['desc']; ?></th></tr>

<?php } elseif ($value['type'] == "select") { ?>

    <tr valign="middle"> 
        <th scope="row"><?php echo $value['name']; ?>:</th>
        <td>
            <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
                <?php foreach ($value['options'] as $option) { ?>
                <option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif (get_settings($value[id]) == NULL && $option == $value[std]) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
				<?php } ?>
            </select><br />
			<?php echo $value['desc']; ?>
        </td>
    </tr>

<?php 
} 
}
?>

</table>

<p class="submit">
<input class="button-primary" name="save" type="submit" value="Save changes" />    
<input type="hidden" name="action" value="save" />
</p>
</form>
<form method="post">
<p class="submit">
<input class="button-primary" name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
</form>

<?php
}

add_action('admin_menu', 'mytheme_add_admin'); ?>