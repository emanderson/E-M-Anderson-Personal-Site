<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
<p><input type="text" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" onfocus="if(this.value == 'SEARCH: Type it, hit Enter'){this.value = ''}" onblur="if(this.value == ''){this.value = 'SEARCH: Type it, hit Enter'}" />
</p>
</form>