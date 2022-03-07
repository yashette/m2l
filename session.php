<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style/style.css" type="text/css" media="all" >
        <!-- importer le fichier de style -->
       <!--  <link rel="stylesheet" href="style.css"  type="text/css" />-->
    </head>
    <body>
        <div class="box">
           
            <!-- lien deconnection -->
            
             <!-- <a href='session.php?deconnexion=true'><span>Déconnexion</span></a> -->
            <!-- tester si l'utilisateur est connecté -->
            <!-- si session vide, retour au login, sinon affichage nom actuel -->
         <?php
                session_start();
            
                if($_SESSION['login'] == ""){
              
              header("location:login.php");  }
                
            ?>
             <div class="content">
            <a class="content" href="deconnection.php">Deconnexion</a><br/><br/>
            <a class="content" href="intres.php">espace responsable</a><br/><br/>
            <a class="content" href="intemp.php">espace employer</a><br/><br/>
            <a class="content" href="demande.php">Faire une demande</a><br/><br/>
        </div></div>
    </body>
</html>
