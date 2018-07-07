

        <meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="main.css" />
<?php
    include('confing.php');

function secure1($sec){
    return mysql_real_escape_string(htmlspecialchars($sec));
}

$logmail=$_POST['logmail'];
$logpass=$_POST['logpass'];
$login=$_GET['login'];


if($login=='do'){
if(!empty($logmail)&&!empty($logpass)){

$result = $conn->query("SELECT id FROM members WHERE email= '".$logmail."' AND password='".$logpass."'");
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      
        setcookie('login', $row["id"]);
        header("Refresh:0");
    }
} else {
    echo "הדוא\"ל או הסיסמא שלך שגואיים, אנא נסה שנית";
}
}
else{
    echo "עליך למלא את כל הפרטים";
}
}

 $conn->close();
 
 echo     "<div class=\"topnav\" id=\"myTopnav\"> <form  class=\"topnav\" id='myTopnav' dir='rtl' method='post' action=?login=do>
             
            <label>מייל:</label>
            <input type='text' name='logmail' />
          
            <label>סיסמא: </label>
            <input type='password' name='logpass' />
            
            <button type='submit'>התחבר</button>
        </form></div>"

?> 