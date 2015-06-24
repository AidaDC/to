<?php /**
* @author Andreu Sanz Miedes y Aida Dahdah Castelló
* @author asanzm.sanz@gmail.com, aidadahdah@gmail.com
* @copyright 2015 PROYECTO FINAL
* @version 1.0
*/
	class Reg extends Controller{
		
		function __construct(){
			parent::__construct($this->params);
			$this->conf=Registry::getInstance();

			$this->model=new mReg;
			$this->view=new vReg;
		}
		function home(){

			
			
		}
	}