<form id="searchform" method="get" action="<?php bloginfo('home'); ?>/">
<div>
<span><input type="text" name="s" id="s" size="15" /></span>
<input id="searchsubmit" type="submit" value="<?php echo wp_specialchars($s, 1); ?>" />
</div>
</form>
