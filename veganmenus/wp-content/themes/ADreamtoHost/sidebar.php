    </div>
    <div id="right-column">

<div id="sidebar">

<ul>
<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar() ) : ?>
	<li>
		<h2>Subscribe</h2>
		<ul>
			<li class="rss"><a href="<?php bloginfo('rss_url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/rss.png" alt="RSS Subscription" name="rsssubscribe" width="32" height="32" border="0" align="middle" id="rsssubscribe"/> Subscribe by RSS</a></li>
		</ul>
	</li>
	<li>
		<h2><?php _e('Categories'); ?></h2>
		<ul>
			<?php wp_list_cats('sort_column=name'); ?>
		</ul>
	</li>
	<li>
	<h2><?php _e('Archives'); ?></h2>
	<ul><?php wp_get_archives('type=monthly'); ?></ul>
	</li>
		<li>
		<h2><?php _e('Meta'); ?></h2>
			<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
			<li><a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS 2.0'); ?>"><?php _e('<abbr title="Really Simple Syndication">RSS</abbr> 2.0'); ?></a></li>
			<li><a href="<?php bloginfo('atom_url'); ?>" title="<?php _e('Syndicate this site using Atom'); ?>"><?php _e('Atom'); ?></a></li>
			<li><a href="http://wordpress.org" title="<?php _e('Powered by WordPress, state-of-the-art semantic personal publishing platform.'); ?>">WordPress</a></li>
			<li><a href="http://www.dreamhost.com/" title="Dreamhost">Dreamhost</a></li>
			<li><a href="http://www.artofblog.com/" title="Art of Blog">Art of Blog</a></li>
			<?php wp_meta(); ?>
		</ul>
	</li>
	<li>
		<h2><?php _e('Search'); ?></h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>
	</li>
<?php endif; ?>
</ul>

        </div>
    </div>
  </div>