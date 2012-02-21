<?php
/*
File Name: Wordpress Theme Toolkit
Version: 1.0
Author: Ozh
Author URI: http://planetOzh.com/
*/

/************************************************************************************
 * THEME USERS : don't touch anything !! Or don't ask the theme author for support :)
 ************************************************************************************/

include(dirname(__FILE__).'/themetoolkit.php');

/************************************************************************************
 * THEME AUTHOR : edit the following function call :
 ************************************************************************************/

themetoolkit(
	'newzen', 
	array(
	'aboutme' => 'Author information {textarea|6|50} ## This will be displayed in the about the author box',
	'header' => 'Header site name on the {radio|left|Left - Default|right|Right side}',
	/* '878ad' => 'Enable 878 Studios Link {radio|true|Yes|false|No}', */
	'sharethis' => 'Enable ShareThis feature on posts {radio|true|Yes|false|No} This will add links that allow people to either submit the article to <a target="_blank" href="http://digg.com">Digg</a>, <a target="_blank" href="http://del.icio.us">del.icio.us</a>, and <a target="_blank" href="http://newsvine.com">Newsvine</a>',
	/* 'reporting' => 'Allow Reporting of install to author {radio|yes|Yes|no|No} ## This will allow the theme to notify the creator of its install. Only sends URL to author.', */
	/* 'debug' => 'debug', */
	),
	__FILE__
);

/* About me Function */
function newzen_aboutme() {
	global $newzen;
	print $newzen->option['aboutme'];
}
function newzen_version() {
	global $newzen;
	print $newzen->option['newzen_version'];
}
/* Header Function */
function newzen_header() {
	global $newzen;
	if ($newzen->option['header'] == 'right') {
		echo '
	/* Menu on the right */
	.main_table {
	text-align: right;
	}
		';
	} else {
		echo '
	/* Menu of the left */
	.main_table {
	text-align: left;
	}
		';
	}	
}
/* 878 Ad 
function newzen_878ad() {
	global $newzen;
	if ($newzen->option['878ad'] == 'true') {
		echo '
<style type="text/css">
	a#eightseveneight {
	font: 12px Lucida Grande, Geneva, Arial, Verdana, sans-serif;
	position: fixed;
	right: 0;
	color: #CCCCCC;
	bottom: 0;
	display: block;
	height: 17px;
	width: 70px;
	border: 1px dashed #ccc;
	text-decoration: none;
}
</style>
<a href="http://www.878studios.com/" id="eightseveneight">878 studios</a>
';}
} */

/* Setup the Defaults */
if (!$newzen->is_installed()) { 
$set_defaults['aboutme'] = 'This is the about me section, you will prob. want to edit this.  If you want to change the image you may do so by changing the avatar.jpg located in the NewZen images directory.'; 
$set_defaults['header'] = 'left';
/* $set_defaults['878ad'] = 'false'; */
$set_defaults['sharethis'] = 'true';
$set_defaults['newzen_version'] = 'v2.0 build 105';
/* $set_defaults['reporting'] = 'no'; */
$result = $newzen->store_options($set_defaults);
}

?>
