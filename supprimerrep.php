<?php
	include 'C:/xamppp/htdocs/Reclamation/controler/reponseC.php';
	$reponseC=new reponseC();
	$reponseC->supprimerrep($_GET["id_reponse"]);
	header('Location:afficherrep.php');
?>