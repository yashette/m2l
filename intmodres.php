<?php
                session_start();
                $role = $_SESSION['role'];
           if($role !=="responsable"){
           	header("location: session.php");
           }
?>



<?php
// connexion a la base de donnée
include_once("loggonbdd.php");
?>




<?php

$id =$_SESSION['id'];
if(isset($_POST['update']))
{	

	$numdemande = mysqli_real_escape_string($mysqli, $_POST['id']);
	
	$prio = mysqli_real_escape_string($mysqli, $_POST['prio']);
	$employe = mysqli_real_escape_string($mysqli, $_POST['employe']);
		
	
	// verifier si les champs sont vides
	if(empty($prio) || empty($employe)) {	
			
		if(empty($prio)) {
			echo "<font color='red'>choisir le niveau de priorite.</font><br/>";
		}
		
		if(empty($employe)) {
			echo "<font color='red'>choissisez un employe.</font><br/>";
		}
			
	} else {	
		//modification de la table
		$result = mysqli_query($mysqli, "UPDATE demande SET priorite='$prio',etat='Affecte',employer='$employe',idresponsable='$id' WHERE numdemande=$numdemande");
		
		//rediriger ves la page de visualisation
		header("Location: intres.php");
	}
}
?>







<?php
// avoir l'id grace a l'url
$id = $_GET['id'];


//selectioner la donnée en rapport avec l'id
$result = mysqli_query($mysqli, "SELECT * FROM demande WHERE numdemande=$id");

while($res = mysqli_fetch_array($result))
{
	$demande = $res['demande'];
	
}
?>










<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M2L APPLICATION</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style/new.css" type="text/css" media="all" >
	</head>




    




			<div class="box"  "> <!-- début debut formulaire de modification -->
					<br><br> 
					
					<br>



					<a class ="content" href="intres.php">Retour en arrière</a><br/><br/>

								<form   method="post" >


									<label class="content"><b>Taches</b></label>
									<input type="text" name="name" value="<?php echo $demande;?>" readonly style="border-radius: 20%;border: solid;color: grey;padding-left: 10px;padding-right:10px;padding-top: 5px;padding-bottom: 5px;margin-bottom: 7px;margin-top: 3px;" /><br> <br>

									<label class="content"><b>niveau de priorité</b></label>
									<select name="prio" style="border-radius: 20%;border: solid;color: grey;padding-left: 10px;padding-right:10px;padding-top: 5px;padding-bottom: 5px;margin-bottom: 7px;" >
    								   
 									   <option value="1">1</option>
  									   <option value="2">2</option>
 									   <option value="3">3</option>
  									   
                                           </select><br><br>

									<label class="content"><b>Identifiant de l'employé</b></label>          
									<select name="employe" style="border-radius: 20%;border: solid;color: grey;padding-left: 10px;padding-right:10px;padding-top: 5px;padding-bottom: 5px;margin-bottom: 7px;" >
    								   <?php

										$resultat = mysqli_query($mysqli, "SELECT * FROM utilisateur Where role='employe' "); 
										

											while($ress = mysqli_fetch_array($resultat)) { 		
										echo "<option value=".$ress['login'].">".$ress['login']."</option>";
										
										
			
											}
											?>
	
 									   
  									   
  									   
                                           </select></br>	

										<input type="hidden" name="id" value=<?php echo $_GET['id'];?>>

									<input type="submit" name="update" value="modifier" style="border-radius: 20%;border: solid;color: grey;padding-left: 25px;padding-right:25px;padding-top: 5px;padding-bottom: 5px;">
								</form>

			</div> <!-- fin formulaire de modification -->
                       


























</body>
</html>