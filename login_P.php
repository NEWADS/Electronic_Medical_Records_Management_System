<?php
 require("./table/function.php"); 
 $User_Name = $_POST["User_Name"];
 $Key = $_POST["Patient_Key"];
 if($res = LoginPatient($User_Name, $Key) == 1)
 {
     echo "<script language=\"JavaScript\">\n";
     echo "alert('登录成功');";
     echo "location.replace(\"./table/record.php?id={$User_Name}\");";
     echo "</script>";
 }
?>