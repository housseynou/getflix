<?php
            
    $bdd = new PDO('mysql:host=localhost;dbname=id16485512_getflix;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    //$bdd = new mysqli("localhost", "root", "root", "id16485512_getflix");
    //
    $sql = $bdd->query('SELECT * FROM comments ORDER BY date_comment DESC LIMIT 0, 13');
    //$sql = "SELECT * FROM comments";
    //$donnée = $bdd->query($sql);
    //while($data = $donnée->fetch-assoc()){
    while($data = $sql->fetch()){
        
        
        /*if($data['id'] == $_GET['id']){
            echo "<tr>";
            echo "<th scope='row'>" .$data['date_comment'] . "</th>";
            echo "<td>" . $data['name'] . "</td>";
            echo '<form class="form-inline m-2" action="commentupdt.php" method="POST">';
            echo '<td><input type="text" class="form-control" name="comment" value="'.$data['comment'].'"></td>';
            echo '<td><button type="submit" class="btn btn-primary">valider</button></td>';
            echo '<input type="hidden" name="id" value="'.$data['id'].'">';
            echo '</form>';
        }else {*/
            echo "<tr>";
            echo "<th scope='row'>" .$data['date_comment'] . "</th>";
            echo "<td>" . $data['name'] . "</td>";
            echo "<td>" . $data['comment'] . "</td>";
            echo '<td><a class="btn btn-danger" href="dashdelet.php?id='. $data['id'] . '" role="button">Delete</a></td>';
            echo "</tr>";
        
        
       
        
       
    }
        //$bdd->close();
        $sql->closeCursor(); 
?>