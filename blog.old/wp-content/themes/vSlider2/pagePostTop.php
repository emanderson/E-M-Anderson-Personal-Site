<!-- 
This is a page post - similar to the normal post, but simplified
This piece should be included in all pages the just to need to show basic content
-->

<?php 
$randomID = md5(microtime().rand(10000, 32000));
?>

<div class="post-top" id="post_top_<?php echo $randomID;?>">
<div class="post-bottom">
<div class="post">

	<div class="post-title-top" id="post_title_top_<?php echo $randomID;?>">
	<div class="post-title-bottom" id="post_title_bottom_<?php echo $randomID;?>">

		<!-- Title bar content -->
		<div class="post-title" id="post_title_<?php echo $randomID;?>">
			
			<div class="post-slider" vslider="true" slidebox="slide<?php echo $randomID;?>" 
				styleswitchcode="			
				
					// Prepare all elements that need to change state on open/close
					var postTop = {
						'element' : document.getElementById('post_top_<?php echo $randomID;?>'),
						'open' : 'post-top',
						'closed' : 'post-top-closed'
					}
					var titleTop = {
						'element' : document.getElementById('post_title_top_<?php echo $randomID;?>'),
						'open' : 'post-title-top',
						'closed' : 'post-title-top-closed'
					}
					var titleBody = {
						'element' : document.getElementById('post_title_<?php echo $randomID;?>'),
						'open' : 'post-title',
						'closed' : 'post-title-closed'
					}
					var titleFiller = {
						'element' : document.getElementById('post_title_filler_<?php echo $randomID;?>'),
						'open' : 'post-title-filler',
						'closed' : 'post-title-filler-closed'
					}					
					var titleBottom = {
						'element' : document.getElementById('post_title_bottom_<?php echo $randomID;?>'),
						'open' : 'post-title-bottom',
						'closed' : 'post-title-bottom-closed'
					}					
					var postBodyTop = {
						'element' : document.getElementById('post_body_top_<?php echo $randomID;?>'),
						'open' : 'post-body-top',
						'closed' : 'post-body-top-closed'
					}
					var postBody = {
						'element' : document.getElementById('post_body_<?php echo $randomID;?>'),
						'open' : 'post-body',
						'closed' : 'post-body-closed'
					}
					var postSlider = {
						'element' : this,
						'open' : 'post-slider',
						'closed' : 'post-slider-closed'
					}
					
					// Create one array with all associate arrays
					var styles = new Array();					
					styles.push(postTop);
					styles.push(titleTop);
					styles.push(titleBody);
					styles.push(titleFiller);					
					styles.push(titleBottom);
					styles.push(postBodyTop);
					styles.push(postBody);		
					styles.push(postSlider);					
					
					styles;">
	
			</div>	
			
			<h2 id="post-<?php echo $randomID;?>">
				<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
			
			<!-- The title, whatever it is, should go here -->
										
			
