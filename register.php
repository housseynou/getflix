<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
     integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel = "preconnect" href = "https://fonts.gstatic.com">
    <link href = "https://fonts.googleapis.com/css2? family = Poppins: wght @ 400; 500; 600; 700 & display = swap "rel =" styleheet ">
    <link rel="stylesheet" href="style.css">
    <title>Page d'inscription</title>
   
   
</head>
<body>

<!-- Page d'inscription -->

<section>
     
<?php

session_start();
require_once('config.php');

if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['password'])){

  // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($mysqli, $username); 

  // récupérer l'email et supprimer les antislashes ajoutés par le formulaire
  $email = stripslashes($_REQUEST['email']);
  $email = mysqli_real_escape_string($mysqli, $email);

  // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($mysqli, $password);


  //requéte SQL + mot de passe crypté
  $query = "INSERT INTO `users` (username, email, password)
           VALUES('$username', '$email', '".hash('sha256', $password)."')";


  // Exécuter la requête sur la base de données
    $res = mysqli_query($mysqli, $query);
    if($res){
       echo "<div class='sucess'>
             <h1>Vous êtes inscrit avec succès.</h1>
             <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
       </div>";
    }
}else{
?>

<div id="medium">
   <div class="about">
    <div class="about-flex">
    <div class="about-area">

      
    <div id="id01" class="modal">
 
 
    <form class="animate" action="" method="post">
     
      <div class="imgcontainer">
    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      </div>

    <h1 class="box-title">S'inscrire</h1>   

    <div class="form">
      
    <input type="text" class="username" name="username" placeholder="Nom d'utilisateur" required />
    <input type="text" class="email" name="email" placeholder="Email" required />
    <input type="password" class="password" name="password" placeholder="Mot de passe" required />
    <input type="submit" name="submit" value="S'inscrire" class="submit" />
    </div>

    <div class="container">
    <button class="cancel" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button> 
      <span class="psw"><a href="login.php" onclick="document.getElementById('id02').style.display='block'">Connexion</a></span>
    </div>

    
  </form>

  </div>
 </div>
  </div>
   </div>
  </div> 
      
<?php 
   } 
   ?>



  </section>

     
      
      <script src="script.js"></script>
  </body>
</html>