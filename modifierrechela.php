<?php
	include_once 'C:/xamppp/htdocs/projet_diversify/controllerR/reclamationC.php';
    include_once 'C:/xamppp/htdocs/projet_diversify/modelR/reservationMod.php';

	$reclamationC=new reclamationC();
	$listerec=$reclamationC->afficherrec(); 


     // create adherent
     $reclamation= null;

     // create an instance of the controller
     $reclamationC = new reclamationC();
     if (
         isset($_POST["id_reclamation"]) &&
         isset($_POST["type_reclamation"]) &&		
         isset($_POST["message"]) 
         
     ) {
         if (
             !empty($_POST["cin_client"]) && 
             !empty($_POST['date_res']) &&
             !empty($_POST["adulte"]) && 
             !empty($_POST["enfant"]) && 
             !empty($_POST["id_event"])
         ) {
             $reclamation = new reclamation(
                 $_POST['cin_client'],
                 $_POST['date_res'],
                 $_POST['adulte'], 
                 $_POST['enfant'],
                 $_POST['id_event']
             );
             $reservationC->modifierReservation($reservation, $_POST["id_event"]);
             header('Location:afficherRES.php');
         }
         else
             $error = "Missing information";
             echo $error;
        }
    
?>
<html>
	<head></head>
	<body>
	    <button><a href="ajouterRES.php">Ajouter une reservation</a></button>
		<center><h1>Liste des reservations</h1></center>
		<table border="1" align="center">
			<tr>
				<th>cin_client</th>
				<th>date_res</th>
				<th>adulte</th>
				<th>enfant</th>
				<th>id_event</th>
			</tr>
			<?php
				foreach($listeReservation as $reservation) {
                    if( $_POST['cin_client'] == $reservation['cin_client'] ) {
			?>
			<tr>
            <form method="POST" action="modifierRES.php">
                <td><label><?php echo $reservation['cin_client']; ?></label>
				<input type="hidden" value="<?php echo $reservation['cin_client']; ?>" size="1" name="name_client">
				<td><input value="<?php echo $reservation['date_res']; ?>" name="date_res"></td>
				<td><input value="<?php echo $reservation['adulte']; ?>" name="adulte"></td>
				<td><input value="<?php echo $reservation['enfant']; ?>" name="enfant"></td>
				<td><input value="<?php echo $reservation['id_event']; ?>" name="id_event"></td>
				<td>
					
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $reservation['cin_client']; ?> name="cin_client">
					</form>
				</td>
				<td>
					<a href="supprimerRES.php ? cin_client=<?php echo $reservation['cin_client']; ?>">Supprimer</a>
				</td>
			</tr>
            <?php } else { ?>
                <tr>
				<td><?php echo $reservation['cin_client']; ?></td>
				<td><?php echo $reservation['date_res']; ?></td>
				<td><?php echo $reservation['adulte']; ?></td>
				<td><?php echo $reservation['enfant']; ?></td>
				<td><?php echo $reservation['id_event']; ?></td>
				<td>
					<form method="POST" action="modifierRES.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $reservation['cin_client']; ?> name="cin_client">
					</form>
				</td>
				<td>
					<a href="supprimerRES.php ? cin_client=<?php echo $reservation['cin_client']; ?>">Supprimer</a>
				</td>
			</tr>
                <?php  }?>
			<?php
				}
			?>
		</table>
	</body>
</html>