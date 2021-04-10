<?php
// Informations d'identification
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'tab01');
 
// Connexion à la base de données MySQL 
$mysqli = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Vérifier la connexion
if($mysqli === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
?>