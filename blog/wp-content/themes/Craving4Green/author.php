<?php get_header(); ?>
<div id="main">
		<div id="content">
		<div class="post">
<?php
	global $wp_query;
	$curauth = $wp_query->get_queried_object();
?>
<h2>About: <?php echo $curauth->nickname; ?></h2>
<dl>
<?php if($curauth->first_name !="" && $curauth->last_name !="") {?>
<dt>Full Name</dt>
<dd><?php echo $curauth->first_name. ' ' . $curauth->last_name ;?></dd>
<?php }?>
<?php if($curauth->aim !="") {?>
<dt>AIM</dt>
<dd><?php echo $curauth->aim; ?></dd>
<?php }?>
<?php if($curauth->yim !="") {?>
<dt>Yahoo</dt>
<dd><?php echo $curauth->yim; ?></dd>
<?php }?>
<?php if($curauth->jabber !="") {?>
<dt>Google Talk / Jabber</dt>
<dd><?php echo $curauth->jabber; ?></dd>
<?php }?>
<?php if($curauth->user_url !="" && $curauth->user_url !="http://") {?>
<dt>Website</dt>
<dd><a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></dd>
<?php }?>
<dt>Details</dt>
<dd><?php echo $curauth->description; ?></dd>
</dl>

			<h2>Posts by <?php echo $curauth->nickname; ?>:</h2>
			<ul>			
			<!-- The Loop -->
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<li><h4><em><?php the_time('d M Y'); ?></em><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h4></li>
			<?php endwhile; else: ?>
			<p><?php _e('No posts by this author.'); ?></p>

			<?php endif; ?>
			<!-- End Loop -->			
		</ul>		
		</div>
		<p align="center">
		<?php posts_nav_link(); ?>
		</p>
	</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>