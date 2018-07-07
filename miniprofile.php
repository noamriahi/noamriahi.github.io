<?php
    include('navigation.php');
    include('confing.php');
    $id=$_COOKIE['login'];

    $sql = "SELECT id,sex,name FROM members WHERE id='".$id."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "שלום:".$row["name"]." ".$row["lname"]." להתנתקות לחץ <a href='index.php?logout=true'>כאן</a>";
    }
} else {
    echo "this user been delete or no exises";
}
function logout() {
   setcookie("login", null, 1);
  }
    if (isset($_GET['logout'])) {
    logout();
    header('Location: /source/logout.php');

  }

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
