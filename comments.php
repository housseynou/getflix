<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
     integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel = "preconnect" href = "https://fonts.gstatic.com">
    <link href = "https://fonts.googleapis.com/css2? family = Poppins: wght @ 400; 500; 600; 700 & display = swap "rel =" styleheet ">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css? <?php echo time(); ?>">
    <title>Forum</title>
  </head>
  <body>

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
            <div>
              <ul class="nav-link">
                <li><a href="#" class="inscire">S'inscrire</a></li>
                <li><a href="#" class="login">Login</a></li>
              </ul>        
            </div>
          </div>
        </div>
      </nav>
    </section>


    <header>
      <h2>Discussion Forum</h2>    
    </header>


  <?php require_once 'actions.php';?>

 
  <div class="container">
  <?php 
  /* CONNECTION TO DATABASE */
    $mysqli= new mysqli('localhost','root','','getflix') or die(mysqli_error($mysqli));
  /* GRAB DATA FROM THE DATABASE */
    $result = $mysqli->query("SELECT * FROM comments ORDER BY date_comment DESC") or die($mysqli->error);
    
    ?>
    <div class="row justify-content-center">
      <div class="row justify-content-center">
        <form action="actions.php" method="POST">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <div class="form-group">
          <!-- the value of the pseudo should be replaced with the variable $username-->
            <input type="hidden" class="form-control" name="username" value="Anonymous">
          </div>

          <div class="form-group">
            <input type="text" name="comment" class="form-control" placeholder="Write your comment" value="<?php echo $comment ?>"> 
          </div>

          <div class="form-group">
          <?php
          if ($update == true):
          ?>
            <button type="submit" class="btn btn-info" name="update">Update</button><br><br><br>
          <?php else: ?>
            <button type="submit" class="btn btn-primary" name="save">Add comment</button><br><br><br>
          <?php endif; ?>
          </div> 

        </form>
      </div>
    </div>

<!-- TABLE TO PRINT COMMENTS -->

    <div class="row justify-content-center">
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
    <tr>
      <td><?php echo '<b>' . $row['username'] . '</b>';?></td>
      <td><?php echo $row['date_comment'];?></td>
      <td><?php echo htmlspecialchars($row['comment']);?></td>
      <td>
      <!-- EDIT BUTTON -->
      <a href="comments.php?edit=<?php echo $row['id'];?>" class="btn" name="edit"><i class="fas fa-edit"></i></a>
      <!-- DELETE BUTTON -->
      <a href="actions.php?delete=<?php echo $row['id'];?>" class="btn" name="delete"> <i class="fas fa-trash-alt"></i></a> 
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
</body>
</html>