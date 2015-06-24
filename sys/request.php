<?php /**
* @author Andreu Sanz Miedes y Aida Dahdah Castelló
* @author asanzm.sanz@gmail.com, aidadahdah@gmail.com
* @copyright 2015 PROYECTO FINAL
* @version 1.0
*/

	class Request{
		static private $query=array();

		static function retrieve(){
			$array_query=explode('/',$_SERVER['REQUEST_URI']);
			//Coder::code_var($array_query);
			
			array_shift($array_query);
			//Coder::code_var($array_query);
			if (!is_base()){
				
				array_shift($array_query);
				
				
			}
			//if ((($array_query[0]==APP_W))||(substr_count(APP_W, $array_query[0])>0)){
			//	array_shift($array_query);
			//}
			//cal estudiar que passa amb l'últim element si aquest és ""
			if (end($array_query)==""){ 
				array_pop($array_query);
			}
			self::$query=$array_query;
			//Coder::code_var($array_query);
		}
		static function getCont(){
			return array_shift(self::$query);

		}
		static function getAct(){
			return array_shift(self::$query);
		}
		static function getParam(){
			//parameters and valuesmust be odd
			if ((count(self::$query))%2==0){
				return self::$query;
			}
			else{
				echo 'ERRROR parameters and values must be odd!';
				exit;
			}
		}

	}