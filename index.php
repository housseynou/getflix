<?php

session_start();

//Vérifie que le user est login

if(isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You should log in first to acces this website";
    header("location: login.php");
}

if(isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}

?>

//C'est un exemple d'index (à changer)

<DOCTYPE html>
<html>
<head>
    <title>Home Page Test</title>
</head>

<body>
    <h1>This is the homepage</h1>

<?php

//N'affiche la page que si le user est login

if(isset($_SESSION['success'])) :

?>

    <div>
    <h3>

<?php 

echo $_SESSION['success'];
unset($_SESSION['success']);

?>
    </h3>
<?php endif ?>
    </div>

//Si le user est login alors apparaissent ses infos

<?php if(isset($_SESSION['username'])) : ?>

<h3> Welcome <?php echo $_SESSION['username']; ?></h3>
<button><a href="index.php?logout='1'"></a></button>

<?php endif ?>

</body>
</html>
