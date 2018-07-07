<?php

 //sql
 $servername = "localhost";
 $username = "root";
 $password = "10Noam10";
 $dbname = "interest";
 // Create connection
 $conn = new mysqli($servername, $username, $password, $dbname);
 // Check connection
   if ($conn->connect_error) {
      return die("Connection failed: " . $conn->connect_error);
    } 
    
    $conn->query("SET character_set_client = utf8");
    $conn->query("SET character_set_connection = utf8");
    $conn->query("SET character_set_results = utf8");

?>
