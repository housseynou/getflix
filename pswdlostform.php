<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="formstyle.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <title>getflixProject</title>
    </head>
    
    <body class="text-center">
        <main class="form-signin">
            <form method="POST">
                <h3 class="h3 mb-3 fw-normal">Entrez votre adresse mail</h3>
                <p><em>Un email vous sera envoyé pour changer de mot de passe</em></p>
                <div class="form-floating">
                    <input id="floatingInput" class="form-control" name="email" type="email" placeholder="email" required>
                    <label for="floatingInput">Email</label>
                </div>
                <button class="w-100 btn-lg btn-primary" type="submit">Envoyer</button>
            </form> 
        

        <?php
            try{
            $bdd = new PDO('mysql:host=localhost;dbname=id16485512_getflix;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            }
            catch(Exception $e)
        {
            die('Erreur : ' .$e->getMessage());
        }
            if(isset($_POST['email'])){
                $token = uniqid();
                $url = "http://localhost:8888/getflix/pswdlostform/token?token=$token";
                $msg = "Lien pour réinitialiser votre mot de passe: $url";
                $header = 'content-type: text/plain; charset="utf-8"'. " ";
                if(mail($_POST['email'], 'Mot de pass oublié', $msg, $header)){
                    $sql = $bdd->prepare('UPDATE users SET token=? WHERE email=?');
                    $sql->execute([$token, $_POST['email']]);
                    echo "Mail envoyé";
                }else {
                    echo "Une erreur est survenue...";
                }
                
                
            }
        ?>
        </main>
    </body>
</html>
