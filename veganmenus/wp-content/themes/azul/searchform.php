<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
<div>
	<input type="text" name="s" id="s" onblur="this.value=(this.value=='') ? 'Search' : this.value;" onfocus="this.value=(this.value=='Search') ? '' : this.value;" value="Search" />
	<input type="submit" id="searchsubmit" value="" />
</div>
</form>