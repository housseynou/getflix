<?php
    $bdd = new PDO('mysql:host=localhost;dbname=id16485512_getflix;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    if(isset($_GET['token']) && $_GET['token'] != ''){
        $sql = $bdd->prepare('SELECT email FROM users WHERE token=?');
        $sql->execute([$_GET['token']]);
        $link = $sql->fetchColumn();

        if($link){
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
                    <form  method="POST">
                        <h1 class="h3 mb-3 fw-normal">Récupération de Mot de pass</h1>
                        <div class="form-floating">
                            <input id="floatingPassword" class="form-control" type="password" name="newpassword" placeholder="nouveau mot de passe" required>
                            <label for="floatingInput">Mot de passe</label>
                        </div>
                        <button class="w-100 btn-lg btn-primary" type="submit">Confirmer</button>
                    </form>
                    
                </main>
                
            </body>
        </html>
        <?php
        }
    }
    if(isset($_POST['newpassword'])){
        $criptedpswd = password_hash($_POST['newpassword'], PASSWORD_DEFAULT);
        $sql = $bdd->prepare('UPDATE users SET password=? WHERE email=?');
        $sql->execute([$criptedpswd, $_POST['email']]);
        echo 'Mot de passe modifié avec succés';
    }else{
        echo 'Une erreur est surven ';
    }
?>