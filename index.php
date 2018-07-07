<?php
if (isset($_COOKIE["login"])){
include('confing.php');
include('navigation.php');

}
else{
include('source/login.php');
include('source/register.php');

}
echo "<br />";



 function logout() {
   setcookie("login", "", time() - 3600);
  }
    if (isset($_GET['logout'])) {
    logout();
    header('Location: /source/logout.php');

  }

?>
