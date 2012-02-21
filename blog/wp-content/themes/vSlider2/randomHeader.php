<!-- 
This returns a random file name from the headers folder.
-->


<?php

function choose_header($retType) {
	
	$dirhandle = opendir( dirname(__FILE__) . "/images/headers/");
	while (false !== ($filename = readdir($dirhandle))) {
		if ( substr($filename, -3) == "jpg") {
  		$image_listing[] = $filename;
  	}
	}

	$image_key = array_rand($image_listing, 1);

	$image_choice = $image_listing[$image_key];	
	
	$imagePath = "/images/headers/" . $image_choice;
	
	if($retType) {
		return $imagePath;
	}
	else {
		echo $imagePath;
	}
    
}

?>
