<form method="get" id="searchform" action="<?php echo $_SERVER['../Big Red/PHP_SELF']; ?>">
  <div>
    <input type="text" value="Search this blog..." name="s" id="s" onclick="this.value=''" 
	  onblur="if(this.value.length&lt;1)this.value='Search this blog...';" />
  </div>
</form>