<?php
//启用全局变量。
 session_start();
 //连接数据库。
 $con = mysqli_connect("localhost","root","","doctor_for_test_se");
 //判断是否连接成功。
 if (!$con)
   {
   die('Could not connect: ' . mysqli_error());
   }

 else
   {
      //  echo "Connected to MySQL!";
      //  echo "<br>";
   }
 //设定检索数据库的编码方式为UTF-8。
 mysqli_query($con,'set names utf8');
 if (empty($_POST["Doctor_ID"]))
 {
   //测试弹窗
   $fail = "登录失败！用户名不能为空！";
   echo "<script language=\"JavaScript\">\r\n";
   echo "alert('{$fail}');\r\n"; 
   //通过引入JS，实现页面跳转。
   echo "location.replace(\"DoctorLogin.html\");\r\n";
   echo "</script>";
 }
 else
 {
    //将登录页面的医生ID赋值给全局变量
    $_SESSION['id'] = $_POST["Doctor_ID"];
    //为安全起见，仅将医生ID作为全局变量。
    //将登录页面的医生密码传递过来。
    $key = $_POST["Doctor_Key"];
 }
 
 // echo $id;
 // echo $key;
 //查询数据库。
 $result_doc = mysqli_query($con, "SELECT Doctor_ID, Doctor_Key FROM doctor_a");
 //将库内所有信息返回给doc，此时doc为高维数组。
 $doc = mysqli_fetch_all($result_doc);
 //通过遍历的方法查询doc内是否包含该登录信息。
 foreach ($doc as $value)
 {
    // echo $value[0]; 
    // echo "<br>";
    // echo $value[1];
    // echo "<br>";
    if ($_SESSION['id'] == $value[0] && $key == $value[1])
    {
        $login = 1;
        break;
    }
    else 
    $login = 0;
 }
 //判断用户名密码是否正确。
 if ($login == 1)
 {
    $success =  "登录成功！";
    echo "<script language=\"JavaScript\">\r\n"; 
    echo "alert('{$success}');\r\n";
    //通过引入JS，实现页面跳转。
    echo "location.replace(\"/table/query.php\");\r\n";
    echo "</script>";
 }
 else
 {
    //测试弹窗
    $fail = "登录失败！密码或用户名错误！";
    echo "<script language=\"JavaScript\">\r\n";
    echo "alert('{$fail}');\r\n"; 
    //通过引入JS，实现页面跳转。
    echo "location.replace(\"DoctorLogin.html\");\r\n";
    echo "</script>";
 }
?>