<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8"> 
<title>Website for Software Engineering(Alpha Version)</title> 
</head>
<body>

<?php
 //启动全局变量。
 session_start();
 echo "<br>Website for Software Engineering(Alpha Version)";
 echo "<br>";
 echo "Connecting MySQL...";
 echo "<br>";
 //连接数据库。
 $con = mysqli_connect("localhost","root","","doctor_for_test_se");
 //判断是否连接成功。
 if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }

 else
  {
      echo "Connected to MySQL!";
      echo "<br>";
  }
 //设定检索数据库的编码方式为UTF-8。
 mysqli_query($con,'set names utf8');
 //把病人表中的病人姓名，医生ID赋值给result_patient
 $result_patient = mysqli_query($con,"SELECT Patient_Name,Doctor_ID FROM patient_test");
 //把医生表中的医生姓名，医生ID赋值给result_doc
 $result_doc = mysqli_query($con, "SELECT Doctor_ID, Doctor_Name FROM doctor_a");
 //将得到的信息赋值给doc变量，保存为高维数组。
 $doc = mysqli_fetch_all($result_doc);
 //按行检索病人表中的信息。
 while($row = mysqli_fetch_assoc($result_patient))
  {
  // print $row['Patient_Name'] . " " . $row['Doctor_ID'];
  // print "Doctor ID: ".$row["Doctor_ID"];
  // print "<br />";
  //通过遍历高维数组以检索并显示医生ID对应的医生姓名。
  foreach ($doc as $value)
  {
    //此页面仅显示对应医生管理的病人姓名。
    if ($row["Doctor_ID"] == $value[0] && $row["Doctor_ID"] == $_SESSION['id'])
    {
      print "患者姓名: ".$row["Patient_Name"]."<br />";
      print "所属医生: ". $value[1]. "<br />";
    }
  }
  }
 //关闭数据库连接。
 mysqli_close($con);
 //print "Connection closed!";
?>

</body>
</html>