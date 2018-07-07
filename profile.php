
   
<?php
    include('navigation.php');
        function secure($sec) 
        {return mysql_real_escape_string(htmlspecialchars($sec));}

include ('confing.php');
 $id=$_GET['id'];
$sql = "SELECT id,sex,name,lname,city,area,edu FROM members WHERE id=".$id." COLLATE utf8mb4_general_ci ";
$result = $conn->query($sql);
$login=secure($_GET['login']);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<table border=1>
        <tr><td>name:</td><td>" .$row["name"]." ".$row["lname"]."</td></tr>
        <tr><td>sex:</td><td>".$row["sex"]."</td></tr>
        <tr><td>city:</td><td>".$row["city"]."</td><td>".$row["area"]."</td></tr>
        <tr><td>education:</td><td>".$row["edu"]."</td></tr>
        </table>";
    }
} else {
    echo "this user been delete or no exises";
}
 $conn->close();
?>
 <meta charset="utf-8" />
<!DOCTYPE html>
<html>
     
    <head>
        <meta charset="utf-8" />
        <style type="text/css">
        table{
border-style: ridge;
} </style>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
      
    </body>
</html>
