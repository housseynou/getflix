<?php
    /*$bdd = new PDO('mysql:host=localhost;dbname=id16485512_getflix;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $name = $_POST['name'];
    $comment = $_POST['comment'];
    $id = $_GET['id'];
    
    $request = $bdd->prepare('UPDATE comments SET name = ?, comment= ?, WHERE id="'.$id.'" ');
    $request->execute(array(
        'newnam' => $name, 
        'newcomment' => $comment
    ));
    $request->closeCursor();
    header("Location: comment.php");  */

    $conn = new mysqli("localhost", "root", "root", "id16485512_getflix");
    $id = $_GET['id'];
    $name = $_POST['name'];
    $score = $_POST['comment'];
    $sql = "update comments set name='$name', comment='$score' where id=$id";
    $result = $conn->query($sql);
    $conn->close();
    header("location: comment.php");
?>