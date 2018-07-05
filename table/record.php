<?php
 require('function.php');
?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="dreamweb/sw-table/table/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="dreamweb/sw-table/table/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="dreamweb/sw-table/table/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="dreamweb/sw-table/table/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="dreamweb/sw-table/table/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>Website for Software Engineering(Beta Version)</title>
</head>
<body>
<!-- <nav class="breadcrumb"></nav> -->
<div class="page-container">
	<div class="text-c"> 
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l">
	  <table height="649" class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="125" height="48" bgcolor="#F5FAFE">患者姓名</th>
				<th width="360" bgcolor="#FFFFFF"><?php echo QuerySQL('Patient_Name', $_GET['id']); ?></th>
				<th width="125" bgcolor="#F5FAFE">患者性别</th>
				<th width="307"><?php echo QuerySQL("Patient_Male", $_GET['id']); ?></th>
			</tr>
		</thead>
		<tbody>
			<tr class="text-c">
			  <th height="37" bgcolor="#F5FAFE"><strong>年龄</strong></th>
			  <th><?php echo QuerySQL("Patient_Age", $_GET['id']); ?></th>
			  <th bgcolor="#F5FAFE"><strong>账号</strong></th>
			  <th><?php echo QuerySQL("User_Name", $_GET['id']); ?></th>
		  </tr>
			<tr class="text-c">
				<th height="37" bgcolor="#F5FAFE"><strong>体重</strong></th>
				<th><?php echo QuerySQL("Patient_Weight", $_GET['id'])."Kg"; ?></th>
				<th bgcolor="#F5FAFE"><strong>身高</strong></th>
				<th><?php echo QuerySQL("Patient_Height", $_GET['id'])."cm"; ?></th>
			</tr>
			<tr class="text-c">
			  <th height="37" colspan="2" bgcolor="#F5FAFE"><strong>病例录入时间</strong></th>
			  <th colspan="2" bgcolor="#FFFFFF"><?php echo QuerySQL("Sign_in_time", $_GET['id']); ?></th>
		  </tr>
			<tr class="text-c">
			  <th height="37" colspan="2" bgcolor="#F5FAFE"><strong>所得疾病</strong></th>
			  <th colspan="2" bgcolor="#FFFFFF"><?php echo QuerySQL("Disease_Name", $_GET['id']); ?></th>
		  </tr>
			<tr class="text-c">
			  <th height="37" colspan="4" bgcolor="#F5FAFE"><strong class="seven"> 病症描述</strong></th>
		  </tr>
			<tr class="text-c">
			  <th height="111" colspan="4" bgcolor="#FFFFFF"><?php echo QuerySQL("Discribe", $_GET['id']); ?></th>
		  </tr>
			<tr class="text-c">
			  <th height="37" colspan="4" bgcolor="#F5FAFE"><strong>解决方案</strong></th>
		  </tr>
			<tr class="text-c">
			  <th height="111" colspan="4" bgcolor="#FFFFFF"><?php echo QuerySQL("Solution", $_GET['id']); ?></th>
		  </tr>
			<tr class="text-c">
			  <th height="44" colspan="2" bgcolor="#F5FAFE"><strong>管理医生</strong></th>
			  <th height="44" colspan="2" bgcolor="#FFFFFF"><?php echo QuerySQL("Doctor_ID", $_GET['id']); ?></th>
		  </tr>
		</tbody>
	</table>
</div>
</body>
</html>