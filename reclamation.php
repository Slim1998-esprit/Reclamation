<?php
	class reclamation{
		private $id_reclamation=null;
		private $type_reclamation=null;
		private $message=null;
		
		function __construct($type_reclamation,$message){
		
			$this->type_reclamation=$type_reclamation;
			$this->message=$message;
			
		}
		/*function getid_reclamation(){
			return $this->id_reclamation;
		}*/
		function gettype_reclamation(){
			return $this->type_reclamation;
		}

		
		function getmessage(){
			return $this->message;
		}
		
//setters
		function settype_reclamation(string $type_reclamation){
			$this->type_reclamation=$type_reclamation;
		}
		function setmessage(string $message){
			$this->message=$message;
		}
		
		
	}


?>