<?php

if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'before_widget' => '<li id="%1$s" class="widget %2$s"><div class="box">',
        'after_widget' => '</div></li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));


/** Comments */
if (function_exists('wp_list_comments')) {
	// comment count
	add_filter('get_comments_number', 'comment_count', 0);
	function comment_count( $commentcount ) {
		global $id;
		$_commnets = get_comments('post_id=' . $id);
		$comments_by_type = &separate_comments($_commnets);
		return count($comments_by_type['comment']);
	}
}

// custom comments
function custom_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	global $commentcount;
	if(!$commentcount) {
		$commentcount = 0;
	}
    ?>
	<li class="comment <?php if($comment->comment_author_email == get_the_author_email()) {echo 'admincomment';} else {echo 'regularcomment';} ?>" id="comment-<?php comment_ID() ?>">
      <div class="wrap">
       <div class="avatar">

        <a class="gravatar">
			<?php if (function_exists('get_avatar') && get_option('show_avatars')) { echo get_avatar($comment, 64); } ?>
        </a>

       </div>
       <div class="details">
        <p class="head"><span class="info"><a href="#comment-<?php comment_ID() ?>"><?php printf('#%1$s', ++$commentcount); ?></a> written by

           <?php if (get_comment_author_url()) : ?>
		   <a  id="commentauthor-<?php comment_ID() ?>" href="<?php comment_author_url() ?>"> <?php comment_author(); ?></a>
		   <?php else : ?>
             <b  id="commentauthor-<?php comment_ID() ?>"><?php comment_author(); ?></b>
		   <?php endif; ?><? printf( __('%1$s at %2$s', ''), get_comment_time(__('F jS, Y', '')), get_comment_time(__('H:i', '')) ); ?></span></p>
               <div class="text">
				<?php if ($comment->comment_approved == '0') : ?>
					<p class="error"><small>Your comment is awaiting moderation.</small></p>
				<?php endif; ?>
				<div id="commentbody-<?php comment_ID() ?>"> <?php comment_text(); ?> </div>
               </div>
       </div>
   	   <div class="act">
	     <span class="reply"><a title="Reply" class="" href="javascript:void(0);" onclick="MGJS_CMT.reply('commentauthor-<?php comment_ID() ?>', 'comment-<?php comment_ID() ?>', 'comment');">RE</a></span> <span class="quote"><a title="Quote" href="javascript:void(0);" onclick="MGJS_CMT.quote('commentauthor-<?php comment_ID() ?>', 'comment-<?php comment_ID() ?>', 'commentbody-<?php comment_ID() ?>', 'comment');">Q</a></span>
         <span class="advedit"> <?php edit_comment_link(__('', ''), '', ''); ?></span>
	   </div>

      </div>
	</li>
<?php
  }
?>