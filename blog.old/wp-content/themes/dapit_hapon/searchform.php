<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
<input class="fieldstyle2" type="text" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" />
<input class="buttonstyle" type="submit" id="searchsubmit" value="Search" />
</form>
