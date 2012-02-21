<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php bloginfo('name'); wp_title(); ?></title>
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Content-Type" content="<?php bloginfo('charset'); ?>" />
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen, projection" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
</head>

<body>
<div id="header"></div>
<div id="container">
		<ul id="nav">
   	   <li<?php if (is_home()) echo " id=\"current\""; ?>><a href="http://kino.pandela.net/" title="home"><span>home</span></a></li>
		   <li<?php if (is_page('2')) echo " id=\"current\""; ?>><a href="http://kino.pandela.net/archivos/" title="archivos"><span>archivos</span></a></li>
		   <li<?php if (is_page('3')) echo " id=\"current\""; ?>><a href="http://kino.pandela.net/about/" title="about"><span>about</span></a></li>
		   <li<?php if (is_page('4')) echo " id=\"current\""; ?>><a href="http://kino.pandela.net/cv/" title="cv"><span>cv</span></a></li>
   	   <li<?php if (is_page('5')) echo " id=\"current\""; ?>><a href="http://kino.pandela.net/portafolio/" title="portafolio"><span>portafolio</span></a></li>
	   </ul><br/>