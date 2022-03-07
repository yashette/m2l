<?php
session_start();


if(isset($_POST['login']) && isset($_POST['password']))
{
    // connexion à la base de données
    

 $db_username = 'root';
    $db_password = 'root';
    $db_name     = 'm2l';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('could not connect to database');



 		  $login = mysqli_real_escape_string($db,htmlspecialchars($_POST['login']) );
  		  $mdp = mysqli_real_escape_string($db, htmlspecialchars($_POST['password']) );
          $password = md5($mdp);
    
        if($login !== "" && $password !== ""){

            
    	   $qry="SELECT * FROM utilisateur WHERE login='$login' AND password='$password'";
            $result=mysqli_query($db,$qry);
    
    
                if($result) {
               if(mysqli_num_rows($result) > 0) {
            
            
            $member = mysqli_fetch_assoc($result);
            $_SESSION['id']= $member['num_uti'];
            $_SESSION['login'] = $member['login'];
            $_SESSION['role'] = $member['role'];
            
            
            
            
            header("location: session.php");
            
        }
        else
            {
           header('Location: login.php?erreur=1'); // utilisateur ou mot de passe incorrect 
            }
    }

        
            }
            
        }
   

else
    {
   header('Location: login.php');
    }
mysqli_close($db); // fermer la connection
?>
