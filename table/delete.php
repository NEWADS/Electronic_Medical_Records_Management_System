<?php 
 require('function.php');
 $id = $_GET['id'];
?>
<!DOCTYPE HTML>
<html>
<body>
<script language="JavaScript">
var sure=confirm( "确定删除？");    
if(1==sure)
{
    <?php 
     $res = deletePatient($id);
     if ($res == 1)
     {
        echo "alert('删除确认');\n";
        echo "location.replace(\"query.php\");\n";
     }
     else
     {
        echo "alert('删除失败');\n";
        echo "location.replace(\"query.php\");\r\n";
     }   
     ?>
}
else 
{
    alert('未删除');
    location.replace("query.php");
}
</script>
</body>
</html>
 <!-- echo "<script language=\"JavaScript\">\n"; 
 echo "if(confirm('确定删除？'))\n";
 echo "{ '$res = deletePatient($id)';\n";
 if ($res == 1)
 {
    echo "alert('删除确认'); }\n";
 }
 else 
 {
    echo "alert('删除失败'); }\n";
 }
 echo "else \n";
 echo "alert('未删除');\n";
 echo "</script>"; -->