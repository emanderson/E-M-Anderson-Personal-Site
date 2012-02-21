<!-- SIDEBAR LINKS -->
<div id="menu">

<div id="nav">

<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar() ) : ?>





				


<div class="sideitem">
			 <div class="boxhead"><div class="headfill">&nbsp;</div></div>

				<div class="boxbody">
				<?php if (function_exists('wp_theme_switcher')) { ?>
					<h2><?php _e('Themes'); ?></h2>
					<?php get_theme_switcher('dropdown'); ?>
					
			<?php } ?>
				</div>

		</div><!-- end sideitem -->






		





	<div class="sideitem">
			 <div class="boxhead"><div class="headfill">&nbsp;</div></div>

				<div class="boxbody">
				<!-- POSTS BY CATEGORY -->
				<h2><?php _e('Categories'); ?></h2>
				<ul>
					<?php wp_list_cats(); ?>
				</ul>
				</div>

		</div><!-- end sideitem -->




		

	<div class="sideitem">
			 <div class="boxhead"><div class="headfill">&nbsp;</div></div>



		<div class="boxbody">
				<!-- POSTS BY DATE -->
				<h2><?php _e('Archives'); ?></h2>
					<ul>
					 <?php wp_get_archives('type=monthly'); ?>
					</ul>
		</div>
				


		</div><!-- end sideitem -->





<!-- YOUR LINKS -->

	<div class="sideitem">
				 <div class="boxhead"><div class="headfill">&nbsp;</div></div>

				<div class="boxbody">
					<?php get_links_list(); ?>
			</div>
					
					

		</div><!-- end sideitem -->
					
			



			


					<div class="sideitem">
						 <div class="boxhead"><div class="headfill">&nbsp;</div></div>

			<div class="boxbody">
			<!-- SEARCH THE SITE -->
				<h2>Searching</h2>
			   <form id="searchform" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				
					<input type="text" name="s" id="s" size="15" />
					<input type="submit" value="<?php _e('Search'); ?>" />
				
				</form>
			</div>
		
	

		</div><!-- end sideitem -->



<?php endif; ?>

	<div class="reset">&nbsp;</div>
</div><!-- end NAV -->
</div><!-- end MENU -->
