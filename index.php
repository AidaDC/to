<?php /**
* @author Andreu Sanz Miedes y Aida Dahdah Castelló
* @author asanzm.sanz@gmail.com, aidadahdah@gmail.com
* @copyright 2015 PROYECTO FINAL
* @version 1.0
*/
	$time=microtime();
	error_reporting(E_ALL);
	ini_set('display_errors','1');
	include 'constants.php';
	require 'sys/helper.php';
	
	$conf=Registry::getInstance();
	$conf->init();

	// installation first if necessary
	if (!file_exists('.deployed')){
			$conf->deployed='false';
		}
	Session::init();
	
	// setting init time
	$conf->time;
	
	//Coder::code_var($conf);
	Core::init();