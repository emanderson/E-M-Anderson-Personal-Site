<div class="content_right_sub">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(1) ) : ?>
	<h3>Colophon</h3>
	<div class="about_me"><p>Donec ac nisi in lectus euismod sodales. Suspendisse congue, arcu sit amet adipiscing scelerisque, enim neque ullamcorper dolor, sed viverra erat leo eu metus. Cras porttitor bibendum nunc.</p></div>
	<div class="more_info">
	<a href="#">More info</a>
	</div>
</div>
<div class="content_right_sub">
	<h3>Syndicate</h3>
	<ul>
		<li><a href="feed:<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a> - Full content feed</li>
		<li><a href="feed:<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a> - Full comments feed</li>
	</ul>
<?php endif; ?>
</div>