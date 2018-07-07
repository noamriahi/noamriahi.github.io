<?php
include('confing.php');
$new_category=$_POST['category'];
$list= array();


$sql = "SELECT DISTINCT category FROM power";
$result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
       while($row = $result->fetch_assoc()) {
        
            array_push($list, $row["category"]);
       }
     }
     else {
           echo "0 results";
     }

     $sql = "INSERT INTO  power(category) VALUES ('".$new_category."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$len=count($list);
for ($i=0;$i<$len;$i++)
   echo "<table><tr><td>".$list[$i]."</td></tr></table>";
$conn->close();



echo "<form method=\"post\">
 category:<br>
  <input type=\"text\" name=\"category\"><br>
  <input type=\"submit\" value=\"Submit\">
</form>";


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
    
    </body>

</html>
