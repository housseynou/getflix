<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "id16485512_getflix";
//if submit btn is pressed ...
if (isset($_POST['submit'])){
    $connection = new mysqli($host,$user,$password,$db);
    if(!$connection){
        die("Connection failed: " . mysqli_connect_error());
    }
   
    $q = $connection->real_escape_string($_POST['q']);
    //check $q
    if(!$q) {
        die("failed : ".mysqli_connect_error());
    }else{
        
    }


    $column = $connection->real_escape_string($_POST['column']);
    //check $column
    if(!$column){
        die("Please choose the criteria of search. ".mysqli_connect_error());
    }else{
       
    }

    if($column =="" || ($column !="nom" && $column != "date")){
        $column ="nom";
    }
    
    $sql = $connection->query("SELECT * FROM `id16485512_root` WHERE $column LIKE '%$q%'");
    
    

    //check $sql
    if (!$sql) {
        die("Connection failed: " . mysqli_connect_error());
      }
     
    if($sql->num_rows > 0){
        while($data = $sql->fetch_array())
            echo $data['nom']."<br>";
        

    }
    else{
        echo"Sorry,nothing found!";
    }
}
?>


<html>
<head>
<title>PHP SEARCH FORM</title>
</head>
<body>
<form method="post" action="search.php">
    <input type="text" name="q" placeholder="Search Query">
    <select name="column">
        <option value="">Select Filter</option>
        <option value="nom">Movie Name</option>
        <option value="date">Date</option>

    </select>
    <input type="submit" name="submit" value="Find">
</form>
</body>

</html>
