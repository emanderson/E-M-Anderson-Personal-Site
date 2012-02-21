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
	'bodyfontsize' => 'Base Font Size ## The base font size globally affects all font sizes throughout your blog. This can be in any unit (e.g., px, pt, em), but I suggest using a percentage (%). Default is 75%.<br/><em>Format: <strong>Xy</strong> where X = a number and y = its units.</em>',
	'bodyfontfamily' => 'Base Font Family {radio|arial, helvetica, sans-serif|<span style="font-family:arial, helvetica, sans-serif !important;font-weight:bold;">Arial</span> (Helvetica, sans serif)|"courier new", courier, monospace|<span style="font-family:courier new, courier, monospace !important;font-weight:bold;">Courier New</span> (Courier, monospace)|georgia, times, serif|<span style="font-family:georgia, times, serif !important;font-weight:bold;">Georgia</span> (Times, serif)|"lucida console", monaco, monospace|<span style="font-family:lucida console, monaco, monospace !important;font-weight:bold;">Lucida Console</span> (Monaco, monospace)|"lucida sans unicode", lucida grande, sans-serif|<span style="font-family:lucida sans unicode, lucida grande !important;font-weight:bold;">Lucida Sans Unicode</span> (Lucida Grande, sans serif)|tahoma, geneva, sans-serif|<span style="font-family:tahoma, geneva, sans-serif !important;font-weight:bold;">Tahoma</span> (Geneva, sans serif)|"times new roman", times, serif|<span style="font-family:times new roman, times, serif !important;font-weight:bold;">Times New Roman</span> (Times, serif)|"trebuchet ms", helvetica, sans-serif|<span style="font-family:trebuchet ms, helvetica, sans-serif !important;font-weight:bold;">Trebuchet MS</span> (Helvetica, sans serif)|verdana, geneva, sans-serif|<span style="font-family:verdana, geneva, sans-serif !important;font-weight:bold;">Verdana</span> (Geneva, sans serif)} ## The base font family sets the font for all elements except headers (see below). A fall-back font and the font family are in parentheses. Default is Arial.',
	'headerfontfamily' => 'Header Font Family {radio|arial, helvetica, sans-serif|<span style="font-family:arial, helvetica, sans-serif !important;font-weight:bold;">Arial</span> (Helvetica, sans serif)|"courier new", courier, monospace|<span style="font-family:courier new, courier, monospace !important;font-weight:bold;">Courier New</span> (Courier, monospace)|georgia, times, serif|<span style="font-family:georgia, times, serif !important;font-weight:bold;">Georgia</span> (Times, serif)|"lucida console", monaco, monospace|<span style="font-family:lucida console, monaco, monospace !important;font-weight:bold;">Lucida Console</span> (Monaco, monospace)|"lucida sans unicode", lucida grande, sans-serif|<span style="font-family:lucida sans unicode, lucida grande !important;font-weight:bold;">Lucida Sans Unicode</span> (Lucida Grande, sans serif)|tahoma, geneva, sans-serif|<span style="font-family:tahoma, geneva, sans-serif !important;font-weight:bold;">Tahoma</span> (Geneva, sans serif)|"times new roman", times, serif|<span style="font-family:times new roman, times, serif !important;font-weight:bold;">Times New Roman</span> (Times, serif)|"trebuchet ms", helvetica, sans-serif|<span style="font-family:trebuchet ms, helvetica, sans-serif !important;font-weight:bold;">Trebuchet MS</span> (Helvetica, sans serif)|verdana, geneva, sans-serif|<span style="font-family:verdana, geneva, sans-serif !important;font-weight:bold;">Verdana</span> (Geneva, sans serif)} ## This selects the font for headings (h1, h2, h3, etc.) and other elements throughout your blog. A fall-back font and the font family are in parentheses. Default is Georgia.',
	'postentryalignment' => 'Post Text Alignment {radio|justify|Justified|left|Left aligned ("Ragged right")|right|Right aligned ("Ragged left")} ## Choose one for the text alignment of the post body text. Default is left aligned.',
	'separ2' => 'Layout &amp; Content {separator}',
	'wrapperwidth' => 'Layout Width ## Set the overall width of content in the browser window. This can be in any unit (e.g., px, pt, em), but I suggest using % for a fluid layout. Default is 90%.<br/><em>Format: <strong>Xy</strong> where X = a number and y = its units.</em>',
	'showabout' => 'Show "About" Section {checkbox|about|yes|Display the "About" header and the text as entered below} ## If checked, the heading and text below are displayed as a section on the front page. Default is checked.<br/><em><strong>Note to Widgets users:</strong> If you are actively using the Widgets plugin, then this as well as the follow two settings have absolutely no affect.</em>',
	'aboutheader' => '"About" Header ## Add/edit the text for the header of the "About" section. If you are showing the "About" section but do not want a header, enter <code>&amp;nbp;</code> for a blank space. Otherwise your page will not validate. Default is About.',
	'abouttext' => '"About" Text {textarea|10|55} ## Add/edit text for the content of the "About" section. You can use HTML, but beware of special characters: i.e., &amp; = <code>&amp;amp;</code>. Default is Lorem Ipsum&hellip; .',
	),
	__FILE__
);

/************************************************************************************
 * FUNCTION CALLS
 ************************************************************************************/
function mytheme_bodyfontsize() {
	global $mytheme;
	if ( $mytheme->option['bodyfontsize'] ) {
		print 'body { font-size: ';
		print $mytheme->option['bodyfontsize'];
		print "; }\n";
	}
}
function mytheme_bodyfontfamily() {
	global $mytheme;
	if ( $mytheme->option['bodyfontfamily'] ) {
		print 'body { font-family: ';
		print $mytheme->option['bodyfontfamily'];
		print "; }\n";
	}
}
function mytheme_headerfontfamily() {
	global $mytheme;
	if ( $mytheme->option['headerfontfamily'] ) {
		print 'div.post-header, h2.post-title, p.post-date-single, h2.post-title-single, div.post-entry h1, div.post-entry h2, div.post-entry h3, div.post-entry h4, div.post-entry h5, div.post-entry h6, div.post-entry blockquote, div.post-footer, h3#comment-count, h4#comment-header, div#comments ol li p.comment-metadata, h4#respond { font-family: ';
		print $mytheme->option['headerfontfamily'];
		print "; }\n";
	}
}
function mytheme_postentryalignment() {
	global $mytheme;
	if ( $mytheme->option['postentryalignment'] ) {
		print 'div.post-entry p { text-align: ';
		print $mytheme->option['postentryalignment'];
		print "; }\n";
	}
}
function mytheme_wrapperwidth() {
	global $mytheme;
	if ( $mytheme->option['wrapperwidth'] ) {
		print 'div#wrapper { width: ';
		print $mytheme->option['wrapperwidth'];
		print "; }\n";
	}
}
function mytheme_aboutheader() {
	global $mytheme;
	if ($mytheme->option['about'] == 'yes') {
		print '<li>
			<h2>';
		print $mytheme->option['aboutheader'];
		print '</h2>';
	}
}
function mytheme_abouttext() {
	global $mytheme;
	if ($mytheme->option['about'] == 'yes') {
		print '<p>';
		print $mytheme->option['abouttext'];
		print "</p></li>";
	}
}

/************************************************************************************
 * FUNCTION DEFAULTS
 ************************************************************************************/
if ( !$mytheme->is_installed() ) {

	$set_defaults['bodyfontsize'] = '75%';
	$set_defaults['bodyfontfamily'] = 'arial, helvetica, sans-serif';
	$set_defaults['headerfontfamily'] = 'georgia, times, serif';
	$set_defaults['postentryalignment'] = 'left';
	$set_defaults['wrapperwidth'] = '90%';
	$set_defaults['about'] = 'yes';
	$set_defaults['aboutheader'] = 'About';
	$set_defaults['abouttext'] = 'The text here and header above can be customized in the Presentation > themes options menu. You can also select within the options to exclude this section completely. <em>Most</em> XHTML <strong>tags</strong> will <span style="text-decoration:underline;">work</span>.';
	$result = $mytheme->store_options($set_defaults) ;
}

/************************************************************************************
 * CALL FOR WIDGETS PLUGIN, V.1
 ************************************************************************************/
if ( function_exists('register_sidebar') )
    register_sidebar();
?>