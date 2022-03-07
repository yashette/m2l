<?php
                session_start();
                $role = $_SESSION['role'];
                $user = $_SESSION['login'];
           if($role !=="employe"){
           	header("location: session.php");
           }
?>



<?php
// connexion a la base de donnée
include_once("loggonbdd.php");
?>




<?php


if(isset($_POST['update']))
{	

	$numdemande = mysqli_real_escape_string($mysqli, $_POST['id']);
	
	$etat = mysqli_real_escape_string($mysqli, $_POST['etat']);
	$raison = mysqli_real_escape_string($mysqli, $_POST['raison']);
		
	
	// verifier si les champs sont vides
	if(empty($etat)  ){	
			
		if(empty($etat)) {
			echo "<font color='red'>choisir un etat.</font><br/>";
		}
		
		
			
	} else {	
		//modification de la table
		$result = mysqli_query($mysqli, "UPDATE demande SET etat='$etat',raison='$raison' WHERE numdemande=$numdemande");
		
		//rediriger ves la page de visualisation
		header("Location: intemp.php");
	}
}
?>




<?php
// avoir l'id grace a l'url
$id = $_GET['id'];


//selectioner la donnée en rapport avec l'id
$result = mysqli_query($mysqli, "SELECT * FROM demande WHERE numdemande=$id");
//associer les résultats
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
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="style/emp2.css" type="text/css" media="all" >
	</head>



<body >
    
<a style='color:white;'href="intemp.php">Retour en arrière</a><br/><br/>



			
					



						<div class="box">

								<form name="formulaire"  method="post" >


									<label class="content"><b>Taches</b></label>
									<input type="text" name="name" value="<?php echo $demande;?>" readonly style="border-radius: 20%;border: solid;color: grey;padding-left: 10px;padding-right:10px;padding-top: 5px;padding-bottom: 5px;margin-bottom: 7px;margin-top: 3px;" /><br><br>

										<label class="content"><b>Changement état</b></label>
										<select name="etat" id="idetat" onclick="debloquer();" style="border-radius: 20%;border: solid;color: grey;padding-left: 10px;padding-right:10px;padding-top: 5px;padding-bottom: 5px;margin-bottom: 7px;" >
    								   
 									   <option value="en cours">en cours de réalisation</option>
  									   <option value="en attente">en attente</option>
 									   <option value="terminée">terminée</option>
  									   
                                           </select><br><br>

                                           <label class="content"><b>Raison</b></label>
										    <input type="text" id="textraison" value=" " name="raison" readonly style="border-radius: 20%;border: solid;color: grey;padding-left: 10px;padding-right:10px;padding-top: 5px;padding-bottom: 5px;margin-bottom: 7px;margin-top: 3px;" /></br>          
										

                                       
										<input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
										
									



									<input type="submit"  name="update" value="modifier" style="border-radius: 20%;border: solid;color: grey;padding-left: 25px;padding-right:25px;padding-top: 5px;padding-bottom: 5px;">
								</form>

			</div> <!-- fin formulaire de modification -->
		
   <script type="text/javascript">
	
		function debloquer(){
			
			var select = document.getElementById('idetat').options[document.getElementById('idetat').selectedIndex].value;
			if(select=="en attente"){
			document.formulaire.raison.readOnly=false;
			}
			else{
				document.formulaire.raison.readOnly=true;
				document.getElementById('textraison').value=" ";
			}
			
		}
	</script>                    

</body>
</html>