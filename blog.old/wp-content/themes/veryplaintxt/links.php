<?php
/*
Template Name: Links Page
*/
?>
<?php get_header() ?>
	
	<div id="container">
		<div id="content" class="hfeed">

<?php the_post() ?>

			<div id="post-<?php the_ID(); ?>" class="<?php veryplaintxt_post_class() ?>">
				<h2 class="entry-title"><?php the_title() ?></h2>
				<div class="entry-content">
<?php the_content() ?>

					<ul id="linkcats">
<?php if ( function_exists('wp_list_bookmarks') ) : wp_list_bookmarks('categorize=true&title_before=<h3>&title_after=</h3>'); else : ?>
<?php
$link_cats = $wpdb->get_results("SELECT cat_id, cat_name FROM $wpdb->linkcategories");
foreach ($link_cats as $link_cat) :
?>
						<li id="linkcat-<?php echo $link_cat->cat_id; ?>">
							<h3><?php echo $link_cat->cat_name; ?></h3>
							<ul>
								<?php wp_get_links($link_cat->cat_id); ?>
							</ul>
						</li>
<?php endforeach ?>
<?php endif ?>
					</ul>
<?php edit_post_link(__('Edit this entry.', 'veryplaintxt'),'<p class="entry-edit">','</p>') ?>

				</div>
			</div>

<?php if ( get_post_custom_values('comments') ) comments_template() ?>

		</div>
	</div>

<?php get_footer() ?>