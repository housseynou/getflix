<?php
            
    $bdd = new PDO('mysql:host=localhost;dbname=id16485512_getflix;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    //$bdd = new mysqli("localhost", "root", "root", "id16485512_getflix");
    //
    $sql = $bdd->query('SELECT * FROM comments ORDER BY date_comment DESC LIMIT 0, 10');
    //$sql = "SELECT * FROM comments";
    //$donnée = $bdd->query($sql);
    //while($data = $donnée->fetch-assoc()){
    while($data = $sql->fetch()){

        echo "<tr>";
        echo "<th scope='row'>" .$data['date_comment'] . "</th>";
        echo "<td>" . $data['name'] . "</td>";
        echo "<td>" . $data['comment'] . "</td>";
        echo '<td><a class="btn btn-primary" href="commentupdt.php?id=' . $data['id'] . '" role="button">Update</a></td>';
        echo '<td><a class="btn btn-danger" href="commentdel.php?id=' . $data['id'] . '" role="button">Delete</a></td>';
        echo "</tr>";
    }
        //$bdd->close();
        $sql->closeCursor(); 
?>