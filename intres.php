<?php
                session_start();
                $role = $_SESSION['role'];
           if($role !=="responsable"){
           	header("location: session.php");
           }
?>




<html>
<head>	
	<title>interface responsable</title>
	<link rel="stylesheet" href="style/styllle.css" type="text/css" media="all" >
</head>

<body>

    



								<!-- début formulaire pour la recherche -->
			


								
								<div class="box">
								<form   method="post" >
									<a style='color:white;' href="session.php">Accueil</a><br/><br/>
								<a style='color:white;' href="inttacheres.php">mes taches</a><br/><br/><br/>

									<div style="text-align:center;width: 200px; height: 150px;float: left;padding-top: 9px;">
										<span style="border-radius: 30%;border: solid;color: grey;padding-left: 36px;padding-right:36px;padding-top: 5px;padding-bottom: 5px">Type d'état : </span>  </br></br>                  
	                        
									</div>




									   <select name="etat" style="border-radius: 20%;border: solid;color: grey;padding-left: 10px;padding-right:10px;padding-top: 5px;padding-bottom: 5px;margin-bottom: 7px;" >
    								   
 									   <option value="Non affecte">Non affecte</option>
  									   <option value="Affecte">Affecte</option>
 									   <option value="en cours">en cours</option>
 									   <option value="en attente">en attente</option>
 									   <option value="terminée">terminée</option>
 									   <option value="tout">tout</option>

  									   
                                           </select><br><br>

                                           <input type="submit" name="update" value="valider" style="border-radius: 20%;border: solid;color: grey;padding-left: 25px;padding-right:25px;padding-top: 5px;padding-bottom: 5px;">
										
									</div>



									
								</form>

			</div> <!-- fin formulaire pour la recherche -->
            </div>          

<?php
// connexion a la base de donnée
include_once("loggonbdd.php");

?>


<?php


if(isset($_POST['update']))
{	

	$etat = mysqli_real_escape_string($mysqli, $_POST['etat']);
	
	// vérification de l'etat
	if($etat=="Non affecte"||$etat=="Affecte"||$etat=="en cours"||$etat=="en attente"||$etat=="terminée")  {	
			
		// recuperer les elements de la table demande
		$result = mysqli_query($mysqli, "SELECT * FROM demande Where etat='$etat' ORDER BY numdemande DESC"); 
		?>	
		


	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>demandeur</td>
		<td>Tache</td>
		<td>Priorité</td>
		<td>état</td>
		<td>employé</td>
		<td>raison</td>
		<td>Modifier</td>
	</tr>  
	<?php 
	// assignation des élément contenu dans result 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['identifiant_requete']."</td>";
		echo "<td>".$res['demande']."</td>";
		echo "<td>".$res['priorite']."</td>";	
		echo "<td>".$res['etat']."</td>";
		echo "<td>".$res['employer']."</td>";
		echo "<td>".$res['raison']."</td>";  
		echo "<td><a href=\"intmodres.php?id=$res[numdemande]\">Modifier</a> | <a href=\"delete.php?id=$res[numdemande]\" onClick=\"return confirm('Etes-vous sur de vouloir supprimer?')\">Supprimer</a></td>";		
	}
	?>
	</table>
</body>
</html>	
		<?php
			
	} elseif($etat=="tout") {	
		// recuperer les elements de la table demande
		$result = mysqli_query($mysqli, "SELECT * FROM demande ORDER BY numdemande DESC"); 

		?>
		


	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>demandeur</td>
		<td>Tache</td>
		<td>Priorité</td>
		<td>état</td>
		<td>employé</td>
		<td>raison</td>
		<td>Modifier</td>
	</tr>  
	<?php 
	// assignation des élément contenu dans result 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['identifiant_requete']."</td>";
		echo "<td>".$res['demande']."</td>";
		echo "<td>".$res['priorite']."</td>";	
		echo "<td>".$res['etat']."</td>";
		echo "<td>".$res['employer']."</td>";
		echo "<td>".$res['raison']."</td>";  
		echo "<td><a href=\"intmodres.php?id=$res[numdemande]\">Modifier</a> | <a href=\"delete.php?id=$res[numdemande]\" onClick=\"return confirm('Etes-vous sur de vouloir supprimer?')\">Supprimer</a></td>";		
	}
	?>
	</table>
</body>
</html>
<?php
	}
}
?>









