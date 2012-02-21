<?php if (is_single()) : ?>

	<div class="navigation">
		<div class="navleft"><?php previous_post_link('&#8592; %link') ?></div>
		<div class="navright"><?php next_post_link('%link &#8594;') ?></div>
		<div class="clear"></div>
	</div>

<?php else : ?>

	<div class="navigation">
		<div class="navleft"><?php next_posts_link('&#8592; Earlier Posts') ?></div>
		<div class="navright"><?php previous_posts_link('Newer Posts &#8594;') ?></div>
		<div class="clear"></div>
	</div>

<?php endif; ?>