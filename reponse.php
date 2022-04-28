<?php
    class reponse
    {
        private $id_reponse;
        private $id_reclamation;
        private $contenu;
        private $feedback;
	
	
        function __construct($id_reponse,$id_reclamation,$contenu,$feedback){
		
			$this->id_reponse=$id_reponse;
			$this->id_reclamation=$id_reclamation;
            $this->contenu=$contenu;
            $this->feedback=$feedback;
		}
		

        function setid_reponse(string $id_reponse){
			$this->id_reponse=$id_reponse;
		}

        function setid_reclamation(string $id_reclamation){
			$this->id_reclamation=$id_reclamation;
		}

        function setcontenu(string $contenu){
			$this->contenu=$contenu;
		}

        function setfeedback(string $feedback){
			$this->feedback=$feedback;
		}

        function getid_reponse(){
			return $this->id_reponse;
		}

        function getid_reclamation(){
			return $this->id_reclamation;
		}
        
        function getcontenu(){
			return $this->contenu;
		}

        function getfeedback(){
			return $this->feedback;
		}
 
    
	}
    

?>