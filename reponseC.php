<?php

include_once 'C:/xamppp/htdocs/Reclamation/config.php';
include_once 'C:/xamppp/htdocs/Reclamation/Models/reclamation.php';


Class reponseC {

   
    public function afficherTrep($id_reclamation){
        try{
            $config = config::getConnexion();
            $querry = $config->prepare(
                'SELECT * FROM reponses where id_reclamation =:id_reclamation'
            );
            $querry->execute([
                'id_reclamation'=>$id_reclamation
            ]);
            return $querry->fetchAll();
        }catch (PDOException $e){
            $e -> getMessage();
        }
    } 
    function afficherrep()
    {
        $requete = "select * from reponses";
        $config = config::getConnexion();
        try {
            $querry = $config->prepare($requete);
            $querry->execute();
            $result = $querry->fetchAll();
            return $result ;
        } catch (PDOException $th) {
             $th->getMessage();
        }
    }
    function getrepbyid($id)
    {
        $requete = "select * from reponses where id_reponse=:id";
        $config = config::getConnexion();
        try {
            $querry = $config->prepare($requete);
            $querry->execute(
                [
                    'id'=>$id
                ]
            );
            $result = $querry->fetch();
            return $result ;
        } catch (PDOException $th) {
             $th->getMessage();
        }
    }


    function ajouterreponse($reponse)
    {
        $config = config::getConnexion();
        try {
            $querry = $config->prepare('
            INSERT INTO reponses
            (id_reponse,id_reclamation,contenu,feedback)
            VALUES
            (:id_reponse,:id_reclamation,:contenu,:feedback)
            ');
            $querry->execute([
                'id_reponse'=>$reponse->getid_reponse(),
                'id_reclamation'=>$reponse->getid_reclamation(),
                'contenu'=>$reponse->getcontenu(),
                'feedback'=>$reponse->getfeedback(),
            ]);
        } catch (PDOException $th) {
             $th->getMessage();
        }
    }
    function modifierreponse($reponse,$id_reponse)
    {
        $config = config::getConnexion();
        try {
            $querry = $config->prepare('
            UPDATE reponses SET
            contenu=:contenu,
            feedback=:feedback
            where id_reponse=:id_reponse
            ');
            $querry->execute([
                'id_reponse'=>$id_reponse,
                'contenu'=>$reponse->getcontenu(),
                'feedback'=>$reponse->getfeedback(),
            ]);
        } catch (PDOException $th) {
             $th->getMessage();
        }
    }

    function supprimerrep($id)
    {
        $config = config::getConnexion();
        try {
            $querry = $config->prepare('
            DELETE FROM reponses WHERE id_reponse =:id
            ');
            $querry->execute([
                'id'=>$id
            ]);
            
        } catch (PDOException $th) {
             $th->getMessage();
        }
    }
}
?>