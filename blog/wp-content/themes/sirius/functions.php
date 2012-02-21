<?php

load_theme_textdomain('sirius');

/*
File Name: Wordpress Theme Toolkit Implementation for Sirius
Version: 1.0
Author: Olaf A. Schmitz
Author URI: http://blogshop.de
*/

/************************************************************************************
 * THEME USERS : don't touch anything !! Or don't ask the theme author for support :)
 ************************************************************************************/

include(dirname(__FILE__).'/themetoolkit.php');



/************************************************************************************/
$colorpicker = "<a href=\"javascript:reqWin('".get_bloginfo(template_directory)."/spezial/colorpicker.php')\">Color Picker</a>";
/************************************************************************************/


themetoolkit(
	'sirius',

	array(


'farboptionen' => '<br/><br/><h2>'.__('Customize','sirius').'</h2> {separator}',
	'farbschema'    => ''.__('Choose your favorite color scheme.','sirius').' {radio|erde|<span style="color:#0066CC">'.__('Earth','sirius').'</span>|merkur|<span style="color:#C45500">'.__('Mercury','sirius').'</span>|jupiter|<span style="color:#808000">'.__('Jupiter','sirius').'</span>|venus|<span style="color:#A038CB">'.__('Venus','sirius').'</span>|mond|<span style="color:#777777">'.__('Moon','sirius').'</span><br/>|eigenes|'.__('own scheme','sirius').'} ## <br/><strong>'.__('If you have chosen "own scheme", customize the following options.','sirius').'<br/>'.$colorpicker.' '.__('helps you with the color code.','sirius').'</strong> ('.__('If you use a given scheme, the following settings will not be considered.','sirius').')',
  'schemalinks'   => ''.__('Color of links','sirius').' ## <small>'.__('in the form','sirius').' (#000000)</small>',
  'schemaschrift'   => ''.__('Font Type','sirius').' ## <small>'.__('Popular fonts are: <a href="http://en.wikipedia.org/wiki/Arial" target="_blank">Arial</a>, <a href="http://en.wikipedia.org/wiki/Verdana" target="_blank">Verdana</a>, <a href="http://en.wikipedia.org/wiki/Trebuchet_MS" target="_blank">Trebuchet MS</a>.','sirius').'</small>',
  'schemaschriftgroesse'   => ''.__('Font Size','sirius').' ## <small>'.__('In percent ( % ).','sirius').'</small>',
  'schemaheader'  => ''.__('Headerimage','sirius').' ## <small>'.__('This is the place where you have to put the URL of your headerimage ( e.g.: http://example.com/images/logo.gif ).','sirius').'<br/>'.__('The recommended size is 134px in hight and 566px in length.','sirius').'</small>',

'sidebarptionen' => ''.__('The following settings are independent from the scheme options!!!','sirius').'<br/><br/><h2>'.__('Sidebar Options','sirius').'</h2>{separator}',
	'kalender'   => ''.__('Calendar','sirius').' {radio|kalenderan|'.__('enable','sirius').'|kalenderaus|'.__('disable','sirius').'}',
	'kategorien' => ''.__('Categories','sirius').' {radio|kategoriean|'.__('enable','sirius').'|kategoriecounter|'.__('enable','sirius').' ('.__('with Counter','sirius').')|kategoriefeed|'.__('enable','sirius').' ('.__('with Feeds','sirius').')|kategorieaus|'.__('disable','sirius').'}',
	'suche'      => ''.__('Search','sirius').' {radio|suchean|'.__('enable','sirius').'|sucheaus|'.__('disable','sirius').'}',
 	'kommentare'   => ''.__('Latest Comments','sirius').' {radio|kommentarean|'.__('enable','sirius').'|kommentareaus|'.__('disable','sirius').'}',
	'seiten'     => ''.__('How do you want to display the pages?','sirius').' {radio|seitenan|'.__('enable (order by page menu)','sirius').'|seitendatum|'.__('order by date (latest at top)','sirius').'|seitenaus|'.__('disable','sirius').'}',
  'blogroll'     => ''.__('How to display links?','sirius').' {radio|blogrollan|'.__('enable','sirius').' ('.__('without Categories','sirius').')|blogrollkat|'.__('enable','sirius').' ('.__('with Categories','sirius').')|blogrollaus|'.__('disable','sirius').'}',
  'archiv'     => ''.__('How to display the archives?','sirius').' {radio|archivmonat|'.__('monthly archives','sirius').'|archivwoche|'.__('weekly archives','sirius').'|archivaus|'.__('disable','sirius').'}',
	'feeds'      => ''.__('Feeds','sirius').' {radio|feedsan|'.__('enable','sirius').'|feedsaus|'.__('disable','sirius').'}',
  'meta'      => ''.__('WP-Meta','sirius').'  {radio|metaan|'.__('enable','sirius').'|metaaus|'.__('disable','sirius').'}',
  'blogbeschreibung'  => ''.__('Blog description','sirius').' {textarea|3|80}',
	'blogbeschreibunganzeige' => '{radio|blogbeschreibunganzeigean|'.__('enable','sirius').' '.__('Blog description','sirius').'|blogbeschreibunganzeigeaus|'.__('disable','sirius').' '.__('Blog description','sirius').'}',
		
'beitragsoptionen' => '<br/><br/><h2>'.__('Post Options','sirius').'</h2>{separator}',
	'beitragssidebar'      => ''.__('Display Sidebar on single Posts','sirius').' {radio|beitragssidebaran|'.__('enable','sirius').'|beitragssidebaraus|'.__('disable','sirius').'}',
	'beitragsgravatar'      => ''.__('Display User Gravatars on Comments','sirius').' {radio|beitragsgravataran|'.__('enable','sirius').'|beitragsgravataraus|'.__('disable','sirius').'} ## <small>'.__('For more information visit <a href="http://gravatar.com/" target="_blank">Gravatar - Globally Recognized Avatar</a>.','sirius').'</small>',

'seitenptionen' => '<br/><br/><h2>'.__('Page Options','sirius').'</h2>{separator}',
	'seitenkommentare'      => ''.__('Page Comments','sirius').' {radio|seitenkommentarean|'.__('enable','sirius').'|seitenkommentareaus|'.__('disable','sirius').'}',
	'seitensidebar'      => ''.__('Display Sidebar on Pages','sirius').' {radio|seitensidebaran|'.__('enable','sirius').'|seitensidebaraus|'.__('disable','sirius').'}',

'headeroptionen' => '<br/><br/><h2>'.__('Header Options','sirius').'</h2>{separator}',
  'headerlinks'  => ''.__('Header Links','sirius').' {textarea|3|80}',
	'headerlinksanzeige' => '{radio|headerlinksanzeigean|'.__('enable','sirius').' '.__('Header Links','sirius').'|headerlinksanzeigeaus|'.__('disable','sirius').' '.__('Header Links','sirius').'}',
	'metakeywords'         => ''.__('Meta Keywords','sirius').' {textarea|2|80} ## <small>'.__('Seperate keywords with commas ( e.g.: Blog, WordPress, blogosphere ).','sirius').'</small>',
	'metakeywordsanzeige'  => '{radio|metakeywordsanzeigean|'.__('enable','sirius').' '.__('Meta Keywords','sirius').'|metakeywordsanzeigeaus|'.__('disable','sirius').' '.__('Meta Keywords','sirius').'}',
	'metadescription'         => ''.__('Meta Description','sirius').' {textarea|2|80}',
	'metadescriptionanzeige'  => '{radio|metadescriptionanzeigean|'.__('enable','sirius').' '.__('Meta Description','sirius').'|metadescriptionanzeigeaus|'.__('disable','sirius').' '.__('Meta Description','sirius').'}',

'footeroptionen' => '<br/><br/><h2>'.__('Footer Options','sirius').'</h2>{separator}',
  'footerextra'  => ''.__('Footer Area','sirius').' {textarea|3|80} ## <small>'.__('Here you can insert some extra code ( e.g.: Counter, Technorati Profil )','sirius').'</small>',
	'footerextrain' => '{radio|footerextrainan|'.__('enable','sirius').' '.__('Footer Area','sirius').'|footerextrainaus|'.__('disable','sirius').' '.__('Footer Area','sirius').'}',

'pluginoptionen' => '<br/><br/><h2>'.__('Extras','sirius').'</h2>{separator}',
	'searchhilite'      => ''.__('Search Hilite','sirius').' {radio|searchhilitean|'.__('enable','sirius').'|searchhiliteaus|'.__('disable','sirius').'} ## <small>'.__('When someone is referred from a search engine like Google, Yahoo, or WordPress own,<br/>the terms they search for are <span style="color:#fff;background-color:#f93;">highlighted</span> with this plugin. Plugin by <a href="http://rboren.nu">Ryan Boren</a>.','sirius').'</small>',
	'fancytooltips'      => ''.__('FancyTooltips','sirius').' {radio|fancytooltipsan|'.__('enable','sirius').'|fancytooltipsaus|'.__('disable','sirius').'} ## <small>'.__('FancyTooltips creates dynamic tooltips from anchors (links), acronyms, inserts,<br/>deletions, and images. Plugin by <a href="http://www.victr.lm85.com/">Victor Kulinski</a>.','sirius').'</small>',
	'shortnews'      => ''.__('ShortNews','sirius').' {radio|shortnewsan|'.__('enable','sirius').'|shortnewsaus|'.__('disable','sirius').'}',
	'shortnewscat'      => ' ## '.__('Here you have to add the Category-ID ( e.g.: 1 ) <small>Hack by <a href="http://photomatt.net/">Matt Mullenweg</a>.','sirius').'</small>',
  'adscode'  => ''.__('Advertisement Area','sirius').' {textarea|3|80} ## <small>'.__('Here you can insert your Ads-Code ( e.g.: GoogleAds )','sirius').'</small>',
	'adscat'      => ' ## '.__('After which article do you want to place the advertisement? The Ads will be displayed in the single article view additionally.','sirius').'',	
  'ads'      => ' {radio|adsan|'.__('enable','sirius').'|adsaus|'.__('disable','sirius').'}',


  // 'debug' => 'debug', 	
								
								 
	), 	__FILE__	);
	

/************************************************************************************
 * Let the functions rock...
 ************************************************************************************/
 
function sirius_farbschema() {
	global $sirius;
	if ($sirius->option['farbschema'] == 'erde') {
		echo '<link rel="stylesheet" href="';	
		echo ''. get_bloginfo('template_directory').'/style-erde.css';	
		echo '" type="text/css" media="screen" />';	
 	}	
	if ($sirius->option['farbschema'] == 'jupiter') {
		echo '<link rel="stylesheet" href="';	
		echo ''. get_bloginfo('template_directory').'/style-jupiter.css';	
		echo '" type="text/css" media="screen" />';	
	}	
	if ($sirius->option['farbschema'] == 'merkur') {
		echo '<link rel="stylesheet" href="';	
		echo ''. get_bloginfo('template_directory').'/style-merkur.css';	
		echo '" type="text/css" media="screen" />';	
	}	
	if ($sirius->option['farbschema'] == 'venus') {
		echo '<link rel="stylesheet" href="';	
		echo ''. get_bloginfo('template_directory').'/style-venus.css';	
		echo '" type="text/css" media="screen" />';	
	}	
	if ($sirius->option['farbschema'] == 'mond') {
		echo '<link rel="stylesheet" href="';	
		echo ''. get_bloginfo('template_directory').'/style-mond.css';	
		echo '" type="text/css" media="screen" />';	
	}	                                                                                                                        		
	if ($sirius->option['farbschema'] == 'eigenes') {
		echo '<link rel="stylesheet" href="'. get_bloginfo('template_directory').'/style.css" type="text/css" media="screen" />'."\n";	
		echo '<style type="text/css">	
body {font-family:'.$sirius->option['schemaschrift'].', Trebuchet MS, Verdana, Arial, Helvetica, sans-serif !important; font-size: '.$sirius->option['schemaschriftgroesse'].' !important;}		
#header {background: url("'.$sirius->option['schemaheader'].'") no-repeat top left;}
#menu ul.comment li {color:'.$sirius->option['schemalinks'].';}
#menu h2 {color:'.$sirius->option['schemalinks'].';}
h3 {color:'.$sirius->option['schemalinks'].';}
.storytitle {color:'.$sirius->option['schemalinks'].';}
a {color:'.$sirius->option['schemalinks'].';}
#wp-calendar a:link, #wp-calendar a:visited {color:'.$sirius->option['schemalinks'].';}
#wp-calendar #today {color:'.$sirius->option['schemalinks'].';}
    </style>';	
	}			
}












function sirius_gravatar() {
	global $comment, $sirius;	
  if ($sirius->option['beitragsgravatar'] == 'beitragsgravataran') {
  $out = "http://www.gravatar.com/avatar.php?gravatar_id=".md5($comment->comment_author_email);
		echo '<span style="padding:1px; margin:10px; float:right;">';	
	  echo '<img src="'.$out.'" alt="Gravatar" height="50px" width="50px"/></span>';
 }
}






/* Post Options --------------------------- */
function sirius_beitragssidebar() {
	global $sirius;
	if ($sirius->option['beitragssidebar'] == 'beitragssidebaran') {
		echo get_sidebar();
	}
}



/* Page Options --------------------------- */
function sirius_seitenkommentare() {
	global $sirius;
	if ($sirius->option['seitenkommentare'] == 'seitenkommentarean') {
		echo comments_template();
	}
}

 
function sirius_seitensidebar() {
	global $sirius;
	if ($sirius->option['seitensidebar'] == 'seitensidebaran') {
		echo get_sidebar();
	}
}
 
 
 
/* Sidebar Options --------------------------- */
function sirius_kalender() {
	global $sirius;
	if ($sirius->option['kalender'] == 'kalenderan') {
		echo '<ul><li id="calendar">'.get_calendar().' </li></ul>';
	} else {
    echo '<br/><br/>';
    }
}



function sirius_suche() {
	global $sirius;
  	if ($sirius->option['suche'] == 'suchean') {
  	echo '<ul><li id="search">';
	 	include (TEMPLATEPATH . '/searchform.php');
		echo '</li></ul><br/>';
	}
}


function sirius_feeds() {
	global $sirius;
  	if ($sirius->option['feeds'] == 'feedsan') {
		echo '<ul><li><h2>'.__('Feeds','sirius').' <img src="'. get_bloginfo('template_directory').'/images/xml-medium.png" alt="RSS" /></h2><ul>	
      <li><a href="'. get_bloginfo('rss2_url').'" title="">'.__('Entries via RSS','sirius').'</a></li>
      <li><a href="'. get_bloginfo('atom_url').'" title="">'.__('Entries via Atom','sirius').'</a></li>
      <li><a href="'. get_bloginfo('comments_rss2_url').'" title="">'.__('Comments via RSS','sirius').'</a></li> 	
		</ul></li></ul>';	
	}
}



function sirius_meta() {
	global $sirius;
  	if ($sirius->option['meta'] == 'metaan') {
		echo '<ul><li><h2>'.__('Meta','sirius').'</h2><ul>';	
		echo 	 wp_register();
		echo '<li><a href="http://validator.w3.org/check/referer" title="'.__('This page validates as XHTML 1.0 Transitional','sirius').'">'.__('Valid','sirius').' <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
					<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
          <li><a href="http://www.technorati.com/search/'. get_bloginfo('home').'" title="Technorati Links"><img src="'. get_bloginfo('template_directory').'/images/icon-technorati.gif" alt="Technorati Links" /></a></li>';
		echo '</ul> </li></ul>';	
	}
}




function sirius_seiten() {
	global $sirius;
	if ($sirius->option['seiten'] == 'seitenan') {
		echo '<ul><li><h2>'.__('Pages','sirius').'</h2><ul>';	
		wp_list_pages('sort_column=menu_order&title_li='); /* List Pages by Menu Order */
		echo '</ul></li></ul>';	
	}
	if ($sirius->option['seiten'] == 'seitendatum') {
		echo '<ul><li><h2>'.__('Pages','sirius').'</h2><ul>';	
		wp_list_pages('sort_column=post_date&title_li=&sort_order=desc');
		echo '</ul></li></ul>';	
	}	
}




function sirius_archiv() {
	global $sirius;
	if ($sirius->option['archiv'] == 'archivwoche') {
		echo '<ul><li><h2>'.__('Archive','sirius').'</h2><ul>';	
	  wp_get_archives('type=weekly');
		echo '</ul></li></ul>';	
	}
	if ($sirius->option['archiv'] == 'archivmonat') {
		echo '<ul><li><h2>'.__('Archive','sirius').'</h2><ul>';	
	  wp_get_archives('type=monthly');
		echo '</ul></li></ul>';	
	}	
}



function sirius_blogroll() {
	global $sirius;
	if ($sirius->option['blogroll'] == 'blogrollkat') {
		echo '<ul>';
		 get_links_list('order=name&sort_order=desc');
		echo '</ul>';	
	}
	if ($sirius->option['blogroll'] == 'blogrollan') {
		echo '<ul><li><h2>'.__('Blogroll','sirius').'</h2><ul>';	
    get_linksbyname('', '<li>','</li>','', FALSE, 'name',FALSE, FALSE, -1, FALSE);
		echo '</ul></li></ul>';	
	}	
}



function sirius_kategorien() {
	global $sirius;
	if ($sirius->option['kategorien'] == 'kategoriecounter') {
		echo '<ul><li><h2>'.__('Categories','sirius').'</h2><ul>';	
		wp_list_cats('sort_column=name&optioncount=1&hierarchical=0');
		echo '</ul></li></ul>';	
	}
	if ($sirius->option['kategorien'] == 'kategoriean') {
		echo '<ul><li><h2>'.__('Categories','sirius').'</h2><ul>';	
		wp_list_cats('sort_column=name&hierarchical=0');
		echo '</ul></li></ul>';	
	}
		
	if ($sirius->option['kategorien'] == 'kategoriefeed') {
		echo '<ul><li><h2>'.__('Categories','sirius').'</h2><ul>';	
		wp_list_cats('sort_column=name&hierarchical=0&feed_image='.get_bloginfo(template_directory).'/images/xml-small.png');
		echo '</ul></li></ul>';	
	}	
}



function sirius_blogbeschreibunganzeige() {
	global $sirius;
	if ($sirius->option['blogbeschreibunganzeige'] == 'blogbeschreibunganzeigean') {	
    echo '<small>';
		print $sirius->option['blogbeschreibung'];
		echo '</small><br/><br/>';
	}
}



function sirius_metakeywordsanzeige() {
	global $sirius;
	if ($sirius->option['metakeywordsanzeige'] == 'metakeywordsanzeigean') {	
    echo '<meta name="keywords" content="';
		print $sirius->option['metakeywords'];
		echo '" />'."\n";
	}
}


function sirius_metadescriptionanzeige() {
	global $sirius;
	if ($sirius->option['metadescriptionanzeige'] == 'metadescriptionanzeigean') {	
    echo '<meta name="description" content="';
		print $sirius->option['metadescription'];
		echo '" />'."\n";
	}
}



function sirius_footerextrain() {
	global $sirius;
	if ($sirius->option['footerextrain'] == 'footerextrainan') {	
		print $sirius->option['footerextra'];
	}
}



	
//letzte Kommentare=========================================================

function sirius_kommentare($no_comments = 5, $comment_lenth = 4, $before = '<li>', $after = '</li>', $show_pass_post = false) {
        global $wpdb, $tablecomments, $tableposts,  $sirius;
        
        $request = "SELECT ID, comment_ID, comment_content, comment_author FROM $tableposts, $tablecomments WHERE $tableposts.ID=$tablecomments.comment_post_ID AND post_status = 'publish' ";
        if(!$show_pass_post) { $request .= "AND post_password ='' "; }
        $request .= "AND comment_approved = '1' ORDER BY $tablecomments.comment_date DESC LIMIT $no_comments";
        $comments = $wpdb->get_results($request);
        		
        if ($sirius->option['kommentare'] == 'kommentarean') {

       	echo '<h2>'.__('Comments','sirius').' <a href="'. get_bloginfo('comments_rss2_url').'" title="RSS"><img src="'. get_bloginfo('template_directory').'/images/xml-medium.png" alt="RSS" /></a></h2><ul class="comment">'."\n";
        $output = '';
        foreach ($comments as $comment) {
                $comment_author = stripslashes($comment->comment_author);
                $comment_content = strip_tags($comment->comment_content);
                $comment_content = stripslashes($comment_content);
                $words=split(" ",$comment_content);
                $comment_excerpt = join(" ",array_slice($words,0,$comment_lenth));
                $permalink = get_permalink($comment->ID)."#comment-".$comment->comment_ID;
                $output .= $before . '<strong>' . $comment_author . '</strong>: <a href="' . $permalink;
                $output .= '" title="'.__('Comment by','sirius').' ' . $comment_author.'">' . $comment_excerpt . '...</a>' . $after;
            }
        echo $output;
       	echo '</ul><br/><br/><br/>'."\n";
}
	}




// default options :
/* default values upon theme install */
if (!$sirius->is_installed()) {

$set_defaults['kalender'] = 'kalenderan';
$set_defaults['archiv'] = 'archivmonat';
$set_defaults['kategorien'] = 'kategoriean';
$set_defaults['seiten'] = 'seitenan';
$set_defaults['suche'] = 'suchean';
$set_defaults['blogroll'] = 'blogrollan';
$set_defaults['kommentare'] = 'kommentarean';
$set_defaults['feeds'] = 'feedsan';
$set_defaults['meta'] = 'metaan';
$set_defaults['farbschema'] = 'erde';
$set_defaults['schemalinks'] = '#0066CC';
$set_defaults['schemaheader'] = ''.get_bloginfo(template_directory).'/images/erde/logo.jpg';
$set_defaults['blogbeschreibunganzeige'] = 'blogbeschreibunganzeigeaus';
$set_defaults['metakeywordsanzeige'] = 'metakeywordsanzeigeaus';
$set_defaults['metadescriptionanzeige'] = 'metadescriptionanzeigeaus';
$set_defaults['footerextrain'] = 'footerextrainaus';
$set_defaults['seitenkommentare'] = 'seitenkommentareaus';
$set_defaults['seitensidebar'] = 'seitensidebaraus';
$set_defaults['beitragssidebar'] = 'beitragssidebaraus';
$set_defaults['beitragsgravatar'] = 'beitragsgravataraus';
$set_defaults['schemaschriftgroesse'] = '80%';
$set_defaults['schemaschrift'] = 'Trebuchet MS';
$set_defaults['searchhilite'] = 'searchhiliteaus';
$set_defaults['fancytooltips'] = 'fancytooltipsaus';
$set_defaults['shortnews'] = 'shortnewsaus';
$set_defaults['ads'] = 'adsaus';
$set_defaults['adscode'] = '<img src="'.get_bloginfo(template_directory).'/spezial/ad-example.jpg" alt="Ad-Example" />';
$set_defaults['headerlinksanzeige'] = 'headerlinksanzeigean';
$set_defaults['headerlinks'] = '<a href="'.get_settings('home').'">'. __('Home','sirius').'</a>';
$result = $sirius->store_options($set_defaults);
}
?>
