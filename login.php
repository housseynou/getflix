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


<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Getflix</title>
</head>
<body>
    <form action="commentdb.php" method="POST" class="form-floating">
        <textarea name="comment" class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
        <label for="floatingTextarea"></label>
        <input type="submit" class="btn btn-primary" value="add"></input>
    </form>
    
    <?php
    include 'footer.php';
?>
</body>
</html>