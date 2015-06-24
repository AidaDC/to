<?php /**
* @author Andreu Sanz Miedes y Aida Dahdah Castelló
* @author asanzm.sanz@gmail.com, aidadahdah@gmail.com
* @copyright 2015 PROYECTO FINAL
* @version 1.0
*/
	class Template{
		
		static function load($contents,$data=null){
			if(is_array($data)){
				extract($data);
			}

		include APP.'tpl/head.php';
		include APP.'tpl/header.php';		
		include APP.'tpl/menu.php';
		include APP.'tpl/'.$contents.'.php';
		}
			
	}
