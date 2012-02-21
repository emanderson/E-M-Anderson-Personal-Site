<?php
/*
Template Name: Links
*/
?>
<?php get_header(); ?>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left" valign="top" id="leftcolumn">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		<h2><?php the_title(); ?></h2>
			<div>
				<script type="text/javascript" src="http://del.icio.us/feeds/js/tags/shelby?count=46;size=12-23;color=5a8cef-0066cc;title=my%20del.icio.us%20tags"></script><br> 
				<?php the_content('<p>Read the rest of this page &raquo;</p>'); ?>
				<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
			</div>
		</div>
	  <?php endwhile; endif; ?>
	<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
			</td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<?php get_footer(); ?>