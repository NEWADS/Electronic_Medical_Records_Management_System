<?php 
 require('function.php');
 $id = $_GET['id'];
 if ($_POST["Patient_Name"] == QuerySQL("Patient_Name","id") && 
     $_POST["Patient_Male"] == QuerySQL("Patient_Male","id") && 
     $_POST["Patient_Age"] == QuerySQL("Patient_Age","id") && 
     $_POST["Patient_Height"] == QuerySQL("Patient_Height","id") &&
     $_POST["Patient_Weight"] == QuerySQL("Patient_Weight","id") &&
     $_POST["Sign_in_time"] == QuerySQL("Sign_in_time","id"))
 {
    //测试弹窗
    $fail = "没有进行改动或未添加医嘱。";
    echo "<script language=\"JavaScript\">\r\n";
    echo "alert('{$fail}');\r\n"; 
    //通过引入JS，实现页面跳转。
    echo "location.replace(\"query.php\");\r\n";
    echo "</script>";
 }
 else
 {
    $ins = [$_POST["Patient_Name"],
            $id,
            $id,
            $_POST["Patient_Male"],
            $_POST["Patient_Age"],
            $_POST["Patient_Height"],
            $_POST["Patient_Weight"],
            $_POST["Sign_in_time"],
            $_POST["Disease_Name"],
            $_POST["Discribe"],
            $_POST["Solution"]];    

 }

 if (updatePatient($ins) == 1)
    {
        //测试弹窗
        $success =  "插入成功！";
        echo "<script language=\"JavaScript\">\r\n"; 
        echo "alert('{$success}');\r\n";
        //通过引入JS，实现页面跳转。
        echo "location.replace(\"query.php\");\r\n";
        echo "</script>";
        //<meta http-equiv="refresh" content= "2;url= http://project1/test.php">;
        //header('Location: http://project1/test.php');
    } 
 else
    {
        //cho $sql."<br>";
        //测试弹窗
        $fail = "插入失败！";
        echo "<script language=\"JavaScript\">\r\n";
        echo "alert('{$fail}');\r\n"; 
        //通过引入JS，实现页面跳转。
        echo "location.replace(\"update.php?id='$id'\");\r\n";
        echo "</script>";
        //<meta http-equiv="refresh\\" content= "2;url= http://project1/input_case.php">;
        //header('Location: http://project1/input_case.php');
    }
 mysqli_close($con);
?>