<?php
/*
Template Name: contact
*/
?>
<?php get_header(); ?>
<div id="main">
		<div id="content">
			<?php if (have_posts()) : ?>

	<?php while (have_posts()) : the_post(); ?>
		<div class="post">
		<?php
		//validate email adress
		function is_valid_email($email)
		{
  			return (eregi ("^([a-z0-9_]|\\-|\\.)+@(([a-z0-9_]|\\-)+\\.)+[a-z]{2,4}$", $email));
		}

		//clean up text
		function clean($text)
		{
			return stripslashes($text);
		}

		//encode special chars (in name and subject)
		function encodeMailHeader ($string, $charset = 'UTF-8')
		{
    		return sprintf ('=?%s?B?%s?=', strtoupper ($charset),base64_encode ($string));
		}

		$c4g_name    = (!empty($_POST['c4g_name']))    ? $_POST['c4g_name']    : "";
		$c4g_email   = (!empty($_POST['c4g_email']))   ? $_POST['c4g_email']   : "";
		$c4g_url     = (!empty($_POST['c4g_url']))     ? $_POST['c4g_url']     : "";
		$c4g_subject = (!empty($_POST['c4g_subject'])) ? $_POST['c4g_subject'] : "";
		$c4g_message = (!empty($_POST['c4g_message'])) ? $_POST['c4g_message'] : "";

		$c4g_subject = clean($c4g_subject);
		$c4g_message = clean($c4g_message);
		$error_msg = "";
		$send = 0;

		if (!empty($_POST['submit'])) {			
			$send = 1;
			if (empty($c4g_name) || empty($c4g_email) || empty($c4g_message)) {
				$error_msg.= "<p><strong>Please fill in all required fields.</strong></p>\n";
				$send = 0;
			}
			if (!is_valid_email($c4g_email)) {
				$error_msg.= "<p><strong>Your email adress failed to validate.</strong></p>\n";
				$send = 0;
			}
		}
		if (!$send) { ?>

			<h2 class="post-title"><?php the_title(); ?></h2>
			<p class="day-date">Created by <em><?php the_author_posts_link() ?></em> on <em><?php the_time('d M Y'); ?></em> | Tagged as: <em><?php the_category(', ') ?></em> <?php edit_post_link(); ?></p>
			<div class="post-content">
			<?php
				the_content();
				echo $error_msg;
			?>
			<table width="100%" cellspacing="2" cellpadding="5" class="editform">

			<form method="post" action="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" id="contactform">
				<fieldset>
				<?php
				c4g_th( "Name" );
				c4g_input( "c4g_name", "text", "", $c4g_name );	
				c4g_cth();
				c4g_th( "Email" );
				c4g_input( "c4g_email", "text", "", $c4g_email );					
				c4g_cth();
				c4g_th( "Subject" );
				c4g_input( "c4g_subject", "text", "", $c4g_subject );	
				c4g_cth();
				c4g_th( "Website" );
				c4g_input( "c4g_url", "text", "", $c4g_url );	
				c4g_cth();
				c4g_th( "Message" );
				c4g_input( "c4g_message", "textarea", "", $c4g_message );	
				c4g_cth();
				c4g_th( "Ready ?" );
				c4g_input( "submit", "submit", "", "Send Message" );
				c4g_cth( "" );
				?>					
				</fieldset>
			</form>
			</table>
			</div>
		<?php
		} else {

			$displayName_array	= explode(" ",$c4g_name);
			$displayName = htmlentities(utf8_decode($displayName_array[0]));

			$header  = "MIME-Version: 1.0\n";
			$header .= "Content-Type: text/plain; charset=\"utf-8\"\n";
			$header .= "From:" . encodeMailHeader($c4g_name) . "<" . $c4g_email . ">\n";
			$email_subject	= "[" . get_settings('blogname') . "] " . encodeMailHeader($c4g_subject);
			$email_text		= "From......: " . $c4g_name . "\n" .
							  "Email.....: " . $c4g_email . "\n" .
							  "Url.......: " . $c4g_url . "\n\n" .
							  $c4g_message;

			if (@mail(get_settings('admin_email'), $email_subject, $email_text, $header)) {
				echo "<h2>Hey " . $displayName . ",</h2><p>thanks for your message! I'll get back to you as soon as possible.</p>";
			}
		}
		?>

	<?php endwhile; ?>

<?php endif; ?>

	</div>
	</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>