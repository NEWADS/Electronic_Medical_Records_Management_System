<?php 
 require('function.php');
 $id = $_GET['id'];
 $res = deletePatient($id);
 echo "<script language=\"JavaScript\">\n";
 if ($res == 1)
 {
    echo "alert('删除确认');\n";
    echo "location.replace(\"query.php\");\n";
 }
 else 
 {
    echo "alert('删除失败');\n";
    echo "location.replace(\"query.php\");\n";
 }
 echo "</script>";
?>