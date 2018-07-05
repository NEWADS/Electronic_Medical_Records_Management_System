<?php 
 // echo "<br>Website for Software Engineering(Alpha Version)";
 // echo "<br>";
 // echo "Connecting MySQL...";
 // echo "<br>";
 //连接数据库。
 require('function.php');
 $id = $_SESSION['id'];
 if (empty($_POST["Patient_Name"]) || 
     empty($id) || 
     empty($_POST["User_Name"]) ||
     empty($_POST["Patient_Male"]) || 
     empty($_POST["Patient_Age"]) || 
     empty($_POST["Patient_Height"])|| 
     empty($_POST["Patient_Weight"]) || 
     empty($_POST["Sign_in_time"]) ||
     empty($_POST["Disease_Name"]))
 {
    //测试弹窗
    $fail = "添加失败！输入值不能为空！";
    echo "<script language=\"JavaScript\">\r\n";
    echo "alert('{$fail}');\r\n"; 
    //通过引入JS，实现页面跳转。
    echo "location.replace(\"query.php\");\r\n";
    echo "</script>";
 }
 else
 {
    // $sql = "INSERT INTO patient_test (Patient_Name, 
    //                                   User_Name, 
    //                                   Doctor_ID, 
    //                                   Patient_Male, 
    //                                   Patient_Age, 
    //                                   Patient_Height, 
    //                                   Patient_Weight, 
    //                                   Sign_in_time,
    //                                   Disease_Name,
    //                                   Discribe,
    //                                   Solution)
    // VALUES ('$_POST[Patient_Name]', 
    //         '$_POST[User_Name]', 
    //         '$id', 
    //         '$_POST[Patient_Male]', 
    //         '$_POST[Patient_Age]',
    //         '$_POST[Patient_Height]',
    //         '$_POST[Patient_Weight]',
    //         '$_POST[Sign_in_time]',
    //         '$_POST[Disease_Name]',
    //         '$_POST[Discribe]',
    //         '$_POST[Solution]');";
    $ins = [ $_POST["Patient_Name"],
             $_POST["User_Name"],
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

 if (insertPatient($ins) == 1)
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

        //测试弹窗
        $fail = "插入失败！";
        echo "<script language=\"JavaScript\">\r\n";
        echo "alert('{$fail}');\r\n";
        echo "alert('{$res}');\r\n";
        //通过引入JS，实现页面跳转。
        echo "location.replace(\"query.php\");\r\n";
        echo "</script>";
        //<meta http-equiv="refresh\\" content= "2;url= http://project1/input_case.php">;
        //header('Location: http://project1/input_case.php');
    }
 mysqli_close($con);
?>