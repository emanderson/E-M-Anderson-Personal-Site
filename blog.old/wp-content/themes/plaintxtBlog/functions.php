<?php
/*
File Name: Wordpress Theme Toolkit
Version: 1.0
Author: Ozh
Author URI: http://planetOzh.com/
*/
/************************************************************************************
 * THEME USERS : Don't touch anything !! Or don't ask the theme author for support (:-0
 ************************************************************************************/
include(dirname(__FILE__).'/themetoolkit.php');

/************************************************************************************
 * FUNCTION ARRAY
 ************************************************************************************/
themetoolkit(
	'mytheme', 

	array(
	'separ1' => 'Typography {separator}',
	'basefontsize' => 'Base Font Size ## The base font size globally affects all font sizes throughout your blog. This can be in any unit (e.g., px, pt, em), but I suggest using a percentage (%). Default is 70%.<br/><em>Format: <strong>Xy</strong> where X = a number and y = its units.</em>',
	'bodyfont' => 'Base Font Family {radio|arial, helvetica, sans-serif|<span style="font-family:arial, helvetica, sans-serif !important;font-weight:bold;">Arial</span> (Helvetica, sans serif)|"courier new", courier, monospace|<span style="font-family:courier new, courier, monospace !important;font-weight:bold;">Courier New</span> (Courier, monospace)|georgia, times, serif|<span style="font-family:georgia, times, serif !important;font-weight:bold;">Georgia</span> (Times, serif)|"lucida console", monaco, monospace|<span style="font-family:lucida console, monaco, monospace !important;font-weight:bold;">Lucida Console</span> (Monaco, monospace)|"lucida sans unicode", lucida grande, sans-serif|<span style="font-family:lucida sans unicode, lucida grande !important;font-weight:bold;">Lucida Sans Unicode</span> (Lucida Grande, sans serif)|tahoma, geneva, sans-serif|<span style="font-family:tahoma, geneva, sans-serif !important;font-weight:bold;">Tahoma</span> (Geneva, sans serif)|"times new roman", times, serif|<span style="font-family:times new roman, times, serif !important;font-weight:bold;">Times New Roman</span> (Times, serif)|"trebuchet ms", helvetica, sans-serif|<span style="font-family:trebuchet ms, helvetica, sans-serif !important;font-weight:bold;">Trebuchet MS</span> (Helvetica, sans serif)|verdana, geneva, sans-serif|<span style="font-family:verdana, geneva, sans-serif !important;font-weight:bold;">Verdana</span> (Geneva, sans serif)} ## The base font sets the font family throughout your blog. A fall-back font and the font family are in parenthesis. Default is Verdana.',
	'posttextalignment' => 'Post Text Alignment {radio|justify|Justified|left|Left aligned ("Ragged right")|right|Right aligned ("Ragged left")} ## Choose one for the text alignment of the post body text. Default is justified.',
	'separ2' => 'Layout {separator}',
	'singlepagelayout' => 'Single Post Layout {radio|threecolumn_single.php|Three Column|singlecolumn_single.php|One Column} ## Choose one for the single post page layout. Default is three column.',
	'summaryhome' => 'Home Page {radio|index|Show the regular blog index|summary|Show the blog summary page} ## Select whether you want to show the regular blog index or the blog summary page.  <strong>Important:</strong> If you choose to use the blog summary, you must have at least one comment present in your blog, otherwise you will get an error. Default is to show the regular blog index.',
	),
	__FILE__
);

/************************************************************************************
 * FUNCTION CALLS
 ************************************************************************************/
function mytheme_basefontsize() {
	global $mytheme;
	if ( $mytheme->option['basefontsize'] ) {
		print 'body {
		font-size: ';
		print $mytheme->option['basefontsize'];
		print ";";
	}
}
function mytheme_bodyfont() {
	global $mytheme;
	if ( $mytheme->option['bodyfont'] ) {
		print '
		font-family: ';
		print $mytheme->option['bodyfont'];
		print ";
	}\n";
	}
}
function mytheme_posttextalignment() {
	global $mytheme;
	if ( $mytheme->option['posttextalignment'] ) {
		print 'div.post-entry p { text-align: ';
		print $mytheme->option['posttextalignment'];
		print "; }\n";
	}
}
function mytheme_singlepagelayout() {
	global $mytheme;
	if ($mytheme->option['singlepagelayout'] == 'threecolumn_single.php') {
		print '
		'.get_header().'
		'.get_sidebar().'
		<div id="content" class="narrowcolumn">
		';
	}
	else {
		print '
		'.get_header().'
		<div id="content" class="widecolumn">
		';
	}	
}

/************************************************************************************
 * FUNCTION DEFAULTS
 ************************************************************************************/
if ( !$mytheme->is_installed() ) {
	$set_defaults['basefontsize'] = '70%';
	$set_defaults['bodyfont'] = 'verdana, geneva, sans-serif';
	$set_defaults['posttextalignment'] = 'justify';
	$set_defaults['summaryhome'] = 'index';
	$set_defaults['singlepagelayout'] = 'threecolumn_single.php';
	$result = $mytheme->store_options($set_defaults) ;
}

/************************************************************************************
 * CALL FOR WIDGETS PLUGIN, V.1
 ************************************************************************************/
if ( function_exists('register_sidebar') )
	register_sidebars(2);

?>