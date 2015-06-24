<?php /**
* @author Andreu Sanz Miedes y Aida Dahdah Castelló
* @author asanzm.sanz@gmail.com, aidadahdah@gmail.com
* @copyright 2015 PROYECTO FINAL
* @version 1.0
*/
	function base($str){
            if($str=='//'){
                return '/';
            }
            else return $str;
            
         }
	define('DS',DIRECTORY_SEPARATOR);
	define('ROOT',realpath(dirname(__FILE__)).DS);
	//to access filesystem
	define('APP',ROOT.'app'.DS);
	$app_w=dirname($_SERVER['PHP_SELF']).DS;
    define ('APP_W',base($app_w));
	//echo APP_W;
	// it could be in another file
	