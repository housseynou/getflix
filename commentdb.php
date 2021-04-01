<?php
 //   if(isset($_POST['submit'])){
        /*if(!isset($_SESSION['username'])){
            echo '<div class="alert alert-danger">' . 'You must login to comment' . '</div>';
            die();*/
            
        //$bdd = new mysqli("localhost", "root", "root", "id16485512_getflix") or die(mysqli_error($mysqli));
        $bdd = new PDO('mysql:host=localhost;dbname=id16485512_getflix;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $comment = $_POST['comment'];
        $name = $_POST['name'];
        //$request = "INSERT INTO comments (comment, date_comment) VALUES('$comment', NOW())";
        $request = $bdd->prepare("INSERT INTO comments (name, comment, date_comment) VALUES (?, ?, NOW())");
        $request->execute(array($name, $comment));
        //$bdd->query($request);
        //$bdd->close();
        $request->closeCursor();
        header("Location: comment.php");

        
        


  /*$dbb = new mysqli("localhost", "root", "root", "id16485512_getflix");

  $name = $_POST["name"];
  $comment = $_POST["comment"];
  $sql = "INSERT INTO comments (name, comment, date_comment) values ('$name', '$comment', NOW()) ";
  $dbb->query($sql);
  $dbb->close();
  header("location: comment.php");*/
?>