<?php
function registerlog($mail,$passwod){
    if($mail==TRUE){
        $a=" ";
    }
    else{
        $mail="המייל שבחרת קיים במערת";
    }
        if($password==TRUE){
        $a="";
    }
    else{
        $passwod="הסיסמאות שלך אינן תואמות";
    }
    return $passwod."<br />".$mail;
    
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
