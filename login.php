<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
     integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel = "preconnect" href = "https://fonts.gstatic.com">
    <link href = "https://fonts.googleapis.com/css2? family = Poppins: wght @ 400; 500; 600; 700 & display = swap "rel =" styleheet ">
<!--     <link rel="stylesheet" href="style.css"> -->
    <title>Projet</title>


    <style>


#medium{
    max-width: 800px;
    margin: 100px auto;
    width: 100%;
}
.about{
   display: flex;
   align-items: center;
   justify-content: center;
}
.about-flex{
    display: grid;
    grid-template-columns: 1fr;
    grid-template-rows: 1fr;
    gap: 1px;
    justify-content: center;
    align-items: center;
}
.about-area{
    position: relative;
} 
.box-title{
    text-align: center;
    color: #fff;
}
.form{
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    margin: 10px;
}
.username{
    border: none;
    outline: 0;
    background: #373b69;
    color: #fff;
    text-align: center;
    margin-top: 5px;
    width: 100%;
    border-radius: 10px;
    padding: 10px 20px;
}

.password{
    border: none;
    outline: 0;
    background: #373b69;
    color: #fff;
    text-align: center;
    margin-top: 5px;
    width: 100%;
    border-radius: 10px;
    padding: 10px 20px;

}
.submit{
    border: none;
    outline: 0;
    background: #22254b;
    color: #fff;
    text-align: center;
    padding: 7px;
    margin-top: 7px;
    border-radius: 10px;
    font-size: 15px;
    cursor: pointer;
}
.container{
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;

}
.cancel{
    border: none;
    outline: 0;
    background: #22254b;
    color: #fff;
    text-align: center;
    padding: 7px;
    margin-top: 3px;
    border-radius: 10px;
    font-size: 15px;
    cursor: pointer;
    margin: 5px;
 
}

.pswi{
  color: #dfedee;
  margin: 2px;
}
.pswi a{
    color: #fff;
}
.imgcontainer{
    float: right;
    font-size: 25px;
    color: #fff;
    padding-bottom: 15px;
    cursor: pointer;
} 

.modal {
  margin-top: 50px;
  display: block;
background: #373b69;
box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.1);
padding: .85rem;
border-radius: 10px;
margin: 16px 16px;
overflow: auto; 
z-index: 1;
background: #373b69;
-webkit-animation: animatezoom 0.6s;
animation: animatezoom 0.6s;
-webkit-animation: animatezoom 0.6s;
animation: animatezoom 0.6s;

} 


  .animate {
   z-index: 100;
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
} 


/* accueil */

.errorMessage{
  color: #fff
}

section{
  position: fixed;
  top:0;
  left:0;
    background-image: url('https://keanet.eu/wp-content/uploads/Building-a-thriving-European-audiovisual-industry-KEA-pic4-1600px.jpg');
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    width: 100%;
    height: 100%;
}

    </style>

 
  </head>
  <body>

    <!-- login -->

<section>

<div id="medium">
   <div class="about">
    <div class="about-flex">
    <div class="about-area">

      
    <div id="id02" class="modal">

<?php


session_start();
require_once('config.php');


if (isset($_POST['username'])){

  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($mysqli, $username);

  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($mysqli, $password);

  $query = "SELECT * FROM `users` WHERE username='$username' and password='".hash('sha256', $password)."'";
  $result = mysqli_query($mysqli,$query) or die(mysql_error());

  $rows = mysqli_num_rows($result);
  if($rows==1){

     if($_POST['username']){
      $_SESSION['username'] = $username;
      header("Location: index.php");
      exit();
     }
    
  }else{
    $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
  }
}
?>

 
 
    <form class="animate" action="" method="post">
     
      <div class="imgcontainer">
    <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      </div>

    <h1 class="box-title">Connexion</h1>   

    <div class="form">
      
    <input type="text" class="username" name="username" placeholder="Nom d'utilisateur" required />
    <input type="password" class="password" name="password" placeholder="Mot de passe" required />
    <input type="submit" name="submit" value="Connect" class="submit" />
    </div>

    <div class="container">
    <button class="cancel" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button> 
      <span class="pswi"><a href="#" onclick="document.getElementById('id02').style.display='block'">Mot de passe oublié</a></span>
    </div>

    
  </form>



<?php if (!empty($message))
 {
     ?>
    <p class="errorMessage"><?php echo $message; ?></p>
<?php
 } 
 ?>

</div>
 </div>
  </div>
   </div>
  </div> 
</section>

</body>
</html>
