<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
     integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel = "preconnect" href = "https://fonts.gstatic.com">
    <link href = "https://fonts.googleapis.com/css2? family = Poppins: wght @ 400; 500; 600; 700 & display = swap "rel =" styleheet ">
    <link rel="stylesheet" href="style.css">
    <title>Page de deconnexion</title>
   
  </head>
  <body>
       <!-- deconnexion -->
       <section>

        <div class="content">
            
            <a href='index.php?deconnexion=true'><span>Déconnexion</span></a>
            
            <!-- tester si l'utilisateur est connecté -->
            <?php

               session_start();
               require_once('config.php');
                if(isset($_GET['deconnexion']))
                { 
                   if($_GET['deconnexion']==true)
                   {  
                      session_unset();
                      header("location: login.php");
                   }
                }
                else if($_SESSION['username'] !== ""){
                    $user = $_SESSION['username'];
                    // afficher un message
                    echo "<p class='comment'>Bonjour $user, vous êtes connectés !</p>";
                }
            ?>
            
              </section>          
    
</body>
</html>
