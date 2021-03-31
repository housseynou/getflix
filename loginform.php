<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <title>getflixProject</title>
    </head>
    
    <body class="text-center">
        <?php
            if(array_key_exists('errors', $_SESSION)): ?>
                <div class="alert alert-danger">
                    <?= inmplode('<br>', $_SESSION['errors']); ?>
                </div>
            
            <?php endif;?>
        <main class="form-signin">
            <form action="signin.php" method="POST">
                <h1 class="h3 mb-3 fw-normal">Identifier vous</h1>
                <div class="form-floating">
                    <input id="floatingInput" class="form-control" type="email" placeholder="name@example.com" required>
                    <label for="floatingInput">Adresse Email</label>
                </div>
                <div class="form-floating">
                    <input id="floatingPassword" class="form-control" type="password" placeholder="mot de passe" required>
                    <label for="floatingInput">Mot de passe</label>
                </div>
                <button class="w-100 btn-lg btn-primary" type="submit">Connexion</button>
            </form>
            <div class="inscription">Pas encore inscrit?<a href="">Cliquer ici</a></div>
        </main>
        
    </body>
</html>
