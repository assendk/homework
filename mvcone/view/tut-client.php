<?php
/**
 * Created by PhpStorm.
 * User: assen.kovachev
 * Date: 29.9.2017 г.
 * Time: 20:12 ч.
 */
?>
<html>
   <body>

      <script language = "javascript" type = "text/javascript">
         <!--
            //Browser Support Code
            function ajaxFunction(){
                var ajaxRequest;  // The variable that makes Ajax possible!

                try {
                    // Opera 8.0+, Firefox, Safari
                    ajaxRequest = new XMLHttpRequest();
                }catch (e) {
                    // Internet Explorer Browsers
                    try {
                        ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
                    }catch (e) {
                        try{
                            ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                        }catch (e){
                            // Something went wrong
                            alert("Your browser broke!");
                            return false;
                        }
                    }
                }

                // Create a function that will receive data
                // sent from the server and will update
                // div section in the same page.

                ajaxRequest.onreadystatechange = function(){
                    if(ajaxRequest.readyState == 4){
                        var ajaxDisplay = document.getElementById('ajaxDiv');
                        ajaxDisplay.innerHTML = ajaxRequest.responseText;
                    }
                }

               // Now get the value from user and pass it to
               // server script.

               var age = document.getElementById('age').value;
               var wpm = document.getElementById('wpm').value;
               var sex = document.getElementById('sex').value;
               var queryString = "?age=" + age ;

               queryString +=  "&wpm=" + wpm + "&sex=" + sex;
               ajaxRequest.open("GET", "ajax-example.php" + queryString, true);
               ajaxRequest.send(null);
            }
         //-->
      </script>

      <form name = 'myForm'>
    Max Age: <input type = 'text' id = 'age' /> <br />
         Max WPM: <input type = 'text' id = 'wpm' />
         <br />

         Sex: <select id = 'sex'>
            <option value = "m">m</option>
            <option value = "f">f</option>
         </select>

         <input type = 'button' onclick = 'ajaxFunction()' value = 'Query MySQL'/>

      </form>

      <div id = 'ajaxDiv'>Your result will display here</div>
   </body>
</html>