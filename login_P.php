<?php
 require("./table/function.php"); 
 $User_Name = $_POST["User_Name"];
 $Key = $_POST["Patient_Key"];
 //echo "The Key is: $Key";
 if($res = LoginPatient($User_Name, $Key) == 0)
 {
     echo "<script language=\"JavaScript\">\n";
     echo "alert('用户名或密码错误！');";
     echo "location.replace('./PatientLogin.html');";
     echo "</script>";
 }
 else
 {
     echo "<script language=\"JavaScript\">\n";
     echo "alert('登录成功！');";
     echo "location.replace('./table/record.php?id={$User_Name}');";
     echo "</script>";
 }
?>