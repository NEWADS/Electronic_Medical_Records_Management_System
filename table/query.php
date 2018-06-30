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
	<i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 用户中心 <span class="c-gray en">&gt;</span> 患者管理 <a class="btn btn-success radius r" style="margin-top:5px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a><button class="button" style="vertical-align:middle"onclick="javascrtpt:window.location.href='file:///D:/Dreamweaver12.0/DWproject/software/table/index.html'"><span>注销 </span></button></nav>
<div class="page-container">
	<div class="text-c"> 
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a href="javascript:;" onclick="member_add('添加用户','index.html','','510')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加用户</a>
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
			<!-- <tr class="text-c">
				<td><input type="checkbox" value="1" name=""></td>
				<td>1</td>
				<td><u style="cursor:pointer" class="text-primary" onclick="member_show('张三','member-show.html','10001','360','400')">张三</u></td>
				<td>男</td>
				<td>13000000000</td>
				<td>2018-6-11 11:11:11</td>
				<td class="td-status"><span class="label label-success radius">已启用</span></td>
				<td class="td-manage">
                <a style="text-decoration:none" onClick="member_stop(this,'10001')" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a> 
                <a title="编辑" href="javascript:;" onclick="member_edit('编辑','member-add.html','4','','510')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
                <a title="删除" href="javascript:;" onclick="member_del(this,'1')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
			</tr> -->
			<?php
			 session_start();
			 $con = mysqli_connect("localhost","root","","doctor_for_test_se");
			 if (!$con)
			  {
				die('Could not connect: ' . mysqli_error());
			  }
			 mysqli_query($con,'set names utf8');
			 $result_patient = mysqli_query($con,"SELECT Patient_Name,Patient_Age,Patient_Height,Patient_Weight,Patient_Male,User_Name,Sign_in_time,Doctor_ID FROM patient_test");
			 $result_doc = mysqli_query($con, "SELECT Doctor_ID, Doctor_Name FROM doctor_a");
			 $doc = mysqli_fetch_all($result_doc);
			 while($row = mysqli_fetch_assoc($result_patient))
			 {
				if ($row["Patient_Male"]== 'M' )
				{
					$male = '男';
				}
				else
				{
					$male = '女';
				}
				foreach ($doc as $value)
				{
					if ($row["Doctor_ID"] == $value[0] && $row["Doctor_ID"] == $_SESSION['id'])
					{
						echo '<tr class="text-c">';
						echo '<td><input type="checkbox" value="1" name=""></td>';
						echo '<td>'.$row["User_Name"].'</td>';
						echo '<td><u style="cursor:pointer" class="text-primary" onclick="member_show(\' \' ,\'record.php?id='.$row["User_Name"].'\')">'.$row["Patient_Name"].'</u></td>';
						echo '<td>'.$male.'</td>';
						echo '<td>'.$row["Patient_Age"].'</td>';
						echo '<td>'.$row["Patient_Height"].'(Kg)</td>';
						echo '<td>'.$row["Patient_Weight"].'(cm)</td>';
						echo '<td>'.$row["Sign_in_time"].'</td>';
						echo '<td class="td-manage">';
						echo '<a title="编辑" href="javascript:;" onclick="member_edit(\'编辑\',\'member-add.html\',\'4\',\'\',\'510\')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>';
						echo '<a title="删除" href="javascript:;" onclick="member_del(this,\'1\')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>';
						echo '</tr>';
					}
				}

			 }
			 mysqli_close($con);
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
/*用户-添加*/
function member_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*用户-查看*/
function member_show(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*用户-停用*/
function member_stop(obj,id){
	layer.confirm('确认要停用吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '',
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_start(this,id)" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1;</i></a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已停用</span>');
				$(obj).remove();
				layer.msg('已停用!',{icon: 5,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});		
	});
}

/*用户-启用*/
function member_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '',
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_stop(this,id)" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
				$(obj).remove();
				layer.msg('已启用!',{icon: 6,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});
	});
}
/*用户-编辑*/
function member_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*密码-修改*/
function change_password(title,url,id,w,h){
	layer_show(title,url,w,h);	
}
/*用户-删除*/
function member_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '',
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});		
	});
}
</script> 
</body>
</html>