<?php
    $bdd = new PDO('mysql:host=localhost;dbname=id16485512_getflix;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    //$bdd = new mysqli("localhost", "root", "root", "id16485512_getflix");
    
    //$id = $_GET['id'];
    //$sql = "delete from comment where id=$id";
    $sql = ('DELETE FROM comments WHERE id="'.$_GET['id'].'"') OR die(print_r($bdd->errorInfo()));
    //$bdd->query($sql);
    //$bdd->close();
    $bdd->exec($sql);
    echo 'deleted';
    //$sql->closeCursor();
    header("location: dashcustom.php");
  
  
?>