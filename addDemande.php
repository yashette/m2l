<?php
session_start();
if(isset($_POST['Submit'])) {	
    
    $db_username = 'root';
    $db_password = 'root';
    $db_name     = 'm2l';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('could not connect to database');
    
     $id=$_SESSION['id'];
    $demande=$_POST['demande'];
    
	if(empty($demande) ){
			echo "<font color='red'>Entrez une demande.</font><br/>";
	header("Refresh: 5; url=demande.php");
	} else { 
echo "Demande validée, redirection dans 2s";
header('Location:demande.php');
		//insert data to database	
		$add = mysqli_query($db,  "INSERT INTO `demande` (`numdemande`, `identifiant_requete`, `demande`, `priorite`, `etat`, `employer`, `raison`, `idresponsable`) VALUES (NULL, '$id', '$demande', NULL, 'Non affecte', '', NULL, NULL);");
        
    }
}
