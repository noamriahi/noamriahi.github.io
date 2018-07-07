<?php 
include('confing.php');

$id=$_COOKIE['login'];

$sql = "SELECT id,sex,name FROM members WHERE id=".$id."";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "
        <div class=\"topnav\" id=\"myTopnav\">
  <a href=\"index.php\">דף בית</a>
  <a href=\"profile.php?id=".$id."\">הפרופיל שלי</a>
  <a href=\"#contact\">My Power</a>
  <a href=\"#about\">האינטרסים שלי</a> 
</div> 
<div>
        שלום:".$row["name"]." ".$row["lname"]." להתנתקות לחץ <a href='index.php?logout=true'>כאן</a>
        </div>
        ";
    
    }
 }



  ?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
         <link rel="stylesheet" type="text/css" href="main.css" />
        <title></title>
    </head>
    <body>
 
    </body>
</html>
