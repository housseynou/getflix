<?php
session_start();
$mysqli = new mysqli('localhost','root','','getflix') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$username = '';
$comment= '';


//BUTTON SUBMIT
if (isset($_POST['save'])){
  $username = $_POST['username'];
  $comment = $_POST['comment'];
  $mysqli->query("INSERT INTO comments (username,comment) VALUES('$username','$comment')") or die($mysqli->error);
  $_SESSION['message'] = "Your comment has been posted";
  $_SESSION['msg_type'] = "success";
  header("location:comments.php");
}

//BUTTON DELETE
if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  $mysqli->query("DELETE FROM comments WHERE id=$id")or die($mysqli->error());
  $_SESSION['message'] = "Your comment has been deleted";
  $_SESSION['msg_type'] = "danger";
  header("location:comments.php");  
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
  
  $_SESSION['message'] = "Your comment has been changed";
  $_SESSION['msg_type'] = "warning";

  header('location: comments.php');

}
?>