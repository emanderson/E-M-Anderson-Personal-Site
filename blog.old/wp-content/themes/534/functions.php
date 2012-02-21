<?php

class WP_Dark {
	function utf8_encode($string) {
		$matches = array();
		preg_match('/AppleWebKit\/([0-9]+\.[0-9])/', $_SERVER['HTTP_USER_AGENT'], $matches);
		if(count($matches) > 0 && (float) $matches[1] <= 417.9){
			return $string;
		} else {
			return utf8_encode($string);
		}
	}
	
	function utf8_decode($string) {
		$matches = array();
		preg_match('/AppleWebKit\/([0-9]+\.[0-9])/', $_SERVER['HTTP_USER_AGENT'], $matches);
		if(count($matches) > 0 && (float) $matches[1] <= 417.9){
			return utf8_decode($string);
		} else {
			return $string;
		}
	}

	function handle_add_comment($id, $approved) {
		// Override the HTTP/1.0 500 header we sent out prev.
		header("HTTP/1.0 200 OK");

		if( isset($_POST['ajax'])) {
			// We need to fetch the comment again...
			$comment = get_comment($id);

			// Since we are going to "kill" this process to avoid the Location-header, we have to emul what the rest of wp_new_comment
			if ( 'spam' !== $approved ) { // If it's spam save it silently for later crunching
				if ( '0' == $approved ) {
					wp_notify_moderator($id);
				}

				$post = &get_post($comment->comment_post_ID); // Don't notify if it's your own comment

				if ( get_settings('comments_notify') && $approved && $post->post_author != $comment->user_ID ) {
					wp_notify_postauthor($id, $comment->comment_type);
				}
			}

			if( empty($comment->comment_author_url) || trim($comment->comment_author_url) == 'http://' ) {
				$link = $comment->comment_author;
			} else {
				//echo '<pre>' . print_r($comment, true) . '</pre>';
				$link = '<a href="' . $comment->comment_author_url . '" rel="external nofollow">' . $comment->comment_author . '</a>';
			}

			$post  = '<div class="commentcontent">' . "\n";
			$post .= '    <p>' . apply_filters('comment_text', apply_filters('get_comment_text', $comment->comment_content)) . '</p>' . "\n";
			$post .= '<p class="commentinfo"><cite>' . __('Comment') . ' '. __('by') . ' ' . $link . ' &#8212; ' . date(get_settings('date_format'), time()) . ' @ <a href="#comment-' . $comment_id . '">' . date(get_settings('time_format'), time()) . '</a></cite></p>' . "\n";
			$post .= '</div></div>';

			echo WP_Dark::utf8_decode($post);
			die;
		}
	}
}

add_action('comment_post', array('WP_Dark', 'handle_add_comment'), 1, 2);

?>