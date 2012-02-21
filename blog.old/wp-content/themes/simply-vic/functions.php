<?php
/*
File Name: Wordpress Theme Toolkit
Version: 1.0
Author: Ozh
Author URI: http://planetOzh.com/
*/

/************************************************************************************
 * THEME USERS : don't touch anything !! Or don't ask the theme author for support :)
 ************************************************************************************/

include(dirname(__FILE__).'/themetoolkit.php');

/************************************************************************************
 * THEME AUTHOR : edit the following function call :
 ************************************************************************************/

themetoolkit(
	'mytheme', /* Make yourself at home :
			* Name of the variable that will contain all the options of
			* your theme admin menu (in the form of an array)
			* Name it according to PHP naming rules (http://php.net/variables) */

	array(     /* Variables used by your theme features (i.e. things the end user will
			* want to customize through the admin menu)
 			* Syntax :
			* 'option_variable' => 'Option Title ## optionnal explanations',
			* 'option_variable' => 'Option Title {radio|value1|Text1|value2|Text2} ## optionnal explanations',
			* 'option_variable' => 'Option Title {textarea|rows|cols} ## optionnal explanations',
			* 'option_variable' => 'Option Title {checkbox|option_varname1|value1|Text1|option_varname2|value2|Text2} ## optionnal explanations',
			* Examples :
			* 'your_age' => 'Your Age',
			* 'cc_number' => 'Credit Card Number ## I can swear I will not misuse it :P',
			* 'gender' => 'Gender {radio|girl|You are a female|boy|You are a male} ## What is your gender ?'
			* Dont forget the comma at the end of each line ! */
	'setting1' => 'Setting One ## This is setting one.',
	'setting2' => 'Stuff {textarea|6|50} ## Enter some text',
	'setting3' => 'Choice {radio|choice1|Choice One|choice2|Choice Two} ## Chose one.',
	'setting4' => 'Multiple choice {checkbox|mc1|happy|Are you Happy ?|mc2|human|Are you Human ?} ## Chose any',

	'debug' => 'debug', 	/* this is a fake entry that will activate the "Programmer's Corner"
			 * showing you vars and values while you build your theme. Remove it
			 * when your theme is ready for shipping */
	),
	__FILE__	 /* Parent. DO NOT MODIFY THIS LINE !
			  * This is used to check which file (and thus theme) is calling
			  * the function (useful when another theme with a Theme Toolkit
			  * was installed before */
);
	
/************************************************************************************
 * THEME AUTHOR : Congratulations ! The hard work is all done now :)
 *
 * From now on, you can create functions for your theme that will use the array
 * of variables $mytheme->option. For example there will be now a variable
 * $mytheme->option['your_age'] with value as set by theme end-user in the admin menu.
 ************************************************************************************/

/***************************************
 * Additionnal Features and Functions
 *
 * Create your own functions using the array
 * of user defined variables $mytheme->option.
 *
 **************************************/

function creditcard() {
	global $mytheme;
	print "My Credit Card Number is : ";
	print $mytheme->option['creditcard'];
}

?>
