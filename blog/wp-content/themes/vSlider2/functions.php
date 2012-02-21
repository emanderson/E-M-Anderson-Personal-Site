<?php

	add_action('admin_menu', 'vSlider_add_theme_page');
	
	function vSlider_add_theme_page() {
		add_theme_page("vSlider Theme Options", "vSlider Theme Options", 'edit_themes', basename(__FILE__), 'vslider_theme_page');
	}	

	function vslider_theme_page() {
		
		// Define all options
		add_option('vSlider_normal_posts_closed', FALSE);
		add_option('vSlider_normal_posts_firstopen', FALSE);		
		add_option('vSlider_archive_posts_closed', TRUE);
		add_option('vSlider_archive_posts_firstopen', FALSE);
		add_option('vSlider_search_posts_closed', TRUE);
		add_option('vSlider_search_posts_firstopen', TRUE);
		add_option('vSlider_text_home', 'Home');
		add_option('vSlider_text_photos', 'Photos');
		add_option('vSlider_text_search', 'Search...');
		add_option('vSlider_text_weather', 'My Weather');
		add_option('vSlider_text_ads', 'Advertisements');
		add_option('vSlider_text_sidebarphoto', 'Pseudorandom');
		add_option('vSlider_text_categories', 'Categories');
		add_option('vSlider_text_archives', 'Archives');
		add_option('vSlider_text_links', 'Links');
		
		add_option('vSlider_quickabout_enabled', FALSE);
		add_option('vSlider_quickabout_text', '');
		
		add_option('vSlider_kb_enabled', FALSE);
		add_option('vSlider_kb_nheaders', 3);
		add_option('vSlider_kb_duration', 6);
		add_option('vSlider_kb_transition', 2);
		
		

		// If the form was submited, then update the values in the database
		if ('save' == $_REQUEST['action'])
		{
			update_option('vSlider_normal_posts_closed', $_REQUEST['vSlider_normal_posts_closed']);
			update_option('vSlider_normal_posts_firstopen', $_REQUEST['vSlider_normal_posts_firstopen']);			
			update_option('vSlider_archive_posts_closed', $_REQUEST['vSlider_archive_posts_closed']);			
			update_option('vSlider_archive_posts_firstopen', $_REQUEST['vSlider_archive_posts_firstopen']);
			update_option('vSlider_search_posts_closed', $_REQUEST['vSlider_search_posts_closed']);			
			update_option('vSlider_search_posts_firstopen', $_REQUEST['vSlider_search_posts_firstopen']);
			update_option('vSlider_text_home', $_REQUEST['vSlider_text_home']);			
			update_option('vSlider_text_photos', $_REQUEST['vSlider_text_photos']);
			
			update_option('vSlider_text_search', $_REQUEST['vSlider_text_search']);
			update_option('vSlider_text_weather', $_REQUEST['vSlider_text_weather']);
			update_option('vSlider_text_ads', $_REQUEST['vSlider_text_ads']);
			update_option('vSlider_text_sidebarphoto', $_REQUEST['vSlider_text_sidebarphoto']);
			update_option('vSlider_text_categories', $_REQUEST['vSlider_text_categories']);
			update_option('vSlider_text_archives', $_REQUEST['vSlider_text_archives']);
			update_option('vSlider_text_links', $_REQUEST['vSlider_text_links']);
			
			update_option('vSlider_quickabout_enabled', $_REQUEST['vSlider_quickabout_enabled']);
			update_option('vSlider_quickabout_text', $_REQUEST['vSlider_quickabout_text']);
			
			update_option('vSlider_kb_enabled', $_REQUEST['vSlider_kb_enabled']);
			update_option('vSlider_kb_nheaders', $_REQUEST['vSlider_kb_nheaders']);
			update_option('vSlider_kb_duration', $_REQUEST['vSlider_kb_duration']);
			update_option('vSlider_kb_transition', $_REQUEST['vSlider_kb_transition']);
		}
		
		// Retrieve stored values
		$vSlider_normal_posts_closed = get_option('vSlider_normal_posts_closed');	
		$vSlider_normal_posts_firstopen = get_option('vSlider_normal_posts_firstopen');	
		$vSlider_archive_posts_closed = get_option('vSlider_archive_posts_closed');	
		$vSlider_archive_posts_firstopen = get_option('vSlider_archive_posts_firstopen');	
		$vSlider_search_posts_closed = get_option('vSlider_search_posts_closed');	
		$vSlider_search_posts_firstopen = get_option('vSlider_search_posts_firstopen');	
		$vSlider_text_home = get_option('vSlider_text_home');	
		$vSlider_text_photos = get_option('vSlider_text_photos');	
		
		$vSlider_text_search = get_option('vSlider_text_search');	
		$vSlider_text_weather = get_option('vSlider_text_weather');	
		$vSlider_text_ads = get_option('vSlider_text_ads');	
		$vSlider_text_sidebarphoto = get_option('vSlider_text_sidebarphoto');	
		$vSlider_text_categories = get_option('vSlider_text_categories');	
		$vSlider_text_archives = get_option('vSlider_text_archives');	
		$vSlider_text_links = get_option('vSlider_text_links');	
		
		$vSlider_quickabout_enabled = get_option('vSlider_quickabout_enabled');	
		$vSlider_quickabout_text = get_option('vSlider_quickabout_text');	
		
		$vSlider_kb_enabled = get_option('vSlider_kb_enabled');	
		$vSlider_kb_nheaders = get_option('vSlider_kb_nheaders');	
		$vSlider_kb_duration = get_option('vSlider_kb_duration');	
		$vSlider_kb_transition = get_option('vSlider_kb_transition');	
		
		// Visually notify that the changes have been saved
		if ( $_REQUEST['action'] == 'save' ) echo '<div id="message" class="updated fade"><p><strong>vSlider options saved.</strong></p></div>';

?>

<div class='wrap'>	
	<h2>vSlider theme options</h2>

	<form name="vSliderOptionsForm" method="post" onsubmit="
		if(isNaN(this.vSlider_kb_nheaders.value) || (this.vSlider_kb_nheaders.value*1<1)) {
			alert(this.vSlider_kb_nheaders.value + ' is not a valid value');
			return false;
		}
		if(isNaN(this.vSlider_kb_duration.value) || (this.vSlider_kb_duration.value*1<1)) {
			alert(this.vSlider_kb_duration.value + ' is not a valid value');
			return false;
		}
		if(isNaN(this.vSlider_kb_transition.value) || (this.vSlider_kb_transition.value*1<1)) {
			alert(this.vSlider_kb_transition.value + ' is not a valid value');
			return false;
		}
		if(this.vSlider_kb_duration.value*1<=this.vSlider_kb_transition.value*1) {
			alert('The duration must be greater than the transition time');
			return false;
		}
		">
		<input type="hidden" name="action" value="save" />
		
		<!-- Regular posts -->
		<fieldset class="options">
			<table cellpadding="5" class="editform">
				<tr bgcolor="#DDD">
					<td colspan="10"><strong>Posts slider status</strong></td>
				</tr>
				<tr bgcolor="#f6f6f6">
					<td colspan="10">
						You can choose how the posts appear in your pages. 
						If you choose "All closed", then only the headers of each post are show, and the readers have to press the slide down button to read the content.
						The option "Open first one" enables the display of the contents of the first post in each page. If "All closed" is not selected, this option has no effect.
					</td>
				</tr>
				<tr>
					<td></td>
				</tr>				
				<tr>
					<th scope="row"></th>										
					<td nowrap>
						<?php _e('All closed') ?>
					</td>
					<td nowrap>
						<?php _e('Open first one') ?>
					</td>
					<td width="100%"></td>
				</tr>
				<tr valign="middle" align="center">
					<th scope="row" nowrap><?php _e('Normal') ?></th>										
					<td>
						<input type="checkbox" 
							name="vSlider_normal_posts_closed"
							id="vSlider_normal_posts_closed" 
							value="vSlider_normal_posts_closed"
							<?php if($vSlider_normal_posts_closed == TRUE) {?> checked="checked" <?php } ?> />					
					</td>
					<td>
						<input type="checkbox" 
							name="vSlider_normal_posts_firstopen"  
							id="vSlider_normal_posts_firstopen" ~
							value="vSlider_normal_posts_firstopen"
							<?php if($vSlider_normal_posts_firstopen == TRUE) {?> checked="checked" <?php } ?> />					
					</td>
				</tr>
				<tr valign="middle" align="center">
					<th scope="row" nowrap><?php _e('Archived') ?></th>										
					<td>
						<input type="checkbox" 
							name="vSlider_archive_posts_closed"
							id="vSlider_archive_posts_closed" 
							value="vSlider_archive_posts_closed"
							<?php if($vSlider_archive_posts_closed == TRUE) {?> checked="checked" <?php } ?> />					
					</td>
					<td>
						<input type="checkbox" 
							name="vSlider_archive_posts_firstopen"  
							id="vSlider_archive_posts_firstopen" ~
							value="vSlider_archive_posts_firstopen"
							<?php if($vSlider_archive_posts_firstopen == TRUE) {?> checked="checked" <?php } ?> />							
					</td>
				</tr>
				<tr valign="middle" align="center">
					<th scope="row" nowrap><?php _e('Search results') ?></th>										
					<td>
						<input type="checkbox" 
							name="vSlider_search_posts_closed"
							id="vSlider_search_posts_closed" 
							value="vSlider_search_posts_closed"
							<?php if($vSlider_search_posts_closed == TRUE) {?> checked="checked" <?php } ?> />					
					</td>
					<td>
						<input type="checkbox" 
							name="vSlider_search_posts_firstopen"  
							id="vSlider_search_posts_firstopen" ~
							value="vSlider_search_posts_firstopen"
							<?php if($vSlider_search_posts_firstopen == TRUE) {?> checked="checked" <?php } ?> />				
					</td>
				</tr>
			</table>
		</fieldset>
				
		
		<br/>
		
		<!-- Header image -->
		<fieldset class="options">
			<table cellpadding="5" class="editform">
				<tr bgcolor="#DDD">
					<td colspan="10"><strong>KBurnalizer</strong></td>
				</tr>
				<tr bgcolor="#f6f6f6">
					<td colspan="10">
						The vSlider theme comes with the <a href="http://iRui.ac/cool-stuff/KBurnalizer">KBurnalizer</a> script already 
						built in. By enabling it, the theme will select randomly a number of images from the "images/headers" directory and 
						display them with smooth fade transitions. 
						<br/>
						Notes:
						<ol>
							<li>Images are preloaded before they are displayed, so choosing a high number is not recommended, as it may delay the presentation of the header.</li>
							<li>All values must be larger than 0 (obviously!) and the duration time must be larger than the transition time.</li>
							<li>If WPG2 is used to integrate Gallery2 and the current page is being served by it, then KBurnalizer is disabled for the header.</li>
						</ol>
					</td>
				</tr>				
				<tr>
					<td></td>
				</tr>				
				<tr valign="middle">
					<th scope="row" nowrap><?php _e('Enable?') ?></th>
					<td>
						<input type="checkbox" 
							name="vSlider_kb_enabled"
							id="vSlider_kb_enabled" 
							value="vSlider_kb_enabled"
							<?php if($vSlider_kb_enabled == TRUE) {?> checked="checked" <?php } ?> />					
					</td>
					<td width="100%"></td>
				</tr>
				<tr valign="middle">
					<th scope="row" nowrap><?php _e('Number of images:') ?></th>
					<td>
						<input type="text" name="vSlider_kb_nheaders" id="vSlider_kb_nheaders" value="<?php echo $vSlider_kb_nheaders; ?>" size="5"/>
					</td>
					<td width="100%"></td>
				</tr>
				<tr valign="middle">
					<th scope="row" nowrap><?php _e('Duration (s):') ?></th>
					<td>
						<input type="text" name="vSlider_kb_duration" id="vSlider_kb_duration" value="<?php echo $vSlider_kb_duration; ?>" size="5" />
					</td>
				</tr>
								<tr valign="middle">
					<th scope="row" nowrap><?php _e('Transition (s):') ?></th>
					<td>
						<input type="text" name="vSlider_kb_transition" id="vSlider_kb_transition" value="<?php echo $vSlider_kb_transition; ?>" size="5" />
					</td>
				</tr>

			</table>
		</fieldset>
		
		<br/>
		
		
		<!-- Header fields-->
		<fieldset class="options">
			<table cellpadding="5" class="editform">
				<tr bgcolor="#DDD">
					<td colspan="10"><strong>Predefined page names</strong></td>
				</tr>
				<tr bgcolor="#f6f6f6">
					<td colspan="10">There are two fixed pages below the header image: the Home page and the Gallery2 page. In this section you can choose the text for each of these pages, if you don't want the default ones.</td>
				</tr>				
				<tr>
					<td></td>
				</tr>				
				<tr valign="middle">
					<th scope="row" nowrap><?php _e('Home page:') ?></th>
					<td>
						<input type="text" name="vSlider_text_home" id="vSlider_text_home" value="<?php echo $vSlider_text_home; ?>" size="20" />
					</td>
					<td width="100%"></td>
				</tr>
				<tr valign="middle">
					<th scope="row" nowrap><?php _e('Gallery2 page name (if WPG2 is installed):') ?></th>
					<td>
						<input type="text" name="vSlider_text_photos" id="vSlider_text_photos" value="<?php echo $vSlider_text_photos; ?>" size="20" />
					</td>
				</tr>
			</table>
		</fieldset>
		
		<br/>
		
		<!-- Sidebar -->
		<fieldset class="options">
			<table cellpadding="5" class="editform">
				<tr bgcolor="#DDD">
					<td colspan="10"><strong>Sidebar titles</strong></td>
				</tr>
				<tr bgcolor="#f6f6f6">
					<td colspan="10">The sidebar is composed of several sections, each with its own title. Here you can select the text for each of the titles, if you don't want the default values.</td>
				</tr>				
				<tr>
					<td></td>
				</tr>				
			
				<tr valign="middle">
					<th scope="row" nowrap><?php _e('Search box:') ?></th>
					<td>
						<input type="text" name="vSlider_text_search" id="vSlider_text_search" value="<?php echo $vSlider_text_search; ?>" size="20" />
					</td>
					<td width="100%"></td>
				</tr>
				<tr valign="middle">
					<th scope="row" nowrap><?php _e('Weather (if WeatherIcon is installed):') ?></th>
					<td>
						<input type="text" name="vSlider_text_weather" id="vSlider_text_weather" value="<?php echo $vSlider_text_weather; ?>" size="20" />
					</td>
				</tr>
				<tr valign="middle">
					<th scope="row" nowrap><?php _e('Advertisements (if Adsense-Deluxe is installed):') ?></th>
					<td>
						<input type="text" name="vSlider_text_ads" id="vSlider_text_ads" value="<?php echo $vSlider_text_ads; ?>" size="20" />
					</td>
				</tr>
				<tr valign="middle">
					<th scope="row" nowrap><?php _e('Photo (if WPG2 is installed):') ?></th>
					<td>
						<input type="text" name="vSlider_text_sidebarphoto" id="vSlider_text_sidebarphoto" value="<?php echo $vSlider_text_sidebarphoto; ?>" size="20" />
					</td>
				</tr>
				<tr valign="middle">
					<th scope="row" nowrap><?php _e('Categories:') ?></th>
					<td>
						<input type="text" name="vSlider_text_categories" id="vSlider_text_categories" value="<?php echo $vSlider_text_categories; ?>" size="20" />
					</td>
				</tr>
				<tr valign="middle">
					<th scope="row" nowrap><?php _e('Archives:') ?></th>
					<td>
						<input type="text" name="vSlider_text_archives" id="vSlider_text_archives" value="<?php echo $vSlider_text_archives; ?>" size="20" />
					</td>
				</tr>
				<tr valign="middle">
					<th scope="row" nowrap><?php _e('Links:') ?></th>
					<td>
						<input type="text" name="vSlider_text_links" id="vSlider_text_links" value="<?php echo $vSlider_text_links; ?>" size="20" />
					</td>
				</tr>
			</table>
		</fieldset>								
				
		<br/>
		
		<!-- Sidebar quick about -->
		<fieldset class="options">
			<table cellpadding="5" class="editform">
				<tr bgcolor="#DDD">
					<td colspan="10"><strong>Sidebar "Quick About"</strong></td>
				</tr>
				<tr bgcolor="#f6f6f6">
					<td colspan="10">You can optionally enable a "Quick About" section on the side bar.</td>
				</tr>				
				<tr>
					<td></td>
				</tr>				
				<tr valign="middle">
					<th scope="row" nowrap><?php _e('Enable?') ?></th>
					<td>
						<input type="checkbox" 
							name="vSlider_quickabout_enabled"
							id="vSlider_quickabout_enabled" 
							value="vSlider_quickabout_enabled"
							<?php if($vSlider_quickabout_enabled == TRUE) {?> checked="checked" <?php } ?> />					
					</td>
					<td width="100%"></td>
				</tr>
				<tr valign="top">
					<th scope="row" nowrap><?php _e('Text:') ?></th>
					<td nowrap>
						<textarea name="vSlider_quickabout_text" id="vSlider_quickabout_text" style="width: 600px;" rows="4" cols="50"><?php echo stripslashes($vSlider_quickabout_text); ?></textarea>
					</td>
				</tr>
			</table>
		</fieldset>
		
		<p class="submit">
      <input type="submit" name="Submit" value="<?php _e('Save Options') ?> &raquo;" />
    </p>
	</form>
		
</div>

<?php } ?>
