<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Getflix</title>
</head>
<body>

<div class="container">

  <h1>Commentaire</h1>

  <form class="form-inline m-2" action="commentdb.php" method="POST">
    <label for="name">Pseudo:</label>
    <input type="text" class="form-control m-2" id="name" name="name">
    <label for="comment">Commentaire:</label>
    <input type="text" class="form-control m-2" id="comment" name="comment">
    <button type="submit" class="btn btn-primary">Envoyer</button>
  </form>

  <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Pseudo</th>
                <th scope="col">Commentaire></th>
            </tr>
        </thead>
        
        <tbody>
            <?php
                include 'commentshow.php';
            ?>
        </tbody>
    
</div>
</body>
</html>