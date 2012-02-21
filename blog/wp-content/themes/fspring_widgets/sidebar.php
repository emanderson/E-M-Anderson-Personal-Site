<div id="sidebar">
  <h2>Search this site</h2>
  <div id="searchdiv">
    <form id="searchform" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <input type="text" name="s" id="s" size="20"/>
      <input name="sbutt" type="submit" value="Go" alt="Submit"  />
    </form>
  </div>
  <?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar() ) : ?>

  <h2>
    <?php _e('Archives'); ?>
  </h2>
  <ul>
    <?php wp_get_archives('type=monthly'); ?>
  </ul>
  <h2>
    <?php _e('Categories'); ?>
  </h2>
  <ul>
    <?php list_cats(0, '', 'name', 'asc', '', 1, 0, 0, 1, 1, 1, 0,'','','','','') ?>
  </ul>
  <h2>
    <?php _e('Meta'); ?>
  </h2>
  <ul>
    <?php wp_register(); ?>
    <li><a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS'); ?>">
      <?php _e('<abbr title="Really Simple Syndication">RSS</abbr>'); ?>
      </a></li>
    <li>
      <?php wp_loginout(); ?>
    </li>
    <li><a href="http://validator.w3.org/check/referer" title="<?php _e('This page validates as XHTML 1.0 Transitional'); ?>">
      <?php _e('Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr>'); ?>
      </a></li>
    <li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
    <li><a href="http://wordpress.org/" title="<?php _e('Powered by WordPress, state-of-the-art semantic personal publishing platform.'); ?>">WordPress</a></li>
    <?php wp_meta(); ?>
  </ul>
  <?php endif; ?>

</div>
