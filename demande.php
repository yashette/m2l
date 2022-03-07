<?php
session_start();
if($_SESSION['login'] == ""){
    header("location:login.php");  }     
            ?>

        <link rel="stylesheet" href="style/style.css" type="text/css" media="all" >    

<div class="box" style="text-align: center;margin-top:5%">

<!-- formulaire POST qui envoie les message et prepare un message d'érreur -->
           <form action="addDemande.php" method="POST">
                <h1 class="content">Demande</h1>
                
               <label class ="content" for="Demande">Quelle est la demande ?</label>

<textarea id="Demande" name="demande"
          rows="5" cols="33"></textarea>
                
                <input type="submit" id='submit' name='Submit' value='Envoyer' >
               <br><br>
<a style='color:white;' href="session.php">retour en arrière</a><br/><br/>
            </form>
</div>