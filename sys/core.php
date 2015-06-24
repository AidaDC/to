<?php /**
* @author Andreu Sanz Miedes y Aida Dahdah Castelló
* @author asanzm.sanz@gmail.com, aidadahdah@gmail.com
* @copyright 2015 PROYECTO FINAL
* @version 1.0
*/
	class Core{

		static private $controller;
		static private $action;
		static private $params=array();
		static private $conf;

		static function init(){
			
			self::$conf=Registry::getInstance();
			Request::retrieve();
			self::$controller=Request::getCont();
			self::$action=Request::getAct();
			self::$params=Request::getParam();
			
			
			self::router();
		}
		static function router(){
			//redirects Control to respective controller
			$route=(self::$controller!="")?self::$controller:'home';
			$action=(self::$action!="")?self::$action:'home';
			if (self::$conf->deployed=='false'){
				$route='install';
			}

			
			$fileroute=strtolower($route).'.php';
			//if exists the file controller
			if(is_readable(APP.'controllers'.DS.$fileroute)){
				// create an instance of new controller
				self::$controller=new $route(self::$params);
				if (is_callable(array(self::$controller,$action))){
					//if exists the  method....
					call_user_func(array(self::$controller, $action));
				}
				else{ echo "Unexistent method!";}
			}
			else{
				self::$controller=new Error;
				
			}
			
			
		}

	}