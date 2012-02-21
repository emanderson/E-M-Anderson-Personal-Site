
<hr  />
<div id="footer"><p>&nbsp;</p></div>
</div>
<div id="copyright">
	<p>
	    
		<?php bloginfo('name'); ?> is proudly powered by 220 volts and 
		<a href="http://wordpress.org/">WordPress</a>.<br />Visualisation is taken care by <a href="http://www.maryndor.tk/">Maryndor</a> with his <em>WPGlass</em> theme.
		<br /><a href="feed:<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a>
		and <a href="feed:<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a>.
		<!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
	</p>
</div>

<!-- Gorgeous design by Michael Heilemann - http://binarybonsai.com/kubrick/ -->
<?php /* "Just what do you think you're doing Dave?" */ ?>

		<?php wp_footer(); ?>
<script type="text/javascript">
//<![CDATA[
/* Replacement calls. Please see documentation for more information. */

if(typeof sIFR == "function"){

// This is the preferred "named argument" syntax
	sIFR.replaceElement(named({
				sSelector:".widget-title-flash",
				sFlashSrc:"<?php bloginfo('stylesheet_directory'); ?>/widget-title.swf",
				sColor:"#ffffff",
				sLinkColor:null,
				sBgColor:null,
				sWmode:"transparent",
				sHoverColor:null,
				nPaddingTop:0,
				nPaddingBottom:0
				}));

	sIFR.replaceElement(named({
				sSelector:"#sidebar h2",
				sFlashSrc:"<?php bloginfo('stylesheet_directory'); ?>/humanist.swf",
				sColor:"#bbbbbb",
				sLinkColor:null,
				sBgColor:null,
				sWmode:"transparent",
				sHoverColor:null,
				nPaddingTop:0,
				nPaddingBottom:0,
				sCase:"lower"
				}));
/*	sIFR.replateElement(named({sSelector:"h4", sFlashSrc:"<?php bloginfo('stylesheet_directory'); ?>/klmn.swf", sColor:"#000000", sLinkColor:"#000000", nPaddingTop:20, nPaddingBottom:20})); */
// This is the older, ordered syntax
/*
	sIFR.replaceElement("h5#pullquote", "vandenkeere.swf", "#000000", "#000000", "#FFFFFF", "#FFFFFF", 0, 0, 0, 0);
	sIFR.replaceElement("h2", "tradegothic.swf", "#000000", null, null, null, 0, 0, 0, 0);
	sIFR.replaceElement("h4.subhead", "tradegothic.swf", "#660000", null, null, null, 0, 0, 0, 0);
	sIFR.replaceElement("h3.sidebox","tradegothic.swf","#000000", "#000000", "#DCDCDC", "#DCDCDC", 0, 0, 0, 0, null);
	*/
//	sIFR.replaceElement(".wt", "<?php bloginfo('stylesheet_directory'); ?>/vandenkeere.swf", "#000000", null, null, null, 0, 0, 0, 0, "wmode=transparent");

};

//]]>
</script>
</body>
</html>
