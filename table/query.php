<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="stylesheet" type="text/css" href="static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="static/h-ui.admin/css/style.css" />
<title>Website for Software Engineering(Beta Version)</title>
</head>
<body>
<nav class="breadcrumb">
	<i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 用户中心 <span class="c-gray en">&gt;</span> 患者管理 <a class="btn btn-success radius r" style="margin-top:5px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a><button class="button" style="vertical-align:middle" onclick="javascrtpt:window.location.href='../abort.php'"><span>注销 </span></button></nav>
<div class="page-container">
	<div class="text-c"> 
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a onclick="javascrtpt:window.location.href='member-add.html'" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加用户</a></div>
	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="50"><input type="checkbox" name="" value=""></th>
				<th width="250">患者用户名</th>
				<th width="250">患者名称</th>
				<th width="100">患者性别</th>
				<th width="100">患者年龄</th>
				<th width="100">患者身高</th>
				<th width="100">患者体重</th>
				<th width="300">病历录入时间</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
			<?php
			 require("function.php");
			 $result_patient = mysqli_query($con,"SELECT User_Name, Doctor_ID FROM patient_test");
			 while($row = mysqli_fetch_assoc($result_patient))
			 {

					if ($row["Doctor_ID"] == $_SESSION['id'])
					{
						echo '<tr class="text-c">';
						echo '<td><input type="checkbox" value="1" name=""></td>';
						echo '<td>'.$row["User_Name"].'</td>';
						echo '<td><u style="cursor:pointer" class="text-primary" onclick="member_show(\' \' ,\'record.php?id='.$row["User_Name"].'\')">'.QuerySQL('Patient_Name', $row["User_Name"]).'</u></td>';
						echo '<td>'.QuerySQL("Patient_Male", $row["User_Name"]).'</td>';
						echo '<td>'.QuerySQL("Patient_Age", $row["User_Name"]).'</td>';
						echo '<td>'.QuerySQL("Patient_Height", $row["User_Name"]).'(cm)</td>';
						echo '<td>'.QuerySQL("Patient_Weight", $row["User_Name"]).'(Kg)</td>';
						echo '<td>'.QuerySQL("Sign_in_time", $row["User_Name"]).'</td>';
						echo '<td class="td-manage">';
						echo '<a title="编辑" href="javascript:;" onclick="javascript:window.location.href=\'edit.php?id='.$row["User_Name"].'\'" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>';
						?> <a title='删除' onclick="del('<?php echo $row["User_Name"]; ?>')" class='ml-5' style='text-decoration:none'><i class='Hui-iconfont'>&#xe6e2;</i></a></td>
						<?php echo '</tr>';
					}
			}

			?>
		</tbody>
	</table>
    
	</div>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
$(function(){
	$('.table-sort').dataTable({
		"aaSorting": [[ 1, "desc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[0,8]}// 制定列不参与排序
		]
	});
	
});

// /*用户-添加*/
// function member_add(title,url,w,h){
// 	layer_show(title,url,w,h);
// }
/*用户-查看*/
function member_show(title,url,id,w,h){
	layer_show(title,url,w,h);
}
</script>
<script language="JavaScript">
function del(name)
{
	var sure=confirm("确定删除？");    
	if( 1 == sure )
	{
		window.location.href= "delete.php?id="+ name; 
		//echo "location.replace(\"delete.php?id='$row[User_Name]'\")" ?>
    }
	else 
	{
    	alert('未删除');
	}
}
</script> 
</body>
</html>