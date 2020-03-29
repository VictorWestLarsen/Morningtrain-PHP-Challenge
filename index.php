<?php
	require_once('template.class.php'); //Includes and evaluates the file, and checks if it is has already been included, and if not it will include it again. It also throws an error if it fails and exits the script.
	define('TEMPLATES_PATH', 'templates'); //Defines where to look for the template.
	

	$template = new Template(TEMPLATES_PATH.'/index.tpl.html'); //Instaciates a new object

	//assign values to placeholders with key value pair, using the function assignValue from the template class
	$template->assignValue('Title', 'Hello');
	$template->assignValue('text', 'Mornintrain');

	//show the replaced strings using show function from the template class
	$template->show();