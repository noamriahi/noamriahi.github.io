
<meta charset="utf-8" />
<?PHP

    
$servername = "localhost";
$username = "root";
$password = "10Noam10";
$dbname = "interest";
    $link = mysql_connect($servername,$username,$password) or die (mysql_error());
    mysql_select_db($dbname,$link) or die(mysql_error());
    // Posts
    function secure($sec) 
        {return mysql_real_escape_string(htmlspecialchars($sec));}
    $username = secure($_POST['username']);
    $password = secure($_POST['password']);
    $conf = secure($_POST['conf']);
    $lname = secure($_POST['name']);
    $email = secure($_POST['email']);
    $reg = secure($_GET['do']);
    if (isset($reg) && $reg == "register") 
    {
        if ( !empty($username) && !empty($password) && !empty($conf) && !empty($lname) && !empty($email)) 
        {
            $query = "SELECT id FROM members WHERE nick = '".$username."'";
            $q = mysql_query($query,$link);
            if (mysql_num_rows($q) == 0) 
            {
              $emailc = "SELECT id FROM members WHERE email = '".$email."'";
 $qe = mysql_query($emailc,$link);
 if (mysql_num_rows($qe) == 0) {
                if ($password == $conf) 
                {
                    $query = "INSERT INTO members (name , email , nick , password) VALUES ('".$lname."' , '".$email."' , '".$username."' , '".$password."')";
                    mysql_query($query,$link); 
                    echo "<font size=2 color=black face=arial><b>נרשמת למערכת בהצלחה!</b></font>";
       session_start ();
                    $_SESSION["member"] == "user";
                } 
                else 
                {
                    echo "<font size=2 color=red face=arial><b>הסיסמאות אינן תואמות.</b></font>";
                    echo "<br><hr size=1 color=size><br>";
                }
            } 
            else 
            {
                echo "<font size=2 color=red face=arial><b>האימייל שהוזן כבר קיים במערכת. לא תוכל להרשם איתו. אנא הרשם עם כתובת מייל אחרת.</b></font>";
                echo "<br><hr size=1 color=size><br>";
            }
        }
         else
       {
 echo "<font size=2 color=red face=arial><b>המשתמש שבחרת קיים במערכת. אנא הרשם עם שם משתמש אחר.</b></font>";
  echo "<br><hr size=1 color=size><br>";
        }
      }
        else 
        {
            echo "<font size=2 color=red face=arial><b>חובה למלא את כל התאים</b></font>";
            echo "<br><hr size=1 color=size><br>";
        }
    }
// Form
echo "<table cellpadding=0 cellspacing=0 border=0>
 <form action=\"".$_SERVER["PHP_SELF"]."?do=register\" method=\"post\">
  <tr><td width=100>שם משתמש: </td><td width=100><input type=\"text\" name=\"username\" class=\"text1\" /></td></tr>
  <tr><td width=50>סיסמא: </td><td width=100><input type=\"password\" name=\"password\" class=\"text1\" /></td></tr>
  <tr><td width=100>אימות סיסמא: </td><td width=100><input type=\"password\" name=\"conf\" class=\"text1\" /></td></tr>
  <tr><td width=50><br>שם פרטי: </td><td width=100><br><input type=\"text\" name=\"name\" class=\"text1\" /></td></tr>
  <tr><td width=50>אימייל: </td><td width=100><input type=\"text\" name=\"email\" class=\"text1\" /></td></tr>
  <tr><td width=200><br /><input type=\"submit\" value=\"הרשם\" class=\"button\" />&nbsp<input type=\"reset\" value=\"נקה\" class=\"button\" /></tr></td>
 </form>
</table>
";
// Form End


?>