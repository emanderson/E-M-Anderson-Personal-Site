<?php get_header(); ?>
	<div id="primary">
		<div class="entry">
		<h1 class="page-title">Oops! Page Not Found (Error 404)</h1>
			<div class="entry-content">
				<p>Oops... sorry! For one reason or another the <strong>page</strong> you are looking for could not be found and its probably not your fault. It might be:</p>
				<ul>
					<li>A mis-typed URL</li>
					<li>An out-of-date or a faulty referral from another site</li> 
					<li>Or an old page that has been deleted or moved</li>
				</ul> 
				<p>You could maybe visit the <a href="<?php bloginfo('url'); ?>">Home Page</a> to start fresh or try the search.</p>
				<?php include (TEMPLATEPATH . "/searchform.php"); ?>
			</div>
		</div>
	</div><!--#primary-->
	
<?php get_sidebar(); ?>

</div>
	
<?php get_footer(); ?>