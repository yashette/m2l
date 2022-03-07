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
// recuperer les elements concernant l'employe dans la table
$result = mysqli_query($mysqli, "SELECT * FROM demande where employer='$user' AND etat!='terminée' "); 
?>

<html>
<head>	
	<title>interface de l'employe</title>
	<link rel="stylesheet" href="style/employe.css" type="text/css" media="all" >
</head>

<body>
<a style='color:white;' href="session.php">Accueil</a><br/><br/>

<div class="box">
	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		
		<td>Tache</td>
		<td>Priorité</td>
		<td>état</td>
		<td>raison</td>
		<td>Modifier</td>
	</tr>  
	<?php 
	// assignation des élément contenu dans result 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['demande']."</td>";
		echo "<td>".$res['priorite']."</td>";	
		echo "<td>".$res['etat']."</td>";
		echo "<td>".$res['raison']."</td>";  
		echo "<td><a href=\"intmodemp.php?id=$res[numdemande]\">Modifier</a> | <a href=\"delete.php?id=$res[numdemande]\" onClick=\"return confirm('Etes-vous sur de vouloir supprimer?')\">Supprimer</a></td>";		
	}
	?>
	</table>
</div>
</body>
</html>

