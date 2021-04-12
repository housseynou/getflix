<?php
    $bdd = new PDO('mysql:host=localhost;dbname=id16485512_getflix;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        //$bdd = new mysqli("localhost", "root", "root", "id16485512_getflix");
        //
        $sql = $bdd->query('SELECT id, name FROM comments ORDER BY id');
        //$sql = "SELECT * FROM comments";
        //$donnée = $bdd->query($sql);
        //while($data = $donnée->fetch-assoc()){
        while($data = $sql->fetch()){
            echo "<tr>";
            echo "<td>" . $data['id'] . "</td>";
            echo "<td>" . $data['name'] . "</td>";
            echo '<td><a class="btn btn-danger" href="dashdeletuser.php?id=' . $data['id'] . '" role="button">Delete</a></td>';
            echo "</tr>";
        }

?>