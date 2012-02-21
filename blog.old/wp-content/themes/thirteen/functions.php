<?php

if ( function_exists('register_sidebar') )
    register_sidebar();

include(dirname(__FILE__).'/themetoolkit.php');

themetoolkit(
	'thirteen',
	array(    
	'titlesize' => 'Blog title font size {radio|large|Large|medium|Medium|small|Small}',
	),
	__FILE__
);
	
function thirteen_titlesize() {
	global $thirteen;
	if ($thirteen->option['titlesize'] == "medium") { 
	echo '#title { 
			font-size: 2em; 
		  }
		  #title a {
			padding-top: 15px !important;
			voice-family: "\"}\""; 
			voice-family: inherit;
			height: 40px !important;
		  }
		  html>body #title a {
			height: 40px !important;
		  }';			
	} 
	if ($thirteen->option['titlesize'] == "small") { 
	echo '#title { 
			font-size: 1.8em; 
		  }
		  #title a {
			padding-top: 18px !important;
			voice-family: "\"}\""; 
			voice-family: inherit;
			height: 37px !important;
		  }
		  html>body #title a {
			height: 37px !important;
		  }';			
	} 
}

if (!$thirteen->is_installed()) { 
	$set_defaults['titlesize'] = 'large'; 
	$result = $thirteen->store_options($set_defaults); 
} 

?>