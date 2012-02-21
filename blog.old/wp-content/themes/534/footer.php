<div id="bottomcontainer">
<div class="content">

<div id="column1">
<div class="bottomsmallleft"><?php posts_nav_link('','','&laquo; Previous posts'); ?></div>
<h2>Categories</h2>
<ul>
<?php wp_list_cats(); ?>
</ul>
</div>

<div id="column2">
<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/"><div class="bottomsmallcenter"><input type="text" value="Search" name="s" id="s" /><input type="image" id="ssubmit" src="<?php bloginfo('template_directory'); ?>/pic/search.jpg" /></div></form>
<div>
<h2>Most commented</h2>
<ul>
<?php $result = $wpdb->get_results("SELECT comment_count,ID,post_title FROM $wpdb->posts ORDER BY comment_count DESC LIMIT 0 , 10");
foreach ($result as $topten) {
$postid = $topten->ID;
$title = $topten->post_title;
$commentcount = $topten->comment_count; 
if ($commentcount != 0) {
?>
<li><a href="<?php echo get_permalink($postid); ?>"><?php echo $title ?> (<?php echo $commentcount ?>)</a></li>
<?php } } ?>
</ul>
</div>
</div>

<div id="column3">
<div class="bottomsmallright"><?php posts_nav_link('','Next posts &raquo;',''); ?></div>
<h2>Latest 10 posts</h2>
<ul>
<?php get_archives('postbypost','10','custom','<li>','</li>'); ?>
</ul>
</div>

</div>
</div>

<div id="footer">
<div class="content">
<p>Design &copy; 2006 by <a href="http://theundersigned.net">the undersigned</a> | AJAX by <a href="http://sevengoslings.net">Seven Goslings</a> | Powered by <a href="http://wordpress.org">WordPress</a> | Theme sponsor: <a href="http://www.sendflowersto.com">Send Flowers</a></p>
</div>
</div>
</div>

</body>
</html>