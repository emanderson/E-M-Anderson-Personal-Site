<!--
	<rdf:RDF xmlns="http://web.resource.org/cc/"
		xmlns:dc="http://purl.org/dc/elements/1.1/"
		xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#">
		
		<Work rdf:about="">
		   <dc:creator><Agent>
			  <dc:title>Rui Pereira</dc:title>
		   </Agent></dc:creator>
		   <license rdf:resource="http://creativecommons.org/licenses/by/2.5/" />
		</Work>
	
		<License rdf:about="http://creativecommons.org/licenses/by/2.5/">
		   <permits rdf:resource="http://web.resource.org/cc/Reproduction" />
		   <permits rdf:resource="http://web.resource.org/cc/Distribution" />
		   <requires rdf:resource="http://web.resource.org/cc/Notice" />
		   <requires rdf:resource="http://web.resource.org/cc/Attribution" />
		   <permits rdf:resource="http://web.resource.org/cc/DerivativeWorks" />
		</License>
	
	</rdf:RDF>
-->



<div id="footer">
<div id="footer-box">

	<!-- Ads -->			
	<?php if (function_exists('adsense_deluxe_ads')) { ?>
		<div class="ads">
			<?php adsense_deluxe_ads('bottom_ads'); ?>
		</div>
		<br/>
	<?php } ?>
	


	<!-- Creative Commons License -->
	<div class="cc">
		<a rel="license" href="http://creativecommons.org/licenses/by/2.5/">
			<img alt="Creative Commons License" border="0" src="<?php bloginfo('template_directory'); ?>/images/buttons/somerights20.png" />
		</a>
		<br/>
		This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by/2.5/">Creative Commons License</a>
	</div>



	<div class="alignright">

		<a href="feed:<?php bloginfo('rss2_url'); ?>" title="Posts RSS Feed">
			<img src="<?php bloginfo('template_directory'); ?>/images/buttons/rss_posts.gif" alt="Posts RSS Feed"/>
		</a>
					
		<a href="feed:<?php bloginfo('comments_rss2_url'); ?>" title="Comments RSS Feed">
			<img src="<?php bloginfo('template_directory'); ?>/images/buttons/rss_comments.gif" alt="Comments RSS Feed"/></a><br/><br/>

		<a href="http://wordpress.org" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">
			<img src="<?php bloginfo('template_directory'); ?>/images/buttons/wordpress.gif" alt="Powered by WordPress, state-of-the-art semantic personal publishing platform."/>
		</a>
		
		<?php if (function_exists('g2_imageblock')) { ?><a href="http://gallery.sourceforge.net" title="Gallery 2.0+">
			<img src="<?php bloginfo('template_directory'); ?>/images/buttons/gallery2.gif" alt="Gallery 2.0+"/>
		</a><?php } ?>
		
		<a href="http://iRui.ac/cool-stuff/vslider2" title="vSlider 2.0 theme from iRui.ac">
			<img src="<?php bloginfo('template_directory'); ?>/images/buttons/vslider20.gif" alt="vSlider theme from iRui.ac"/>
		</a>
		
		
		<!--
		<a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">
			<img src="<?php bloginfo('template_directory'); ?>/images/buttons/w3c_xhtml.gif" alt="This page validates as XHTML 1.0 Transitional"/>
		</a>
		
		<a href="http://jigsaw.w3.org/css-validator/check/referer" title="This page uses valid CSS">
			<img src="<?php bloginfo('template_directory'); ?>/images/buttons/w3c_css.gif" alt="This page uses valid CSS"/>
		</a>
		
		<a href="http://gmpg.org/xfn/" title="XHTML Friends Network">
			<img src="<?php bloginfo('template_directory'); ?>/images/buttons/xfn_friendly.gif" alt="XHTML Friends Network"/>
		</a>
		-->
			
	</div>
</div>
</div>

<!--/div></div></div-->
		</td>
	</tr>
	<tr>
		<td id="page-bottom"></td>
	</tr>
</table>



<div id="page-bottom-margin"></div>

		<?php do_action('wp_footer'); ?>
</body>
</html>
