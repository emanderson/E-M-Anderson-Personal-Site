			<form method="get" action="<?php bloginfo('url'); ?>/">
			  <fieldset>
					<input type="text" name="s" id="s" value="<?php the_search_query(); ?>"/>
					<input type="submit" value="Search" name="submit" id="submit"/>
				</fieldset>
			</form>