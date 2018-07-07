<?php
//דף ההרשמה, פה נמצא הקוד של ההרשמה    
include('confing.php');
include('source/citys.php');
function secure2($sec){return htmlspecialchars($sec);}
$try;
$category1= array();
$category2=array();
$p_id=array();
$name=secure2($_POST['name']);
$reg=$_GET['do'];
$password=secure2($_POST['password']);
$password2=secure2($_POST['password2']);
$mail=secure2($_POST['mail']);
$city=secure2($_POST['city']);
$sex=secure2($_POST['sex']);
$lname=secure2($_POST['lname']);
$area1=secure2($_POST['area']);
$edu=secure2($_POST['edu']);
$riahi=$_POST['interest0'];

$stringoptin;
foreach ($citys as $key) {
$stringoptin.="<option value='".$key."'>".$key."</option>";
}
$areaoptin;
foreach ($area as $key) {
$areaoptin.="<option value='".$key."'>".$key."</option>";
}



/*-------------------------------------------------------------
selct one time the category from power table.
---------------------------------------------------------------*/ 
$sql = "SELECT id,category FROM power";

$result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
       while($row = $result->fetch_assoc()) {
/*--------------------------------------------------------------
push all the categorys into an array
----------------------------------------------------------------*/        
            array_push($category1, $row["category"]);
            
       }
     }
     else {
           echo "0 results";
     }

/*--------------------------------------------------------------
check if the register is not empty
----------------------------------------------------------------*/
/*--------------------------------------------------------------*/
/*--------------------------------------------------------------*/
/*--------------------------------------------------------------*/
/*-------------------------------------------------------------
selct one time the category from power table.
---------------------------------------------------------------*/ 

$result2 = $conn->query("SELECT subcat ,parent_id FROM subcat");

    if ($result2->num_rows > 0) {
    // output data of each row
       while($row = $result2->fetch_assoc()) {
/*--------------------------------------------------------------
push all the categorys into an array
----------------------------------------------------------------*/        
          array_push($category2, $row["subcat"]);
          array_push($p_id, $row["parent_id"]);
       }
     }
      else {
           echo "0 results";
     }

    if (isset($reg) && $reg == "register") 
    {
/*--------------------------------------------------------------
check if the register is not empty
----------------------------------------------------------------*/



if(!empty($name)&&!empty($password)&&!empty($mail)&&!empty($lname)&&!empty($city)){
    $result = $conn->query("SELECT id FROM members WHERE email= '".$mail."'");
    if($result->num_rows==0){
       if($password==$password2){
         $conn->query("INSERT INTO members (name, email, password, sex, lname,city,area,edu,interest) VALUES ('".$name."','".$mail."','".$password."','".$sex."','".$lname."','".$city."' , '".$area1."' ,'".$edu."','".$riahi."') ");

             $result = $conn->query("SELECT id FROM members WHERE email= '".$mail."'");
    while($row = $result->fetch_assoc()) {
      $conn->query("INSERT INTO power (uid) VALUES ('".$row["id"]."')");

        setcookie('login', $row["id"]);
        header("Refresh:0");
    }


                 echo "נרשמת בהצלחה";
             }
       else{
           echo"הסיסמאות אינן תואמות";
       }
    }
    else{
       echo "המייל שבחרת קיים במערכת";
        }
}
else{
    echo"עליך למלא את כל הפרטים";
}
}

for($i=0;$i>6;$i++)
{
    $try=+$category2[$i];
}
echo "<!DOCTYPE html>
".$try."
<form dir=\"ltr\" align=\"right\" name=\"register\" method=\"post\" action=\"".$_SERVER["PHP_SELF"]."?do=register\">
<table dir=\"ltr\" div align=\"right\">
<tr><td>  
  </td></tr><tr><td>  <input type=\"text\" name=\"name\"  ></td><td>:שם פרטי
   </td></tr>
     </td></tr><tr><td>  <input type=\"text\" name=\"lname\"  ></td><td>:שם משפחה
   </td></tr>
   <tr><td>
   <input type=\"password\" name=\"password\"> </td><td>:סיסמא  
    </td></tr></tr><td>
    <input type=\"password\" name=\"password2\"></td><td>:אמת סיסמא
    </td></tr><tr><td>
    <input type=\"text\" name=\"mail\"></td><td> :מייל

    </td></tr>
     <tr><td>
  
    <input list=\"city\" name=\"city\"></td><td>:עיר

<datalist id=\"city\">"
.$stringoptin."
</datalist> 
      </td></tr>


                   <tr><td>
       
<select name=area>  "
 .$areaoptin."
</select >
</td><td>  
 :איזור
          </td></tr>
                   <tr><td>
<select name=sex>  
    <option value=\"זכר\">זכר</option>  
    <option value=\"נקבה\">נקבה</option>  
</select > 
</td><td> 
 :מין
 </td></tr>
 <tr><td>
<select name=edu>  
    <option value=\"יסודי\">יסודי</option>  
    <option value=\"תיכון\">תיכון</option>  
    <option value=\"יג' יד'\">יג יד</option>  
    <option value=\"תואר ראשון\">תואר ראשון</option>  
    <option value=\"תואר שני\">תואר שני</option>  
    <option value=\"דוקטורט\">דוקטורט</option>  
</select >  
 :השכלה

<br />            :בחר אינטרס
           <div id=\"interes\"></div>
            </td></tr><tr><td>
            <p id=\"try\"></p>
            <button type=\"button\" title=\"button\" onclick=\"add()\">+</button><br>
    
 
               בחר פאוור:
   <div id=\"power\"></div>
   <button type=\"button\" title=\"button\" onclick=\"addp()\">+</button><br>
   </td></tr>
    <tr align=\"center\"><td>
    <input type=\"submit\"  value=\"הרשם\" class=\"button\" />&nbsp<input type=\"reset\" value=\"נקה\" class=\"button\" />
    </td></tr>
    
    </table>
</form>
";


?>
<script type="text/javascript"> var category = <?php echo json_encode($category1) ?>; 
 var sumcat = <?php echo json_encode($category2) ?>;
 var p_id = <?php echo json_encode($p_id) ?>;</script>
<script src="source/register.js"></script>
