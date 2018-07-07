    var categorycode = "";
    var categorycode2 = "";
    var sumcatcode = "";
    var j = 1; //התחלת ריצה על אינטרסים
    var p = 1;
    function add() {

        
                categorycode = "<span id=\"de"+j+"\">אינטרס"+j+": <select name=\"interest"+j+"\" id=\"interest"+j+"\" onchange=\"secline("+j+")\">"; //פתיחה הקטגוריה

                for (var i = 0; i < category.length; i++) {//ספירה של כמות משתנים(כלומר קטוגרויות)
                   categorycode += "<option value=\"" + i + "\">" + category[i] + "</option>"; //על כל קטגוריה בחירה
                 }
                   categorycode += "</select><span id=\"numb"+j+"\"></span><button type=\"button\" title=\"button\" onclick=\"del("+j+")\">-</button><br></span>"; //סגירת בחירה

              document.getElementById("interes").innerHTML +=   '<tr><td>'+categorycode + ' </td></tr>'; //הדפסה
             j++;


        }

    

    function secline(a) {

          var x = document.getElementById("interest" + a).value;
          x++;
                   
               sumcatcode="<select id=\"sum"+a+"\" name=\"sum"+a+"\">";
              
               for (var c = 0; c < p_id.length ;c++){
                   if(p_id[c]==x){
                       sumcatcode +="<option value=\""+c+"\">"+sumcat[c]+"</option>";
                   }
               }
               sumcatcode += "</select>";

               document.getElementById("numb" + a).innerHTML = sumcatcode;
                }



      /*----------------------------------------------------------------------------------
      ------------------------------------------------------------------------------------
      -------------------deal with power--------------------------------------------------
      -----------------------------------------------------------------------------------*/

      function addp(){
          
      categorycode2 = "<span id=\"del"+p+"\">פאוור"+p+": <select name=\"poweri"+p+"\" id=\"poweri"+p+"\" onchange=\"seclinepo("+p+")\">"; //פתיחה הקטגוריה

                for (var q = 0; q < category.length; q++) {//ספירה של כמות משתנים(כלומר קטוגרויות)
                  
                   categorycode2 += "<option value=\"" + q + "\">" + category[q] + "</option>"; //על כל קטגוריה בחירה
                
                 }

                   categorycode2 += "</select><span id=\"numberi"+p+"\"></span><button type=\"button\" title=\"button\" onclick=\"dele("+p+")\">-</button></span>"; //סגירת בחירה
                  
                   document.getElementById("power").innerHTML += categorycode2 + '<span class="ex" id="numo' + p + '"></span>' + ' <br />'; //הדפסה
                   p++;

      }


      function seclinepo(r) {

          var t = document.getElementById("poweri" + r).value;
          t++;
                   
               sumcatcode2="<tr><td><select id='sumi"+r+"' name='sumi"+r+"'>";
              
               for (var d = 0; d < p_id.length ;d++){
                   if(p_id[d]==t){
                       sumcatcode2 +="<option value='"+d+" '>"+sumcat[d]+"</option>";
                   }
               }
               sumcatcode2 += "</select></td></tr>";

               document.getElementById("numberi" + r).innerHTML = sumcatcode2;
                
            }
            function dele(z){
          document.getElementById("del" + z).innerHTML = "";
      }


      document.getElementById("myBtn").addEventListener("click", displayDate);
      function displayDate() {
    document.getElementById("demo").innerHTML = Date();
}