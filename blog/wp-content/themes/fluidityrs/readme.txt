Fluidity Installation
---------------------------------------------------

INSTALLATION:
1. Unzip file to a local folder.
2. Make any changes you need to (places where this can be done are commented).
2. FTP to the "themes" folder of your WordPress. 
3. In your WordPress admin, under "Presentation," activate theme.

------------------------------------------------------------------------------------------------
Fluidity About:

Fluidity is a versatile and a very powerful theme and has a fluid layout which has all the CSS needed to create one, two, three or four column layouts. As a demo I have created three version of the same theme namely with left sidebar , right sidebar and 3 column theme.

The theme was originally developed by Dave (http://www.davereederdesign.com/).I ported and modified it for Wordpress and gave a little bit of styling similar to fMulti (http://www.fahlstad.se/) . Hope you like it as much as I loved making it.
-------------------------------------------------------------------------------------------------------------------------------------------------------------------
Fluidity Customization: Customising Header :
------------------------------------------------------------------------------------------------------------------------------------------------------------------

1>Say you have pages with page_id = 7 and page_id=8 you can modify the header links as shown below to display namely three links :Home , Page7 , Page8

<?php /* If this is the frontpage */ if ( is_home() ) { ?>
<li><a href="<?php echo get_settings('home');?>" id="current">Home</a></li><?php } else { ?>
<li><a href="<?php echo get_settings('home');?>">Home</a></li>
<?php } ?>

<?php /* If this is the frontpage */ if ( is_page('7')  ) { ?>
<li><a href="<?php bloginfo('url'); ?>/?page_id=7" id="current">Page7</a></li><?php } else { ?>
<li><a href="<?php bloginfo('url'); ?>/?page_id=7">Page7</a></li>
<?php } ?>

<?php /* If this is the frontpage */ if ( is_page('8')  ) { ?>
<li><a href="<?php bloginfo('url'); ?>/?page_id=8" id="current">Page8</a></li><?php } else { ?>
<li><a href="<?php bloginfo('url'); ?>/?page_id=8">Page8</a></li>
<?php } ?>

-------------------------------------------------------------------------------

2> I short say you have page with id='x' then modification will be like
<?php /* If this is the frontpage */ if ( is_page('x')  ) { ?>
<li><a href="<?php bloginfo('url'); ?>/?page_id=x" id="current">Pagex</a></li><?php } else { ?>
<li><a href="<?php bloginfo('url'); ?>/?page_id=x">Pagex</a></li>
<?php } ?>


----------------------------------------------------------------------------------------------------------------------------------------------------------

3> Say you have page with tag = ' link-1' then modification will be like
<?php /* If this is the frontpage */ if ( is_page('link-1')  ) { ?>
<li><a href="<?php bloginfo('url'); ?>/link-1" id="current">Link1</a></li><?php } else { ?>
<li><a href="<?php bloginfo('url'); ?>/link-1">Link1</a></li>
<?php } ?>

----------------------------------------------------------------------------------------------------------------------------------------------------------
Special Notes:

Fluidity3c version ( 3 - column ) has 2 stylesheets for proper display of theme in IE as well as FF. 

----------------------------------------------------------------------------------------------------------------------------------------------------------

Contact , Bugs , Problems 

In case of problems , bugs please contact me http://kaushalsheth.com/contact-me/

----------------------------------------------------------------------------------------------------------------------------------------------------------------





