			<div id="sidebar">
			<?php if ( !function_exists('dynamic_sidebar')
			|| !dynamic_sidebar() ) : ?>
      <div>
        <h2>Categories</h2>
        <ul>
          <?php wp_list_categories('title_li='); ?>
        </ul>
      </div>
			<?php endif; ?>
			</div>