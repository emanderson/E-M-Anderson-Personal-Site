<?php
function veryplaintxt_globalnav() {
	echo "<div id=\"globalnav\"><ul id=\"menu\">";
	if ( !is_home() || is_paged() ) { ?><li class="page_item home_page_item"><a href="<?php bloginfo('home') ?>" title="<?php echo wp_specialchars(get_bloginfo('name'), 1) ?>"><?php _e('Home', 'veryplaintxt') ?></a></li><?php }
	$menu = wp_list_pages('title_li=&sort_column=post_title&echo=0');
	echo str_replace(array("\r", "\n", "\t"), '', $menu);
	echo "</ul></div>\n";
}

function veryplaintxt_admin_hCard() {
	global $wpdb, $user_info;
	$user_info = get_userdata(1);
	echo '<span class="vcard"><a class="url fn n" href="' . $user_info->user_url . '"><span class="given-name">' . $user_info->first_name . '</span> <span class="family-name">' . $user_info->last_name . '</span></a></span>';
}

function veryplaintxt_author_hCard() {
	global $wpdb, $authordata;
	echo '<span class="entry-author author vcard"><a class="url fn" href="' . get_author_link(false, $authordata->ID, $authordata->user_nicename) . '" title="View all posts by ' . $authordata->display_name . '">' . get_the_author() . '</a></span>';
}

function veryplaintxt_body_class( $print = true ) {
	global $wp_query, $current_user;

	$c = array('wordpress');

	veryplaintxt_date_classes(time(), $c);

	is_home()       ? $c[] = 'home'       : null;
	is_archive()    ? $c[] = 'archive'    : null;
	is_date()       ? $c[] = 'date'       : null;
	is_search()     ? $c[] = 'search'     : null;
	is_paged()      ? $c[] = 'paged'      : null;
	is_attachment() ? $c[] = 'attachment' : null;
	is_404()        ? $c[] = 'four04'     : null;

	if ( is_single() ) {
		the_post();
		$c[] = 'single';
		if ( isset($wp_query->post->post_date) )
			veryplaintxt_date_classes(mysql2date('U', $wp_query->post->post_date), $c, 's-');
		foreach ( (array) get_the_category() as $cat )
			$c[] = 's-category-' . $cat->category_nicename;
			$c[] = 's-author-' . get_the_author_login();
		rewind_posts();
	}

	else if ( is_author() ) {
		$author = $wp_query->get_queried_object();
		$c[] = 'author';
		$c[] = 'author-' . $author->user_nicename;
	}
	
	else if ( is_category() ) {
		$cat = $wp_query->get_queried_object();
		$c[] = 'category';
		$c[] = 'category-' . $cat->category_nicename;
	}

	else if ( is_page() ) {
		the_post();
		$c[] = 'page';
		$c[] = 'page-author-' . get_the_author_login();
		rewind_posts();
	}

	if ( $current_user->ID )
		$c[] = 'loggedin';
		
	$c = join(' ', apply_filters('body_class',  $c));

	return $print ? print($c) : $c;
}

function veryplaintxt_post_class( $print = true ) {
	global $post, $veryplaintxt_post_alt;

	$c = array('hentry', "p$veryplaintxt_post_alt", $post->post_type, $post->post_status);

	$c[] = 'author-' . get_the_author_login();
	
	foreach ( (array) get_the_category() as $cat )
		$c[] = 'category-' . $cat->category_nicename;

	veryplaintxt_date_classes(mysql2date('U', $post->post_date), $c);

	if ( ++$veryplaintxt_post_alt % 2 )
		$c[] = 'alt';
		
	$c = join(' ', apply_filters('post_class', $c));

	return $print ? print($c) : $c;
}
$veryplaintxt_post_alt = 1;

function veryplaintxt_comment_class( $print = true ) {
	global $comment, $post, $veryplaintxt_comment_alt;

	$c = array($comment->comment_type);

	if ( $comment->user_id > 0 ) {
		$user = get_userdata($comment->user_id);

		$c[] = "byuser commentauthor-$user->user_login";

		if ( $comment->user_id === $post->post_author )
			$c[] = 'bypostauthor';
	}

	veryplaintxt_date_classes(mysql2date('U', $comment->comment_date), $c, 'c-');
	if ( ++$veryplaintxt_comment_alt % 2 )
		$c[] = 'alt';

	$c[] = "c$veryplaintxt_comment_alt";

	if ( is_trackback() ) {
		$c[] = 'trackback';
	}

	$c = join(' ', apply_filters('comment_class', $c));

	return $print ? print($c) : $c;
}

function veryplaintxt_date_classes($t, &$c, $p = '') {
	$t = $t + (get_settings('gmt_offset') * 3600);
	$c[] = $p . 'y' . gmdate('Y', $t);
	$c[] = $p . 'm' . gmdate('m', $t);
	$c[] = $p . 'd' . gmdate('d', $t);
	$c[] = $p . 'h' . gmdate('h', $t);
}

function veryplaintxt_other_cats($glue) {
	$current_cat = single_cat_title('', false);
	$separator = "\n";
	$cats = explode($separator, get_the_category_list($separator));

	foreach ( $cats as $i => $str ) {
		if ( strstr($str, ">$current_cat<") ) {
			unset($cats[$i]);
			break;
		}
	}

	if ( empty($cats) )
		return false;

	return trim(join($glue, $cats));
}

function widget_veryplaintxt_search($args) {
	extract($args);
?>
		<?php echo $before_widget ?>
			<?php echo $before_title ?><label for="s"><?php _e('Search', 'veryplaintxt') ?></label><?php echo $after_title ?>
			<form id="searchform" method="get" action="<?php bloginfo('home') ?>">
				<div>
					<input id="s" name="s" type="text" value="<?php echo wp_specialchars(stripslashes($_GET['s']), true) ?>" size="10" />
					<input id="searchsubmit" name="searchsubmit" type="submit" value="<?php _e('Find', 'veryplaintxt') ?>" />
				</div>
			</form>
		<?php echo $after_widget ?>
<?php
}

function widget_veryplaintxt_meta($args) {
	extract($args);
	$options = get_option('widget_meta');
	$title = empty($options['title']) ? __('Meta', 'veryplaintxt') : $options['title'];
?>
		<?php echo $before_widget; ?>
			<?php echo $before_title . $title . $after_title; ?>
			<ul>
				<?php wp_register() ?>
				<li><?php wp_loginout() ?></li>
				<?php wp_meta() ?>
			</ul>
		<?php echo $after_widget; ?>
<?php
}

function widget_veryplaintxt_homelink($args) {
	extract($args);
	$options = get_option('widget_veryplaintxt_homelink');
	$title = empty($options['title']) ? __('Home', 'veryplaintxt') : $options['title'];
?>
<?php if ( !is_home() || is_paged() ) { ?>
		<?php echo $before_widget; ?>
			<?php echo $before_title ?><a href="<?php bloginfo('home') ?>" title="<?php echo wp_specialchars(get_bloginfo('name'), 1) ?>"><?php echo $title ?></a><?php echo $after_title ?>
		<?php echo $after_widget; ?>
<?php } ?>
<?php
}

function widget_veryplaintxt_homelink_control() {
	$options = $newoptions = get_option('widget_veryplaintxt_homelink');
	if ( $_POST["homelink-submit"] ) {
		$newoptions['title'] = strip_tags(stripslashes($_POST["homelink-title"]));
	}
	if ( $options != $newoptions ) {
		$options = $newoptions;
		update_option('widget_veryplaintxt_homelink', $options);
	}
	$title = htmlspecialchars($options['title'], ENT_QUOTES);
?>
		<p style="text-align:left;"><?php _e('Adds a link to the home page on every page <em>except</em> the home.', 'veryplaintxt'); ?></p>
		<p><label for="homelink-title"><?php _e('Link Text:'); ?> <input style="width: 175px;" id="homelink-title" name="homelink-title" type="text" value="<?php echo $title; ?>" /></label></p>
		<input type="hidden" id="homelink-submit" name="homelink-submit" value="1" />
<?php
}

function widget_veryplaintxt_rsslinks($args) {
	extract($args);
	$options = get_option('widget_veryplaintxt_rsslinks');
	$title = empty($options['title']) ? __('RSS Links', 'veryplaintxt') : $options['title'];
?>
		<?php echo $before_widget; ?>
			<?php echo $before_title . $title . $after_title; ?>
			<ul>
				<li><a href="<?php bloginfo('rss2_url') ?>" title="<?php echo wp_specialchars(get_bloginfo('name'), 1) ?> RSS 2.0 Feed" rel="alternate" type="application/rss+xml"><?php _e('All posts', 'veryplaintxt') ?></a></li>
				<li><a href="<?php bloginfo('comments_rss2_url') ?>" title="<?php echo wp_specialchars(bloginfo('name'), 1) ?> Comments RSS 2.0 Feed" rel="alternate" type="application/rss+xml"><?php _e('All comments', 'veryplaintxt') ?></a></li>
			</ul>
		<?php echo $after_widget; ?>
<?php
}

function widget_veryplaintxt_rsslinks_control() {
	$options = $newoptions = get_option('widget_veryplaintxt_rsslinks');
	if ( $_POST["rsslinks-submit"] ) {
		$newoptions['title'] = strip_tags(stripslashes($_POST["rsslinks-title"]));
	}
	if ( $options != $newoptions ) {
		$options = $newoptions;
		update_option('widget_veryplaintxt_rsslinks', $options);
	}
	$title = htmlspecialchars($options['title'], ENT_QUOTES);
?>
			<p><label for="rsslinks-title"><?php _e('Title:'); ?> <input style="width: 250px;" id="rsslinks-title" name="rsslinks-title" type="text" value="<?php echo $title; ?>" /></label></p>
			<input type="hidden" id="rsslinks-submit" name="rsslinks-submit" value="1" />
<?php
}

function widget_veryplaintxt_links() {
	if ( function_exists('wp_list_bookmarks') ) {
		wp_list_bookmarks(array('title_before'=>'<h3>', 'title_after'=>'</h3>', 'show_images'=>true));
	} else {
		global $wpdb;

		$cats = $wpdb->get_results("
			SELECT DISTINCT link_category, cat_name, show_images, 
				show_description, show_rating, show_updated, sort_order, 
				sort_desc, list_limit
			FROM `$wpdb->links` 
			LEFT JOIN `$wpdb->linkcategories` ON (link_category = cat_id)
			WHERE link_visible =  'Y'
				AND list_limit <> 0
			ORDER BY cat_name ASC", ARRAY_A);
	
		if ($cats) {
			foreach ($cats as $cat) {
				$orderby = $cat['sort_order'];
				$orderby = (bool_from_yn($cat['sort_desc'])?'_':'') . $orderby;

				echo '	<li id="linkcat-' . $cat['link_category'] . '" class="linkcat"><h3>' . $cat['cat_name'] . "</h3>\n\t<ul>\n";
				get_links($cat['link_category'],
					'<li>',"</li>","\n",
					bool_from_yn($cat['show_images']),
					$orderby,
					bool_from_yn($cat['show_description']),
					bool_from_yn($cat['show_rating']),
					$cat['list_limit'],
					bool_from_yn($cat['show_updated']));

				echo "\n\t</ul>\n</li>\n";
			}
		}
	}
}

function veryplaintxt_widgets_init() {
	if ( !function_exists('register_sidebars') )
		return;

	$p = array(
		'before_title' => "<h3 class='widgettitle'>",
		'after_title' => "</h3>\n",
	);
	register_sidebars(1, $p);
	register_sidebar_widget(__('Search', 'veryplaintxt'), 'widget_veryplaintxt_search', null, 'search');
	unregister_widget_control('search');
	register_sidebar_widget(__('Meta', 'veryplaintxt'), 'widget_veryplaintxt_meta', null, 'meta');
	unregister_widget_control('meta');
	register_sidebar_widget(__('Links', 'veryplaintxt'), 'widget_veryplaintxt_links', null, 'links');
	unregister_widget_control('links');
	register_sidebar_widget(array('Home Link', 'widgets'), 'widget_veryplaintxt_homelink', null, 'homelink');
	register_widget_control(array('Home Link', 'widgets'), 'widget_veryplaintxt_homelink_control', 300, 125, 'homelink');
	register_sidebar_widget(array('RSS Links', 'widgets'), 'widget_veryplaintxt_rsslinks', null, 'rsslinks');
	register_widget_control(array('RSS Links', 'widgets'), 'widget_veryplaintxt_rsslinks_control', 300, 90, 'rsslinks');
}

function veryplaintxt_add_admin() {
	if ( $_GET['page'] == basename(__FILE__) ) {
	
		if ( 'save' == $_REQUEST['action'] ) {

			update_option( 'veryplaintxt_basefontsize', $_REQUEST['vp_basefontsize'] );
			update_option( 'veryplaintxt_basefontfamily', $_REQUEST['vp_basefontfamily'] );
			update_option( 'veryplaintxt_headingfontfamily', $_REQUEST['vp_headingfontfamily'] );
			update_option( 'veryplaintxt_posttextalignment', $_REQUEST['vp_posttextalignment'] );
			update_option( 'veryplaintxt_layoutwidth', $_REQUEST['vp_layoutwidth'] );
			update_option( 'veryplaintxt_maxwidth', $_REQUEST['vp_maxwidth'] );
			update_option( 'veryplaintxt_minwidth', $_REQUEST['vp_minwidth'] );
			update_option( 'veryplaintxt_sidebarposition', $_REQUEST['vp_sidebarposition'] );
			update_option( 'veryplaintxt_sidebartextalignment', $_REQUEST['vp_sidebartextalignment'] );

			if( isset( $_REQUEST['vp_basefontsize'] ) ) { update_option( 'veryplaintxt_basefontsize', $_REQUEST['vp_basefontsize']  ); } else { delete_option( 'veryplaintxt_basefontsize' ); }
			if( isset( $_REQUEST['vp_basefontfamily'] ) ) { update_option( 'veryplaintxt_basefontfamily', $_REQUEST['vp_basefontfamily']  ); } else { delete_option( 'veryplaintxt_basefontfamily' ); }
			if( isset( $_REQUEST['vp_headingfontfamily'] ) ) { update_option( 'veryplaintxt_headingfontfamily', $_REQUEST['vp_headingfontfamily']  ); } else { delete_option('veryplaintxt_headingfontfamily'); }
			if( isset( $_REQUEST['vp_posttextalignment' ] ) ) { update_option( 'veryplaintxt_posttextalignment', $_REQUEST['vp_posttextalignment']  ); } else { delete_option('veryplaintxt_posttextalignment'); }
			if( isset( $_REQUEST['vp_layoutwidth' ] ) ) { update_option( 'veryplaintxt_layoutwidth', $_REQUEST['vp_layoutwidth']  ); } else { delete_option('veryplaintxt_layoutwidth'); }
			if( isset( $_REQUEST['vp_maxwidth' ] ) ) { update_option( 'veryplaintxt_maxwidth', $_REQUEST['vp_maxwidth']  ); } else { delete_option('veryplaintxt_maxwidth'); }
			if( isset( $_REQUEST['vp_minwidth' ] ) ) { update_option( 'veryplaintxt_minwidth', $_REQUEST['vp_minwidth']  ); } else { delete_option('veryplaintxt_minwidth'); }
			if( isset( $_REQUEST['vp_sidebarposition' ] ) ) { update_option( 'veryplaintxt_sidebarposition', $_REQUEST['vp_sidebarposition']  ); } else { delete_option('veryplaintxt_sidebarposition'); }
			if( isset( $_REQUEST['vp_sidebartextalignment' ] ) ) { update_option( 'veryplaintxt_sidebartextalignment', $_REQUEST['vp_sidebartextalignment']  ); } else { delete_option('veryplaintxt_sidebartextalignment'); }

			header("Location: themes.php?page=functions.php&saved=true");
			die;

		} else if( 'reset' == $_REQUEST['action'] ) {
			delete_option('veryplaintxt_basefontsize');
			delete_option('veryplaintxt_basefontfamily');
			delete_option('veryplaintxt_headingfontfamily');
			delete_option('veryplaintxt_posttextalignment');
			delete_option('veryplaintxt_layoutwidth');
			delete_option('veryplaintxt_maxwidth');
			delete_option('veryplaintxt_minwidth');
			delete_option('veryplaintxt_sidebarposition');
			delete_option('veryplaintxt_sidebartextalignment');

			header("Location: themes.php?page=functions.php&reset=true");
			die;
		}
		add_action('admin_head', 'veryplaintxt_admin_head');
	}
    add_theme_page("veryplaintxt Options", "veryplaintxt Options", 'edit_themes', basename(__FILE__), 'veryplaintxt_admin');
}

function veryplaintxt_admin_head() {
?>
<meta name="author" content="Scott Allan Wallick" />
<style type="text/css" media="all">
/*<![CDATA[*/
div.wrap table.editform tr td input.radio{background:#fff;border:none;margin-right:3px;}
div.wrap table.editform tr td input.text{text-align:center;width:5em;}
div.wrap table.editform tr td label{font-size:1.2em;line-height:140%;}
div.wrap table.editform tr td select.dropdown option{margin-right:10px;}
div.wrap table.editform th h3{font:normal 2em/133% georgia,times,serif;margin:1em 0 0.3em;color#222;}
div.wrap table.editform td.important span {background:#f5f5df;padding:0.1em 0.2em;font:85%/175% georgia,times,serif;}
span.info{color:#555;display:block;font-size:90%;margin:3px 0 9px;}
span.info span{font-weight:bold;}
.arial{font-family:arial,helvetica,sans-serif;}
.courier{font-family:'courier new',courier,monospace;}
.georgia{font-family:georgia,times,serif;}
.lucida-console{font-family:'lucida console',monaco,monospace;}
.lucida-unicode{font-family:'lucida sans unicode','lucida grande',sans-serif;}
.tahoma{font-family:tahoma,geneva,sans-serif;}
.times{font-family:'times new roman',times,serif;}
.trebuchet{font-family:'trebuchet ms',helvetica,sans-serif;}
.verdana{font-family:verdana,geneva,sans-serif;}
/*]]>*/
</style>
<?php
}

function veryplaintxt_admin() {
	if ( $_REQUEST['saved'] ) { ?><div id="message1" class="updated fade"><p><?php printf(__('Veryplaintxt theme options saved. <a href="%s">View site &rsaquo;</a>', 'veryplaintxt'), get_bloginfo('home') . '/'); ?></p></div><?php }
	if ( $_REQUEST['reset'] ) { ?><div id="message2" class="updated fade"><p><?php _e('Veryplaintxt theme options reset.', 'veryplaintxt'); ?></p></div><?php } ?>

<?php $installedVersion = "3.0"; ?>
<script src="http://www.plaintxt.org/ver-check/veryplaintxt-ver-check.php?version=<?php echo $installedVersion; ?>" type="text/javascript"></script>

<div class="wrap">

	<h2><?php _e('Theme Options', 'veryplaintxt'); ?></h2>
	<p><?php _e('Thanks for selecting the <span class="theme-title">veryplaintxt</span> theme. You can customize this theme with the options below. <strong>You must click on <i><u>S</u>ave Options</i> to save any changes.</strong> You can also discard your changes and reload the default settings by clicking on <i><u>R</u>eset</i>.', 'veryplaintxt'); ?></p>
	
	<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">

		<table class="editform" cellspacing="2" cellpadding="5" width="100%" border="0" summary="veryplaintxt theme options">

			<tr valign="top">
				<th scope="row" width="33%"><h3><?php _e('Typography', 'veryplaintxt'); ?></h3></th>
			</tr>

			<tr valign="top">
				<th scope="row" width="33%"><label for="vp_basefontsize"><?php _e('Base font size', 'veryplaintxt'); ?></label></th> 
				<td>
					<input id="vp_basefontsize" name="vp_basefontsize" type="text" class="text" value="<?php if ( get_settings('veryplaintxt_basefontsize') == "" ) { echo "90%"; } else { echo get_settings('veryplaintxt_basefontsize'); } ?>" tabindex="1" size="10" /><br/>
					<span class="info"><?php _e('The base font size globally affects the size of text throughout your blog. This can be in any unit (e.g., px, pt, em), but I suggest using a percentage (%). Default is 90%.', 'veryplaintxt'); ?></span>
				</td>
			</tr>

			<tr valign="top">
				<th scope="row" width="33%"><?php _e('Base font family', 'veryplaintxt'); ?></th> 
				<td>
					<label for="vp_basefontArial" class="arial"><input id="vp_basefontArial" name="vp_basefontfamily" type="radio" class="radio" value="arial, helvetica, sans-serif" <?php if ( get_settings('veryplaintxt_basefontfamily') == "arial, helvetica, sans-serif" ) { echo 'checked="checked"'; } ?> tabindex="2" />Arial</label><br/>
					<label for="vp_basefontCourier" class="courier"><input id="vp_basefontCourier" name="vp_basefontfamily" type="radio" class="radio" value="'courier new', courier, monospace" <?php if ( get_settings('veryplaintxt_basefontfamily') == "\'courier new\', courier, monospace" ) { echo 'checked="checked"'; } ?> tabindex="3" />Courier</label><br/>
					<label for="vp_basefontGeorgia" class="georgia"><input id="vp_basefontGeorgia" name="vp_basefontfamily" type="radio" class="radio" value="georgia, times, serif" <?php if ( get_settings('veryplaintxt_basefontfamily') == "georgia, times, serif" ) { echo 'checked="checked"'; } ?> tabindex="4" />Georgia</label><br/>
					<label for="vp_basefontLucidaConsole" class="lucida-console"><input id="vp_basefontLucidaConsole" name="vp_basefontfamily" type="radio" class="radio" value="'lucida console', monaco, monospace" <?php if ( get_settings('veryplaintxt_basefontfamily') == "\'lucida console\', monaco, monospace" ) { echo 'checked="checked"'; } ?> tabindex="5" />Lucida Console</label><br/>
					<label for="vp_basefontLucidaUnicode" class="lucida-unicode"><input id="vp_basefontLucidaUnicode" name="vp_basefontfamily" type="radio" class="radio" value="'lucida sans unicode', 'lucida grande', sans-serif" <?php if ( get_settings('veryplaintxt_basefontfamily') == "\'lucida sans unicode\', \'lucida grande\', sans-serif" ) { echo 'checked="checked"'; } ?> tabindex="6" />Lucida Sans Unicode</label><br/>
					<label for="vp_basefontTahoma" class="tahoma"><input id="vp_basefontTahoma" name="vp_basefontfamily" type="radio" class="radio" value="tahoma, geneva, sans-serif" <?php if ( get_settings('veryplaintxt_basefontfamily') == "tahoma, geneva, sans-serif" ) { echo 'checked="checked"'; } ?> tabindex="7" />Tahoma</label><br/>
					<label for="vp_basefontTimes" class="times"><input id="vp_basefontTimes" name="vp_basefontfamily" type="radio" class="radio" value="'times new roman', times, serif" <?php if ( ( get_settings('veryplaintxt_basefontfamily') == "") || ( get_settings('veryplaintxt_basefontfamily') == "\'times new roman\', times, serif") ) { echo 'checked="checked"'; } ?> tabindex="8" />Times</label><br/>
					<label for="vp_basefontTrebuchetMS" class="trebuchet"><input id="vp_basefontTrebuchetMS" name="vp_basefontfamily" type="radio" class="radio" value="'trebuchet ms', helvetica, sans-serif" <?php if ( get_settings('veryplaintxt_basefontfamily') == "\'trebuchet ms\', helvetica, sans-serif" ) { echo 'checked="checked"'; } ?> tabindex="9" />Trebuchet MS</label><br/>
					<label for="vp_basefontVerdana" class="verdana"><input id="vp_basefontVerdana" name="vp_basefontfamily" type="radio" class="radio" value="verdana, geneva, sans-serif" <?php if ( get_settings('veryplaintxt_basefontfamilyfamily') == "verdana, geneva, sans-serif" ) { echo 'checked="checked"'; } ?> tabindex="10" />Verdana</label><br/>
					<span class="info"><?php printf(__('The base font family sets the font for everything except content headings. The selection is limited to %1$s fonts, as they will display correctly. Default is <span class="times">Times</span>.', 'veryplaintxt'), '<cite><a href="http://en.wikipedia.org/wiki/Web_safe_fonts" title="Web safe fonts - Wikipedia">web safe</a></cite>'); ?></span>
				</td>
			</tr>

			<tr valign="top">
				<th scope="row" width="33%"><?php _e('Heading font family', 'veryplaintxt'); ?></th> 
				<td>
					<label for="vp_headingfontArial" class="arial"><input id="vp_headingfontArial" name="vp_headingfontfamily" type="radio" class="radio" value="arial, helvetica, sans-serif" <?php if ( ( get_settings('veryplaintxt_headingfontfamily') == "") || ( get_settings('veryplaintxt_headingfontfamily') == "arial, helvetica, sans-serif") ) { echo 'checked="checked"'; } ?> tabindex="11" />Arial</label><br/>
					<label for="vp_headingfontCourier" class="courier"><input id="vp_headingfontCourier" name="vp_headingfontfamily" type="radio" class="radio" value="'courier new', courier, monospace" <?php if ( get_settings('veryplaintxt_headingfontfamily') == "\'courier new\', courier, monospace" ) { echo 'checked="checked"'; } ?> tabindex="12" />Courier</label><br/>
					<label for="vp_headingfontGeorgia" class="georgia"><input id="vp_headingfontGeorgia" name="vp_headingfontfamily" type="radio" class="radio" value="georgia, times, serif" <?php if ( get_settings('veryplaintxt_headingfontfamily') == "georgia, times, serif" ) { echo 'checked="checked"'; } ?> tabindex="13" />Georgia</label><br/>
					<label for="vp_headingfontLucidaConsole" class="lucida-console"><input id="vp_headingfontLucidaConsole" name="vp_headingfontfamily" type="radio" class="radio" value="'lucida console', monaco, monospace" <?php if ( get_settings('veryplaintxt_headingfontfamily') == "\'lucida console\', monaco, monospace" ) { echo 'checked="checked"'; } ?> tabindex="14" />Lucida Console</label><br/>
					<label for="vp_headingfontLucidaUnicode" class="lucida-unicode"><input id="vp_headingfontLucidaUnicode" name="vp_headingfontfamily" type="radio" class="radio" value="'lucida sans unicode', 'lucida grande', sans-serif" <?php if ( get_settings('veryplaintxt_headingfontfamily') == "\'lucida sans unicode\', \'lucida grande\', sans-serif" ) { echo 'checked="checked"'; } ?> tabindex="15" />Lucida Sans Unicode</label><br/>
					<label for="vp_headingfontTahoma" class="tahoma"><input id="vp_headingfontTahoma" name="vp_headingfontfamily" type="radio" class="radio" value="tahoma, geneva, sans-serif" <?php if ( get_settings('veryplaintxt_headingfontfamily') == "tahoma, geneva, sans-serif" ) { echo 'checked="checked"'; } ?> tabindex="16" />Tahoma</label><br/>
					<label for="vp_headingfontTimes" class="times"><input id="vp_headingfontTimes" name="vp_headingfontfamily" type="radio" class="radio" value="'times new roman', times, serif" <?php if ( get_settings('veryplaintxt_headingfontfamily') == "\'times new roman\', times, serif" ) { echo 'checked="checked"'; } ?> tabindex="17" />Times</label><br/>
					<label for="vp_headingfontTrebuchetMS" class="trebuchet"><input id="vp_headingfontTrebuchetMS" name="vp_headingfontfamily" type="radio" class="radio" value="'trebuchet ms', helvetica, sans-serif" <?php if ( get_settings('veryplaintxt_headingfontfamily') == "\'trebuchet ms\', helvetica, sans-serif" ) { echo 'checked="checked"'; } ?> tabindex="18" />Trebuchet MS</label><br/>
					<label for="vp_headingfontVerdana" class="verdana"><input id="vp_headingfontVerdana" name="vp_headingfontfamily" type="radio" class="radio" value="verdana, geneva, sans-serif" <?php if ( get_settings('veryplaintxt_headingfontfamilyfamily') == "verdana, geneva, sans-serif" ) { echo 'checked="checked"'; } ?> tabindex="19" />Verdana</label><br/>
					<span class="info"><?php printf(__('The heading font family sets the font for all content headings. The selection is limited to %1$s fonts, as they will display correctly. Default is <span class="arial">Arial</span>. ', 'veryplaintxt'), '<cite><a href="http://en.wikipedia.org/wiki/Web_safe_fonts" title="Web safe fonts - Wikipedia">web safe</a></cite>'); ?></span>
				</td>
			</tr>

			<tr valign="top">
				<th scope="row" width="33%"><h3><?php _e('Layout', 'veryplaintxt'); ?></h3></th>
			</tr>

			<tr valign="top">
				<th scope="row" width="33%"><label for="vp_layoutwidth"><?php _e('Layout width', 'veryplaintxt'); ?></label></th> 
				<td>
					<input id="vp_layoutwidth" name="vp_layoutwidth" type="text" class="text" value="<?php if ( get_settings('veryplaintxt_layoutwidth') == "" ) { echo "80%"; } else { echo get_settings('veryplaintxt_layoutwidth'); } ?>" tabindex="20" size="10" /><br/>
					<span class="info"><?php _e('The layout width determines the normal width of the entire layout. This can be in any unit (e.g., px, pt, em), but I suggest using a percentage (%). Default is 80%.', 'veryplaintxt'); ?></span>
				</td>
			</tr>

			<tr valign="top">
				<th scope="row" width="33%"><label for="vp_maxwidth"><?php _e('Maximum width', 'veryplaintxt'); ?></label></th> 
				<td>
					<input id="vp_maxwidth" name="vp_maxwidth" type="text" class="text" value="<?php if ( get_settings('veryplaintxt_maxwidth') == "" ) { echo "55em"; } else { echo get_settings('veryplaintxt_maxwidth'); } ?>" tabindex="21" size="10" /><br/>
					<span class="info"><?php _e('The maximum width determines how wide the layout can be. When viewed in a large screen, this keeps text lines from running long (i.e., difficult hard to read). Note that this has no effect in Internet Explorer 6 and below. You may leave this blank. Default is 55em.', 'veryplaintxt'); ?></span>
				</td>
			</tr>

			<tr valign="top">
				<th scope="row" width="33%"><label for="vp_minwidth"><?php _e('Minimum width', 'veryplaintxt'); ?></label></th> 
				<td>
					<input id="vp_minwidth" name="vp_minwidth" type="text" class="text" value="<?php if ( get_settings('veryplaintxt_minwidth') == "" ) { echo "35em"; } else { echo get_settings('veryplaintxt_minwidth'); } ?>" tabindex="22" size="10" /><br/>
					<span class="info"><?php _e('The minimum width determines how narrow the layout can be. When viewed in a small area, this keeps the layout from becoming too narrow. Note that this has no effect in Internet Explorer 6 and below. You may leave this blank. Default is 35em.', 'veryplaintxt'); ?></span>
				</td>
			</tr>

			<tr valign="top">
				<th scope="row" width="33%"><label for="vp_posttextalignment"><?php _e('Post text alignment', 'veryplaintxt'); ?></label></th> 
				<td>
					<select id="vp_posttextalignment" name="vp_posttextalignment" tabindex="23" class="dropdown">
						<option value="center" <?php if ( get_settings('veryplaintxt_posttextalignment') == "center" ) { echo 'selected="selected"'; } ?>><?php _e('Centered', 'veryplaintxt'); ?> </option>
						<option value="justify" <?php if ( get_settings('veryplaintxt_posttextalignment') == "justify" ) { echo 'selected="selected"'; } ?>><?php _e('Justified', 'veryplaintxt'); ?> </option>
						<option value="left" <?php if ( ( get_settings('veryplaintxt_posttextalignment') == "") || ( get_settings('veryplaintxt_posttextalignment') == "left") ) { echo 'selected="selected"'; } ?>><?php _e('Left', 'veryplaintxt'); ?> </option>
						<option value="right" <?php if ( get_settings('veryplaintxt_posttextalignment') == "right" ) { echo 'selected="selected"'; } ?>><?php _e('Right', 'veryplaintxt'); ?> </option>
					</select>
					<br/>
					<span class="info"><?php _e('Choose one of the options for the alignment of the post entry text. Default is left.', 'veryplaintxt'); ?></span>
				</td>
			</tr>

			<tr valign="top">
				<th scope="row" width="33%"><label for="vp_sidebarposition"><?php _e('Sidebar position', 'veryplaintxt'); ?></label></th> 
				<td>
					<select id="vp_sidebarposition" name="vp_sidebarposition" tabindex="24" class="dropdown">
						<option value="left" <?php if ( get_settings('veryplaintxt_sidebarposition') == "left" ) { echo 'selected="selected"'; } ?>><?php _e('Left of content', 'veryplaintxt'); ?> </option>
						<option value="right" <?php if ( ( get_settings('veryplaintxt_sidebarposition') == "") || ( get_settings('veryplaintxt_sidebarposition') == "right") ) { echo 'selected="selected"'; } ?>><?php _e('Right of content', 'veryplaintxt'); ?> </option>
					</select>
					<br/>
					<span class="info"><?php _e('The sidebar can be positioned to the left or the right of the main content column. Default is right of content.', 'veryplaintxt'); ?></span>
				</td>
			</tr>

			<tr valign="top">
				<th scope="row" width="33%"><label for="vp_sidebartextalignment" class="dropdown"><?php _e('Sidebar text alignment', 'veryplaintxt'); ?></label></th> 
				<td>
					<select id="vp_sidebartextalignment" name="vp_sidebartextalignment" tabindex="25" class="dropdown">
						<option value="center" <?php if ( ( get_settings('veryplaintxt_sidebartextalignment') == "") || ( get_settings('veryplaintxt_sidebartextalignment') == "center") ) { echo 'selected="selected"'; } ?>><?php _e('Centered', 'veryplaintxt'); ?> </option>
						<option value="left" <?php if ( get_settings('veryplaintxt_sidebartextalignment') == "left" ) { echo 'selected="selected"'; } ?>><?php _e('Left', 'veryplaintxt'); ?> </option>
						<option value="right" <?php if ( get_settings('veryplaintxt_sidebartextalignment') == "right" ) { echo 'selected="selected"'; } ?>><?php _e('Right', 'veryplaintxt'); ?> </option>
					</select>
					<br/>
					<span class="info"><?php _e('Choose one of the options for the alignment of the sidebar text. Default is centered.', 'veryplaintxt'); ?></span>
				</td>
			</tr>

		</table>

		<p class="submit">
			<input name="save" type="submit" value="<?php _e('Save Options &rsaquo;', 'veryplaintxt'); ?>" tabindex="26" accesskey="S" />  
			<input name="action" type="hidden" value="save" />
		</p>

	</form>

	<h2 id="reset"><?php _e('Reset Options', 'veryplaintxt'); ?></h2>
	<p><?php _e('<strong>Resetting clears all changes to the above options.</strong> After resetting, default options are loaded and this theme will continue to be the active theme. A reset does not affect the actual theme files in any way.', 'veryplaintxt'); ?></p>

	<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
		<p class="submit">
			<input name="reset" type="submit" value="<?php _e('Reset', 'veryplaintxt'); ?>" onclick="return confirm('<?php _e('Click OK to reset. Any changes to these theme options will be lost!', 'veryplaintxt'); ?>');" tabindex="27" accesskey="R" />
			<input name="action" type="hidden" value="reset" />
		</p>
	</form>

</div>

<div id="theme-information" class="wrap">

	<h2 id="info"><?php _e('Theme Information'); ?></h2>
	<p><?php _e('You are currently using the <a href="http://www.plaintxt.org/themes/veryplaintxt/" title="veryplaintxt for WordPress"><span class="theme-title">veryplaintxt</span></a> theme, version ' . $installedVersion . ', by <span class="vcard"><a class="url xfn-me" href="http://scottwallick.com/" title="scottwallick.com" rel="me designer"><span class="n"><span class="given-name">Scott</span> <span class="additional-name">Allan</span> <span class="family-name">Wallick</span></span></a></span>.', 'veryplaintxt'); ?></p>

	<p><?php printf(__('Please read the included <a href="%1$s" title="Open the readme.html" rel="enclosure"  tabindex="28">documentation</a> for more information about the <span class="theme-title">veryplaintxt</span> theme and its advanced features.', 'veryplaintxt'), get_template_directory_uri() . '/readme.html'); ?></p>

	<h3 id="license" style="margin-bottom:-8px;"><?php _e('License', 'veryplaintxt'); ?></h3>
	<p><?php printf(__('The <span class="theme-title">veryplaintxt</span> theme copyright &copy; %1$s by <span class="vcard"><a class="url xfn-me" href="http://scottwallick.com/" title="scottwallick.com" rel="me designer"><span class="n"><span class="given-name">Scott</span> <span class="additional-name">Allan</span> <span class="family-name">Wallick</span></span></a></span> is distributed with the <cite class="vcard"><a class="fn org url" href="http://www.gnu.org/licenses/gpl.html" title="GNU General Public License" rel="license">GNU General Public License</a></cite>.', 'veryplaintxt'), gmdate('Y') ); ?></p>

</div>

<?php
}

function veryplaintxt_wp_head() {
	if ( get_settings('veryplaintxt_basefontsize') == "" ) {
		$basefontsize = '90%';
	} else {
		$basefontsize = stripslashes( get_settings('veryplaintxt_basefontsize') ); 
	};
	if ( get_settings('veryplaintxt_basefontfamily') == "" ) {
		$basefontfamily = '\'times new roman\', times, serif';
	} else {
		$basefontfamily = stripslashes( get_settings('veryplaintxt_basefontfamily') ); 
	};
	if ( get_settings('veryplaintxt_headingfontfamily') == "" ) {
		$headingfontfamily = 'arial, helvetica, sans-serif';
	} else {
		$headingfontfamily = stripslashes( get_settings('veryplaintxt_headingfontfamily') ); 
	};
	if ( get_settings('veryplaintxt_layoutwidth') == "" ) {
		$layoutwidth = '80%';
	} else {
		$layoutwidth = stripslashes( get_settings('veryplaintxt_layoutwidth') ); 
	};
	if ( get_settings('veryplaintxt_maxwidth') == "" ) {
		$maxwidth = '55em';
	} else {
		$maxwidth = stripslashes( get_settings('veryplaintxt_maxwidth') ); 
	};
	if ( get_settings('veryplaintxt_minwidth') == "" ) {
		$minwidth = '35em';
	} else {
		$minwidth = stripslashes( get_settings('veryplaintxt_minwidth') ); 
	};
	if ( get_settings('veryplaintxt_posttextalignment') == "" ) {
		$posttextalignment = 'left';
	} else {
		$posttextalignment = stripslashes( get_settings('veryplaintxt_posttextalignment') ); 
	};
	if ( get_settings('veryplaintxt_sidebarposition') == "" ) {
		$sidebarposition = 'body div#container { float: left; margin: 0 -200px 2em 0; } body div#content { margin: 3em 200px 0 0; } body div.sidebar { float: right; }
';
	} elseif ( get_settings('veryplaintxt_sidebarposition') =="left" ) {
		$sidebarposition = 'body div#container { float: right; margin: 0 0 2em -200px; } body div#content { margin: 3em 0 0 200px; } body div.sidebar { float: left; }
';
	} elseif ( get_settings('veryplaintxt_sidebarposition') =="right" ) {
		$sidebarposition = 'body div#container { float: left; margin: 0 -200px 2em 0; } body div#content { margin: 3em 200px 0 0; } body div.sidebar { float: right; }
';
	};
	if ( get_settings('veryplaintxt_sidebartextalignment') == "" ) {
		$sidebartextalignment = 'center';
	} else {
		$sidebartextalignment = stripslashes( get_settings('veryplaintxt_sidebartextalignment') ); 
	};
?>
<style type="text/css" media="all">
/*<![CDATA[*/
/* CSS inserted by theme options */
body{font-family:<?php echo $basefontfamily; ?>;font-size:<?php echo $basefontsize; ?>;}
<?php echo $sidebarposition; ?>
body div#content div.hentry{text-align:<?php echo $posttextalignment; ?>;}
body div#content h2,div#content h3,div#content h4,div#content h5,div#content h6{font-family:<?php echo $headingfontfamily; ?>;}
body div#wrapper{max-width:<?php echo $maxwidth; ?>;min-width:<?php echo $minwidth; ?>;width:<?php echo $layoutwidth; ?>;}
body div.sidebar{text-align:<?php echo $sidebartextalignment; ?>;}
/*]]>*/
</style>
<?php
}
add_action('admin_menu', 'veryplaintxt_add_admin');
add_action('wp_head', 'veryplaintxt_wp_head');

add_action('init', 'veryplaintxt_widgets_init');
add_filter('archive_meta', 'wptexturize');
add_filter('archive_meta', 'convert_smilies');
add_filter('archive_meta', 'convert_chars');
add_filter('archive_meta', 'wpautop');
?>