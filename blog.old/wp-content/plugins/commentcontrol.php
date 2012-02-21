<?php 

/*
Plugin Name: Extended Comment Options
Plugin URI: http://beingmrkenny.co.uk/wordpress/plugins/extended-comment-options/
Description: This plugin allows you to switch comments and/or pings on or off for batches of existing posts.
Version: 1.1
Author: Mark Kenny
Author URI: http://beingmrkenny.co.uk/
*/

define ('DEBUGGING', FALSE); // Change to TRUE if you want to display information about the query.

function eco_extended_comments_options() {
	if (function_exists('add_options_page') )
		add_options_page('Extended Comment Options', 'Comments Status', 8, basename(__FILE__), 'comment_conf');
		// The first argument does into the <title>, the second goes on the tab in options
}

// Initialise $eco_clean;
// Set $eco_clean['submitted'] to true if the form has been submitted;
$eco_clean = array();
$eco_clean['db_excluded_posts'] = get_option('eco_excluded_posts');
$eco_clean['submitted'] = false;
if ( $_POST['submit'] == 'Update' || $_POST['for'] == 'oneclick-all' || $_POST['for'] == 'oneclick-last' ) {
	$eco_clean['submitted'] = true;
}

$eco_html = array();
$eco_html['db_excluded_posts'] = wp_specialchars($eco_clean['db_excluded_posts']);

// This inserts the page's content
function comment_conf() {
global $wpdb, $eco_clean, $eco_message;

if ( $eco_clean['submitted'] === true) { ?>
<div id="message" class="updated fade"><p><strong>Comment options received.</strong></p></div>
<?php } ?>

<div class="wrap">

<?php if ( empty($eco_clean['submitted']) ) :
/*
 *
 *
 * ------------------------------------------------ THE FORM ---------------------------------------------------------
 *
 *
 *
 */
global $eco_html;?>
 
<h2>Simple Settings</h2>

<!-- fieldsets are used here so that the admin page retains good layout when Tiger Admin is used -->

<script type="text/javascript"><!--
// from http://www.somacon.com/p143.php
function setCheckedValue(radioObj, newValue) {
	if(!radioObj)
		return;
	var radioLength = radioObj.length;
	if(radioLength == undefined) {
		radioObj.checked = (radioObj.value == newValue.toString());
		return;
	}
	for(var i = 0; i < radioLength; i++) {
		radioObj[i].checked = false;
		if(radioObj[i].value == newValue.toString()) {
			radioObj[i].checked = true;
		}
	}
}
//--></script>

<form action="" method="post">
<fieldset>
	<h3>One-Click</h3>
	<p>This option applies to every single post. If you want to exclude certain posts , you can use the &#8220;Advanced Settings&#8220; form below.</p>
	<p>
		<strong>All</strong> comments and pings:
		<input name="for" value="oneclick-all" type="hidden" />
		<span class="submit">
			<input name="status" value="Open" type="submit" />
			<input name="status" value="Closed" type="submit" />
		</span>
	</p>
</fieldset>
</form>

<form action="" method="post">
<fieldset style="margin-top: 2em;">
	<h3>Posts in the last...</h3>
	<p>This option respects your excluded posts setting, if you have entered it below.</p>
	<p>
		<input name="for" value="oneclick-last" type="hidden" />
		<input name="posts" value="<?php echo $eco_html['db_excluded_posts']; ?>" type="hidden" />
		Open comments and pings for the last
		<input name="last" value="5" type="text" size="5" maxlength="5" />
		<select name="units">
			<option value="posts">Posts</option>
			<option value="days">Days</option>
			<option value="weeks">Weeks</option>
			<option value="months">Months</option>
			<option value="years">Years</option>
		</select>
		 , then close the rest.
		<span class="submit">
			<input name="oneclick" value="Update" type="submit" />
		</span>
	</p>
</fieldset>
</form>

</div>

<div class="wrap">

<form action="" method="post" name="advanced">

<h2>Advanced Settings</h2>

<fieldset class="options">
	
	<table width="100%" cellspacing="2" cellpadding="5" class="editform">
	
	<tr valign="top">
		<th width="33%" scope="row">Set the status to:</th>
		<td>
			<input name="status" value="open" id="on" type="radio" /> <label for="on">Open (on)</label><br />
			<input name="status" value="closed" id="off" type="radio" checked="checked" /> <label for="off">Closed (off)</label>
		</td>
	</tr>
	
	<tr valign="top">
		<th width="33%" scope="row">Apply this to:</th>
		<td>
			<input name="comments" value="comments" id="comments" type="checkbox" checked="checked" /> <label for="comments">Comments.</label><br />
			<input name="pings" value="pings" id="pings" type="checkbox" checked="checked" /> <label for="pings">Pings (and Trackbacks).</label>
		</td>
	</tr>
	
	<tr valign="top">
		<th width="33%" scope="row">Change the default status of new posts?</th>
		<td>
			<input name="future" id="future" value="future" type="checkbox" checked="checked" />
			<label for="future">Yes</label>
		</td>
	</tr>
	
	<tr valign="top">
		<th width="33%" scope="row">Which posts?</th>
		<td>
			<!-- Option 1 -->
			<p style="margin-top: 0;">
				<input name="for" value="for-new" id="for-new" type="radio" /> <label for="for-new">No existing posts, just change default status for new posts.</label>
			</p>
			<!-- Option 2 -->
			<p>
				<input name="for" value="for-all" id="for-all" type="radio" checked="checked" /> <label for="for-all">All existing posts</label>
			</p>
			<!-- Option 3 -->
			<p>
				<input name="for" value="for-bora" id="for-bora" type="radio" /> <label for="for-bora">All posts made</label>
				
				<span onclick="setCheckedValue(document.forms['advanced'].elements['for'], 'for-bora')">
				
					<select name="beforeafter">
						<option value="before" selected="selected">Before</option>
						<option value="after">After</option>
					</select> :
					
					<input name="day" value="01" type="text" maxlength="2" size="2" id="day" title="Enter the day (2 digits)" />
					<select name="month">
						<option value="01">January</option>
						<option value="02">February</option>
						<option value="03">March</option>
						<option value="04">April</option>
						<option value="05">May</option>
						<option value="06">June</option>
						<option value="07">July</option>
						<option value="08">August</option>
						<option value="09">September</option>
						<option value="10">October</option>
						<option value="11">November</option>
						<option value="12">December</option>
					</select>
					<input name="year" value="<?php echo date('Y') ?>" type="text" maxlength="4" size="4" id="year" title="Enter the year (4 digits)" />
					
				</span>
			</p>
			
			<!-- Option 4 -->
			<p>
				<input name="for" value="for-last" id="for-last" type="radio" /> <label for="for-last">The last</label>
				<span onclick="setCheckedValue(document.forms['advanced'].elements['for'], 'for-last')">
				<input name="last" value="5" id="last" type="text" maxlength="5" size="5" />
				<select name="units">
					<option value="posts">Posts</option>
					<option value="days">Days</option>
					<option value="weeks">Weeks</option>
					<option value="months">Months</option>
					<option value="years">Years</option>
				</select>
				</span><br />
				<label for="for-last"><strong>Note:</strong> This applies the status you choose to the posts
				within the range you specify. It then applies the <strong>opposite</strong>
				status to the remaining posts.</label>
			</p>
		</td>
	</tr>
	
	<tr valign="top">
		<th width="33%" scope="row">
			Exclude posts?
		</th>
		<td>
			<input name="posts" type="text" style="font-family:monospace;" value="<?php echo $eco_html['db_excluded_posts']; ?>" size="50" />
			<p>
				Enter the IDs of posts you don&#8217;t want to change, separated by a
				<strong>comma</strong>. For example: <kbd>12,34,129</kbd>.
			</p>				
			
			<p>
				IDs can be found on the &#8216;Manage posts&#8217; page. IDs are saved and will reappear
				the next time you load this page. If you want to include a post again, just delete its ID.
				(You may have to update its comments status manually.)
			</p>
		</td>
	</tr>
	
	</table>
	
</fieldset>
		
	<p class="submit">
		<input name="submit" value="Update" type="submit" />
	</p>
	
</form>

<?php // OTHERWISE IF FORM HAS BEEN SUBMITTED :
elseif ( $eco_clean['submitted'] === true ) :
/*
 *
 *
 * ------------------------------------------------ FILTER DATA ---------------------------------------------------------
 *
 *
 *
 */

// Comments, pings, or both?
if ( $_POST['comments'] == 'comments' &&  $_POST['pings'] == 'pings') {
	$eco_clean['which'] = 'both';
	$eco_clean['message_which'] = 'Comments and pings';
} elseif ( $_POST['comments'] == 'comments' && empty($_POST['pings']) ) {
	$eco_clean['which'] = 'comments';
	$eco_clean['message_which'] = 'Comments';
} elseif ( $_POST['pings'] == 'pings' && empty($_POST['comments']) ) {
	$eco_clean['which'] = 'pings';
	$eco_clean['message_which'] = 'Pings';
}

// Include future posts?
if ( $_POST['future'] == 'future' ) {
	$eco_clean['future'] = true;
}

// Status = open or closed?
switch ($_POST['status']) {
	case 'open':
	case 'Open':
		$eco_clean['status'] = 'open';
		$eco_clean['opposite_status'] = 'closed';
		break;
	case 'closed' :
	case 'Closed' :
		$eco_clean['status'] = 'closed';
		$eco_clean['opposite_status'] = 'open';
		break;
}

// Which posts?
switch ($_POST['for']) {
	case 'oneclick-all':
	case 'oneclick-last':
	case 'for-new':
	case 'for-all':
	case 'for-bora':
	case 'for-last':
		$eco_clean['for'] = $_POST['for'];
}

// BEFOREAFTER SETTINGS
if ( $eco_clean['for'] == 'for-bora') {
	
	if ( $_POST['beforeafter'] == 'before' || $_POST['beforeafter'] == 'after' ) {
		$eco_clean['beforeafter'] = $_POST['beforeafter'];
	}
	
	// Could I use this alone to check for valid date information?
	if ( checkdate($_POST['day'], $_POST['month'], $_POST['year']) ) {
		$eco_clean['date'] = date('Y-m-d',  strtotime("{$_POST['year']}-{$_POST['month']}-{$_POST['day']}"));
	}
	
}

// LAST 'X' SETTINGS
elseif ( $eco_clean['for'] == 'for-last' || $eco_clean['for'] == 'oneclick-last' ) {

	// Numeric, i.e. last X posts/months/etc.
	if ( is_numeric($_POST['last']) ) {
		$eco_clean['last'] = $_POST['last'];
	} else {
		$eco_clean['last'] = 'error';
	}
	
	switch($_POST['units']) {
		case 'posts':
		case 'days':
		case 'weeks':
		case 'months':
		case 'years':
			$eco_clean['units'] = $_POST['units'];
			break;
	}
	
	function date_from_last($time, $units) {
		switch ($units) {
			case 'days':
				$unixtime = time() - ($time * 86400);
				break;
			case 'weeks':
				$unixtime = time() - ($time * 604800);
				break;
			case 'months':
				// if X months ago is in this year
				if ( date('m') >= $time )	{
					$month = date('m') - ($time - 1);
					$year = date('Y');
					$unixtime = strtotime("$year-$month-01");
				// if X months ago is a multiple of 12 (24, 48, etc) then 1 or more years ago
				} elseif ( is_int($time / 12) ) {
					$year = date('Y') - ($time / 12);
					$month = date('m') - ($time / 12);
					$unixtime = strtotime("$year-$month-01");
				// date lies beyond current year
				} else {
					$months = $time % 12;
					$new_year = date(Y) - ( floor($time / 12) ); // this year / number of years
					if ( date('m') > $months ) {
						$new_month = date(m) - $months;
					} else {
						$new_month = $months + 12;
					}
					$unixtime = strtotime("$new_year-$new_month-01");
				}
				break;
			case 'years':
				$year = date(Y) - ( $time - 1 );
				$unixtime = strtotime("$year-01-01");
		}
		return date('Y-m-d', $unixtime);
	}
}

// IF POSTS FOR EXCLUSION HAVE BEEN ENTERED ...

if ( preg_match('/^[0-9, ]*$/', $_POST['posts']) ) {
	$treatments = preg_replace('/ {2,}/', ' ', $_POST['posts']); // remove excessive spaces
	$treatments = trim($treatments, ' ,'); // get rid of commas and whitespace at the beginning and end
	// convert number space number to number comma space number
	$eco_clean['posts'] = $treatments;
} elseif ( $_POST['posts'] == '' ) {
	$eco_clean['posts'] = '';
} else {
	$eco_clean['posts'] = 'error';
}

foreach ($eco_clean as $key => $value) {
	$eco_html[$key] = wp_specialchars($value);
}

/*
 *
 *
 * ------------------------------------------------ ERRORS AND DEBUGGING ---------------------------------------------------------
 *
 *
 *
 */
 
if (DEBUGGING === TRUE) {
	function eco_debugging() { ?>
		<h3>Debugging Information</h3>
		<pre style="border: 1px solid black; background: #fafafa; padding: 5px;"><?php
			global $eco_clean, $eco_message;
			$eco_POST_html = array();
			foreach ($_POST as $key => $value) {
				$eco_POST_html[$key] = wp_specialchars($value);
			}
			echo '<strong>$_POST</strong>:'."\n"; print_r($eco_POST_html); echo "\n";
			
			foreach ($eco_clean as $key => $value) {
				$eco_clean_html[$key] = wp_specialchars($value);
			}
			echo '<strong>$eco_clean</strong>:'."\n"; print_r($eco_clean_html); echo "\n";
			
			echo "These are the arguments supplied to eco_query():\n";
			echo '<strong>ECO_QUERYVARS</strong>:  ' . ECO_QUERYVARS . "\n";
			if ( defined('ECO_QUERYVARS2') ) {
				echo '<strong>ECO_QUERYVARS2</strong>: ' . ECO_QUERYVARS2 . "\n";
			}
			echo "\nSQL query(-ies) sent to the database\n";
			echo '<strong>ECO_SQL</strong>:  ' . ECO_SQL . "\n";
			if ( defined('ECO_SQL2') ) {
				echo '<strong>ECO_SQL2</strong>: ' . ECO_SQL2 . "\n";
			}
			echo "\n" . '<strong>$eco_message</strong>:' . "\n" . wp_specialchars($eco_message) . "\n\n";
			?></pre><?php
	}
}
 
function eco_error($err_message) {
	global $eco_error;
	echo '<div class="error">';
	echo '<p>An error has occurred:</p>';
	echo "<p><strong>$err_message</strong></p>";
	echo '<p>No settings have been changed.</p>';
	echo '</div>';
	if (DEBUGGING === TRUE) { eco_debugging(); }
	echo '</div></body></html>';
	die();
}

// If 'LAST X' and the 'last' value is wrong
if (($eco_clean['for'] == 'oneclick-last' || $eco_clean['for'] == 'for-last')
		&&
	($eco_clean['last'] == 'error')) {
	eco_error('Please provide a number in the &ldquo;last&rdquo; box.');
}

// If it's 'BEFORE/AFTER' and the date is wrong
if ( ($eco_clean['for'] == 'for-bora') && ($eco_clean['date'] == 'error') ) {
	eco_error('The date you provided wasn&#8217;t a valid calendar date, please check it for errors.');
}

// If 'EXCLUDED POSTS' have been entered and aren't nice
if ( $eco_clean['posts'] == 'error' ) {
	eco_error('Please make sure you enter the IDs of posts as numbers separated by a comma and space. For example: <kbd>12, 34, 129</kbd>');
}



/*
 *
 *
 * ----------------------------------------- UPDATE OPTIONS and SEND QUERY ---------------------------------------------------------
 *
 *
 *
 */
 
 if ( $eco_clean['posts'] != get_option('eco_excluded_posts') ) {
	update_option('eco_excluded_posts', $eco_clean['posts']);
}

function default_comments_status() {
	global $eco_clean;
	if ( $eco_clean['comments'] === true ) {
		if ($eco_clean['future'] === true || $eco_clean['for'] == 'for-new') {
			update_option('default_comment_status', $eco_clean['status']);
		}
	}
	if ( $eco_clean['pings'] === true ) {
		if ($eco_clean['future'] === true || $eco_clean['for'] == 'for-new') {
			update_option('default_ping_status', $eco_clean['status']);
		}
	}
}

function eco_query($which, $status, $horizon='', $criterion='', $excluded='') {
	global $wpdb;
	
	// Escape the strings, just in case!
	$which = $wpdb->escape($which);
	$status = $wpdb->escape($status);
	$horizon = $wpdb->escape($horizon);
	$criterion = $wpdb->escape($criterion);
	$excluded = $wpdb->escape($excluded);
	
	$sql = "UPDATE $wpdb->posts ";
	
	switch ($which) {
		case 'comments':
			$sql .= " SET `comment_status` = '$status' ";
			break;
		case 'pings':
			$sql .= " SET `ping_status` = '$status' ";
			break;
		case 'both':
			$sql .= " SET `comment_status` = '$status', `ping_status` = '$status' ";
	}
	
	$sql .= " WHERE `post_status` = 'publish' ";
	
	if ( $excluded != '' ) {
		$sql .= " AND `ID` NOT IN ($excluded) ";
	}
	
	if ( $horizon != '' ) {
		switch($horizon) {
			case 'before' :
				$sql .= " AND `post_date` < '$criterion' ";
				break;
			case 'after' :
				$sql .= " AND `post_date` > '$criterion' ";
				break;
			case 'last' :
				$sql .= " ORDER BY `post_date` DESC LIMIT $criterion ";
				break;
			case 'remainder' :
				$sql .= " ORDER BY `post_date` LIMIT $criterion ";
				break;
		}
	}
	
	$wpdb->query($sql);
	
	if (DEBUGGING === TRUE) {
		if ( defined('ECO_QUERYVARS') ) {
			define ('ECO_QUERYVARS2', wp_specialchars("[$which] [$status] [$horizon] [$criterion] [$excluded]"));
		} else {
			define ('ECO_QUERYVARS', wp_specialchars("[$which] [$status] [$horizon] [$criterion] [$excluded]"));
		}
		
		if ( defined('ECO_SQL') ) {
			define ('ECO_SQL2', wp_specialchars($sql));
		} else {
			define ('ECO_SQL', wp_specialchars($sql));
		}
	}
	
}

switch ($eco_clean['for']) {

// IF ALL POSTS ONE CLICK SELECTED
case 'oneclick-all' :
	update_option('default_comment_status', $eco_clean['status']);
	update_option('default_ping_status', $eco_clean['status']);
	eco_query('both', $eco_clean['status']);
	$eco_message =
		'<strong>Comments and pings</strong> for '
		. '<strong>all existing posts</strong> have been set to '
		. "<strong>{$eco_html['status']}</strong>. The default status for comments and pings on new posts is also "
		. "<strong>{$eco_html['status']}</strong>.";
	break;


// IF LAST 'X' ONE CLICK SELECTED
case 'oneclick-last' :
	update_option('default_comment_status', 'open');
	update_option('default_ping_status', 'open');
	$eco_db_excluded_posts = get_option('eco_excluded_posts');
	if ( $eco_clean['units'] == 'posts' ) {
		$count = $wpdb->get_var("SELECT COUNT(ID) FROM $wpdb->posts WHERE `post_status` = 'publish'");
		$remainder = $count - $eco_clean['last'];
		if ( $eco_clean['last'] > $count ) {
			if ( $count == '1' ) {
				$post_posts = 'post';
				$be = 'is';
			} else {
				$post_posts = 'posts';
				$be = 'are';
			}
			eco_error("You can't change the last {$eco_html['last']} posts because there $be only $count $post_posts!");
		} else {
			eco_query('both', 'open', 'last', $eco_clean['last'], $eco_clean['db_excluded_posts']);
			eco_query('both', 'closed', 'remainder', $remainder, $eco_clean['db_excluded_posts']);
		}
	} else {
		$eco_clean['date'] = date_from_last($eco_clean['last'], $eco_clean['units']);
		eco_query('both', 'open', 'after', $eco_clean['date'], $eco_clean['db_excluded_posts']);
		eco_query('both', 'closed', 'before', $eco_clean['date'], $eco_clean['db_excluded_posts']);
	}
	$eco_message =
		'<strong>Comments and pings</strong> for the '
		. "<strong>last {$eco_html['last']} {$eco_html['units']}</strong> "
		. 'are now <strong>open</strong>. The rest have been <strong>closed</strong>.';
	break;


// IF 'NO EXISTING POSTS' SELECTED
case 'for-new' :
	default_comments_status();
	$eco_message =
		'The default setting for <strong>' . strtolower($eco_html['message_which']) . '</strong> on new posts have been set to '
		. " <strong>{$eco_html['status']}</strong>. No existing posts have been changed.";
	break;


// IF 'ALL EXISTING POSTS' SELECTED
case 'for-all' :
	default_comments_status();
	eco_query($eco_clean['which'], $eco_clean['status'], null, null, $eco_clean['posts']);
	$eco_message =
		"<strong>{$eco_html['message_which']}</strong> for <strong>all existing posts</strong> have been set to "
		. " <strong>{$eco_html['status']}</strong>.";
	break;


// IF 'BEFORE / AFTER' SELECTED
case 'for-bora' :
	default_comments_status();
	eco_query($eco_clean['which'], $eco_clean['status'], $eco_clean['beforeafter'], $eco_clean['date'], $eco_clean['posts']);
	$eco_message =
		"<strong>{$eco_html['message_which']}</strong> for posts made "
		. "<strong>{$eco_html['beforeafter']} " . date('jS F, Y', strtotime($eco_clean['date'])) . "</strong>"
		. " are now <strong>{$eco_html['status']}</strong>.";
	break;


// IF 'LAST X' SELECTED
case 'for-last' :
	default_comments_status();
	if ( $eco_clean['units'] == 'posts' ) {
		$count = $wpdb->get_var("SELECT COUNT(ID) FROM $wpdb->posts WHERE `post_status` = 'publish'");
		$remainder = $count - $eco_clean['last'];
		if ( $eco_clean['last'] > $count ) {
			if ( $count == '1' ) {
				$post_posts = 'post';
				$be = 'is';
			} else {
				$post_posts = 'posts';
				$be = 'are';
			}
			eco_error("You can't change the last {$eco_html['last']} posts because there $be only $count $post_posts!");
		} else {
			eco_query($eco_clean['which'], $eco_clean['status'], 'last', $eco_clean['last'], $eco_clean['posts']);
			eco_query($eco_clean['which'], $eco_clean['opposite_status'], 'remainder', $remainder, $eco_clean['posts']);
		}
	} else {
		$eco_clean['date'] = date_from_last($eco_clean['last'], $eco_clean['units']);
		eco_query($eco_clean['which'], $eco_clean['status'], 'after', $eco_clean['date'], $eco_clean['posts']);
		eco_query($eco_clean['which'], $eco_clean['opposite_status'], 'before', $eco_clean['date'], $eco_clean['posts']);
	}
		
	$eco_message =
		"<strong>{$eco_html['message_which']}</strong> for the "
		. "<strong>last {$eco_html['last']} {$eco_html['units']}</strong>"
		. " are now <strong>{$eco_html['status']}</strong>. The rest are now"
		. " <strong>{$eco_html['opposite_status']}</strong>.";
	break;

} //end switch

// SHOW THE RESULTS OF THE QUERY TO THE USER
?>
<h2>Results</h2>

<ul>

<?php

echo "\t<li>$eco_message</li>\n";

if ( $eco_clean['future'] === true ) {
	echo "\t<li>The default setting for <strong>" . strtolower($eco_clean['message_which'])
	. "</strong> has also been set to <strong>{$eco_html['status']}</strong>.</li>\n";
}

if ( !empty($eco_clean['posts']) && $eco_clean['for'] != 'for-new' ) {
	echo "\t<li>The following posts were not changed: <strong>{$eco_html['posts']}</strong>.</li>\n";
}
	
?>

</ul>

<?php

if (DEBUGGING === TRUE) { eco_debugging($eco_html); }

endif; // end if form submitted ?>

</div>

<?php } // close function

add_action('admin_menu', 'eco_extended_comments_options');

?>