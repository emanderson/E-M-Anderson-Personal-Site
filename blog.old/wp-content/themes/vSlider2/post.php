<!-- 
This is a post 
This piece should be included in all pages that show posts
-->

<div class="post-top" id="post_top_<?php the_ID();?>">
<div class="post-bottom">
<div class="post">

	<div class="post-title-top" id="post_title_top_<?php the_ID();?>">
	<div class="post-title-bottom" id="post_title_bottom_<?php the_ID();?>">

		<!-- Title bar content -->
		<div class="post-title" id="post_title_<?php the_ID();?>">
			
		
			<div class="post-slider" vslider="true" slidebox="slide<?php the_ID(); ?>" id="post-slider-<?php the_ID(); ?>"
				styleswitchcode="
				
					// Prepare all elements that need to change state on open/close
					var postTop = {
						'element' : document.getElementById('post_top_<?php the_ID();?>'),
						'open' : 'post-top',
						'closed' : 'post-top-closed'
					}
					var titleTop = {
						'element' : document.getElementById('post_title_top_<?php the_ID();?>'),
						'open' : 'post-title-top',
						'closed' : 'post-title-top-closed'
					}
					var titleBody = {
						'element' : document.getElementById('post_title_<?php the_ID();?>'),
						'open' : 'post-title',
						'closed' : 'post-title-closed'
					}
					var titleBottom = {
						'element' : document.getElementById('post_title_bottom_<?php the_ID();?>'),
						'open' : 'post-title-bottom',
						'closed' : 'post-title-bottom-closed'
					}					
					var postBodyTop = {
						'element' : document.getElementById('post_body_top_<?php the_ID();?>'),
						'open' : 'post-body-top',
						'closed' : 'post-body-top-closed'
					}
					var postBody = {
						'element' : document.getElementById('post_body_<?php the_ID();?>'),
						'open' : 'post-body',
						'closed' : 'post-body-closed'
					}
					var postSlider = {
						'element' : document.getElementById('post-slider-<?php the_ID(); ?>'),
						'open' : 'post-slider',
						'closed' : 'post-slider-closed'
					}
					
					// Create one array with all associate arrays
					var styles = new Array();					
					styles.push(postTop);
					styles.push(titleTop);
					styles.push(titleBody);
					styles.push(titleBottom);
					styles.push(postBodyTop);
					styles.push(postBody);		
					styles.push(postSlider);					
										
					styles;">
	
			</div>	
			<h2 id="post-<?php the_ID(); ?>">
				<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a>
			</h2>
			<small><?php the_date() ?> <?php the_time() ?></small>	
		</div>
	
	</div>
	</div>
	
	<!-- This is the little shadow below the title -->
	<div class="post-body-top" id="post_body_top_<?php the_ID();?>"></div>
	
	<!-- Post content, including the slide boxes -->
	<div class="post-body" id="post_body_<?php the_ID();?>">

		<div class="slideboxcontainer" id="slide<?php the_ID(); ?>">
			<div class="slidebox" id="slide<?php the_ID(); ?>_box">
										
				<?php the_content('<br/><br/>Show me more... &raquo;'); ?>
			
				<!-- Metadata - tags, categories, comments and so on... -->
				<p class="postmetadata"> 
					<?php if (function_exists('UTW_HasTags')) { ?>
						<?php if (UTW_HasTags()) : ?>Tags:&nbsp;<?php UTW_ShowTagsForCurrentPost("commalist") ?> <br/><?php endif; ?>
					<?php } ?>					
					Categories:&nbsp;<?php the_category(', ') ?> <br/> 					
					<?php edit_post_link('Edit','','<strong>&nbsp;&nbsp;&nbsp; </strong>'); ?><?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
				</p> 
			</div>
		</div>
	</div>
</div>
</div>
</div>