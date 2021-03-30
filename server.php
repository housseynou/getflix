<?php

session_start();

//Variables

$username = "";
$email = "";

$errors = array();

//Se connecter à la base de données

$db = mysql_connect('localhost', 'root','','','id16485512_getflix') or die("could not connect to the database");

//Enregistrer les users

$username = mysql_real_escape_string($db, $POST['username']);
$email = mysql_real_escape_string($db, $POST['email']);
$password_1 = mysql_real_escape_string($db, $POST['password_1']);
$password_2 = mysql_real_escape_string($db, $POST['password_2']);

//Pour que le formulaire soit correctement remplis

if(empty($username)) {array_push($errors, "Username is required")};
if(empty($email)) {array_push($errors, "Email is required")};
if(empty($password_1)) {array_push($errors, "Password is required")};
if(empty($password_2)) {array_push($errors, "Please confirm you password")};
if($password_1 !=$password_2) {array_push($errors, "Passwords do not match")};

//Vérifier si le user est enregistrer dans la DB

$user_check_query = "SELECT * FROM user WHERE username = '$username' or email='$email' LIMIT 1";
$results = mysqli_query($db, $user_check_query);
$user = mysqli_fetch-assoc($result);

if($user) {
    if ($user['username'] === $username) {array_push($errors, "Username already exists");
    if ($user['email'] === $email) {array_push($errors, "This email address already has an account");
}

//Enregistrer le user si il n'y a pas d'erreur

if(count($errors) == 0){
    $query = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";
    mysqli_query($db,$query);
    $_SESSION['success'] = "You are now logged in";

    header ('location: index.php');
}

//Si le user est login

if(isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if(empty($username)){
        array_push($errors, "Username is required");
    }
    if(empty($password)){
        array_push($errors, "Password is required");
    }

// Vérifie les info entrées avec les info de la DB

    if(count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);

        if(mysqli_num_rows($results)){

            $_SESSION['username'] = $username;
            $_SESSION['success'] = "Logged in successfully";
            header('location: index.php');
        }
        else{
            array_push($errors, "This username doesn't match this password, please try again.");
        }
    }
}
?>

