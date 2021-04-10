<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
     integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel = "preconnect" href = "https://fonts.gstatic.com">
    <link href = "https://fonts.googleapis.com/css2? family = Poppins: wght @ 400; 500; 600; 700 & display = swap "rel =" styleheet ">
    <link rel="stylesheet" href="accueil.css">

    <title>Page d'accueil</title>
  </head>
  <body>
         
          <!-- navbar -->

       <section>
        <nav id="small">
        <div class="nav-bar">
            <div class="nav-header">
                <div class="logo">
                   <img src="https://cdn.icon-icons.com/icons2/1826/PNG/512/4202092logomovienetflixsocialsocialmediavideo-115596_115705.png" alt="logo" />
                </div>
                <div class="toggle_menu" id="toggle-menu">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
                   <ul class="nav-link">
                    <li><a href="#">Sagi</a></li>
                      <li><a href="#">Sara</a></li>
                        <li><a href="#">Coulibaly</a></li>
                          <li><a href="#">Hugo</a></li>
                     <li><a href="#">Thierno</a></li>
                   </ul>        
            </div>
        </div>
        </nav>
    </section>

      <!-- scrolTop -->

    <a onclick="topFunction()" id="myBtn"><i class="fas fa-angle-up"></i></a>

          <!-- getFlix api fetch -->
          
     <header>
         <form id="form">

            <input type="text" id="search" placeholder="Search" class="search"/>

         </form>
       </header>

       <main id="main"></main> 

<!-- commentaire -->

  <h2 class="commentaire">Write your comment</h2>

<?php require_once 'actions.php';?>

<div class="color">
<div class="containe">
<?php 
/* CONNECTION TO DATABASE */

require_once('config.php');
/* GRAB DATA FROM THE DATABASE */
if($_SESSION['username']){
  $username = htmlspecialchars($_SESSION['username']);
}
  $result = $mysqli->query("SELECT * FROM comments ORDER BY date_comment DESC") or die($mysqli->error);
  
  ?>
  <div class="type-form1">
    <div class="type-form2">
      <form action="actions.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="form">
        <!-- the value of the pseudo should be replaced with the variable $username-->
          <input type="hidden" class="username" name="username" value="<?php echo $username ?>">
        </div>

        <div class="form">
          <input type="text" name="comment" class="comment" placeholder="Write your comment" value="<?php echo $comment ?>"> 
        </div>

        <div class="form">
        <?php
        if ($update == true):
        ?>
          <button type="submit" class="btnUpp" name="update">Update</button><br><br><br>
        <?php else: ?>
          <button type="submit" class="btnAdd" name="save">Add comment</button><br><br><br>
        <?php endif; ?>
        </div> 

      </form>
    </div>
  </div>

<!-- TABLE TO PRINT COMMENTS -->

  <div class="rows">
    <table class="table">
      <thead style='display:none'>
        <tr>
          <th></th>
          <th></th>
          <th></th>
    <!-- HOLDS EDIT AND DELETE BUTTONS-->
          <th colspan="2"></th>
        </tr>
      </thead>
<?php 
  while($row = $result->fetch_assoc()):?>
  <tr class="contenu">
    <td><?php echo '<p class="usern"> ' . $row['username'] . '</p>';?></td>
    <td><?php echo '<p  class="date"> ' . $row['date_comment'] . '</p>'?></td>
    <td><?php echo '<p  class="com"> ' . htmlspecialchars($row['comment']) . '</p>' ?></td>
    <td>
    <!-- EDIT BUTTON -->
    <a href="accueil.php?edit=<?php echo $row['id'];?>" class="iconUpp" name="edit"><i class="fas fa-edit"></i></a>
    <!-- DELETE BUTTON -->
    <a href="actions.php?delete=<?php echo $row['id'];?>" class="iconDel" name="delete"> <i class="fas fa-trash-alt"></i></a> 
    </td>
  </tr>
  <?php endwhile;?>
</table>

</div>

<?php
if(isset($_SESSION['message'])):?>

<div class="alert alert-<?=$_SESSION['msg_type']?>">
  <?php
    echo $_SESSION['message'];
    unset($_SESSION['message']);

  ?>
</div>
<?php endif?>       

<!-- footer -->
      
    <footer>
    <div class="nav-bar footer">
    <div class="div-footer">

       <div class="div-text">
         <h2>La mission</h2>
         <p>Laissez-vous inspirer par Netflix, Amazon Prime Video et autres Popcorn Time, Stremio ... Le but est d'affi
         les similitudes entre ces plateformes (barre de navigation, en-tête, outil de recherche, différentes catégories de vidéos…)
          Voyez ce qui est cool et ce qui fonctionne.</p>
       </div>

        <div class="div-list">
           <h2>Critères d'évaluation</h2>
           <ul>
               <li>Une page GitHub publiée est disponible.</li>
               <li>Le code est bien en retrait et commenté</li>
               <li>Le readme est propre et complet</li>
               <li>Le code est bien en retrait et commenté</li>
           </ul>
       </div>


        <div class="div-icon">
         <h2>Voir les icons </h2>
         <div class="icon">
          <a href="#"><i class="fab fa-twitter"></i>Twitter</a>
					<a href="#"><i class="fab fa-instagram"></i>Instagram</a>
					<a href="#"><i class="fab fa-facebook"></i>Facebook</a>
					<a href="#"><i class="fab fa-linkedin"></i>Linkedin</a>
       </div>
       </div>
    
    </div>
	  </div>
   </footer>

      
      <script src="script.js"></script>
  </body>
</html>




