<?php 
 function QuerySQL($Dname)
 {
    $con = mysqli_connect("localhost","root","","doctor_for_test_se");
    //设定检索数据库的编码方式为UTF-8。
    mysqli_query($con,'set names utf8');
	$result_patient = mysqli_query($con,"SELECT Patient_Name,
	 											Patient_Age,
												Patient_Height,
												Patient_Weight,
												Patient_Male,
												User_Name,
												Sign_in_time,
												Doctor_ID,
												Disease_Name,
												Discribe,
												Solution FROM patient_test");
	while($row = mysqli_fetch_assoc($result_patient))
	{
        if ($row["User_Name"] == $_GET["id"])
		{
			return $row[$Dname];
			break;
		}
	}
 }

 //连接数据库。
 $con = mysqli_connect("localhost","root","","doctor_for_test_se");
 //设定检索数据库的编码方式为UTF-8。
 mysqli_query($con,'set names utf8');
 if (empty($_POST["Disease_Name"]))
 {
     $_POST["Disease_Name"] = "HOMO";
 }


 if ($_POST["Patient_Name"] == QuerySQL("Patient_Name") && 
     $_POST["Patient_Male"] == QuerySQL("Patient_Male") && 
     $_POST["Patient_Age"] == QuerySQL("Patient_Age") && 
     $_POST["Patient_Height"] == QuerySQL("Patient_Height") &&
     $_POST["Patient_Weight"] == QuerySQL("Patient_Weight") &&
     $_POST["Sign_in_time"] == QuerySQL("Sign_in_time") ||
     empty($_POST["Discribe"]) ||
     empty($_POST["Solution"]))
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
    echo $_GET['id'];
    $sql = "UPDATE patient_test SET Patient_Name = '$_POST[Patient_Name]',
                                    Patient_Male = '$_POST[Patient_Male]',
                                    Patient_Age = '$_POST[Patient_Age]',
                                    Patient_Height = '$_POST[Patient_Height]',
                                    Patient_Weight = '$_POST[Patient_Weight]',
                                    Sign_in_time = '$_POST[Sign_in_time]',
                                    Disease_Name = '$_POST[Disease_Name]',
                                    Discribe = '$_POST[Discribe]',
                                    Solution = '$_POST[Solution]'
                                WHERE patient_test.User_Name = '$_GET[id]'" ;

 }

 if (mysqli_query($con, $sql) === TRUE)
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
        echo $sql."<br>";
        //测试弹窗
        $fail = "插入失败！";
        echo "<script language=\"JavaScript\">\r\n";
        echo "alert('{$fail}');\r\n"; 
        //通过引入JS，实现页面跳转。
        echo "location.replace(\"query.php\");\r\n";
        echo "</script>";
        //<meta http-equiv="refresh\\" content= "2;url= http://project1/input_case.php">;
        //header('Location: http://project1/input_case.php');
    }
 mysqli_close($con);
?>