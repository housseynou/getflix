<?php
    if(isset($_POST['submit'])){
        $errors = [];
        $bdd = new PDO('mysql:host=localhost;dbname=id16485512_getflix', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        if(!array_key_exists('username', $_POST) || $_POST['username'] == ''){
            $errors['username'] = "Sorry, the username is not correct";
        }
        if(!array_key_exists('password', $_POST) || $_POST['password'] == ''){
            $errors['password'] = "Sorry, the password is not correct";
        }
        if(!empty($errors)){
            session_start();
            $_SESSION['$errors'] = $errors;
            header('Location: login.php'); 
        }
        else{
            
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);
            $req = $bdd->query('SELECT * FROM users WHERE username = "'.$username.'" ');
            $reponse = $req->fetch();
            if($username == $reponse['username']){
                echo 'Heureux de vous revoir '.$username.' ';
                header('Location: index.php');
            }
            
        }
    }
    ?>