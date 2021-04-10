<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
     integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel = "preconnect" href = "https://fonts.gstatic.com">
    <link href = "https://fonts.googleapis.com/css2? family = Poppins: wght @ 400; 500; 600; 700 & display = swap "rel =" styleheet ">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="accueil.css">
    <title>Page d'actions</title>
  </head>
  <body>


<?php
session_start();
require_once('config.php');

$id = 0;
$update = false;
$username = '';
$comment= '';


//BUTTON SUBMIT
if (isset($_POST['save'])){
  $username = $_POST['username'];
  $comment = $_POST['comment'];
  $mysqli->query("INSERT INTO comments (username,comment) VALUES('$username','$comment')") or die($mysqli->error);
  $_SESSION['message'] = "<p class='poste'>Your comment has been posted</p>";
  $_SESSION['msg_type'] = "success";
  header("location:accueil.php");
}

//BUTTON DELETE
if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  $mysqli->query("DELETE FROM comments WHERE id=$id")or die($mysqli->error());
  $_SESSION['message'] = "<p class='poste'>Your comment has been deleted</p>";
  $_SESSION['msg_type'] = "danger";
  header("location:accueil.php");  
}

//BUTTON EDIT
if (isset($_GET['edit'])){
  $id = $_GET['edit'];
  $update = true;
  $result = $mysqli->query("SELECT * FROM comments WHERE id=$id") or die($mysqli->error());
  
  $row = $result->fetch_assoc();
  $username = $row['username'];
  $comment = $row['comment'];

}

if (isset($_POST['update'])){
  $id = $_POST['id'];
  $username = $_POST['username'];
  $comment = $_POST['comment'];
  
  $mysqli->query("UPDATE comments SET username='$username',comment='$comment' WHERE id=$id") or die($mysqli->error);
  
  $_SESSION['message'] = "<p class='poste'>Your comment has been changed</p>";
  $_SESSION['msg_type'] = "warning";

  header('location: accueil.php');

}
?>


</body>
</html>