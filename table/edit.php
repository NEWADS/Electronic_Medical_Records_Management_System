<?php
 session_start();
 function QuerySQL($Dname)
 {
	 $con = mysqli_connect("localhost","root","","doctor_for_test_se");
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
	 $result_doc = mysqli_query($con, "SELECT Doctor_ID, Doctor_Name FROM doctor_a");
	 $doc = mysqli_fetch_all($result_doc);
	 while($row = mysqli_fetch_assoc($result_patient))
	 {
		if ($row["Patient_Male"]== 'M' )
		{
			$row["Patient_Male"] = '男';
		}
		else
		{
			$row["Patient_Male"] = '女';
		}
		if ($row["User_Name"] == $_GET["id"])
		{
			return $row[$Dname];
			break;
		}
	 }
 }

?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/favicon.ico" >
<link rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<!--/meta 作为公共模版分离出去-->

<title>Website for Software Engineering(Beta Version)</title>
<style type="text/css">
/* body{background:url(pic.png);} */
</style>
</head>
<body>
<article class="page-container">
	<form action="<?php echo 'update.php?id='.$_GET["id"]; ?>" method="post" class="form form-horizontal" id="form-member-add">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span><span class="star-4">患者姓名：</span></label>
			<div class="formControls col-xs-8 col-sm-6">
				<input type="text" class="input-text" value="<?php echo QuerySQL("Patient_Name"); ?>" placeholder="" id="patientname" name="Patient_Name">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>性别：</label>
			<div class="formControls col-xs-8 col-sm-6 skin-minimal">
				<div class="radio-box">
					<input name="Patient_Male" type="radio" id="sex-1" value="M" checked>
					<label for="sex-1"><span class="star-4">男</span></label>
				</div>
				<div class="radio-box">
					<input type="radio" id="sex-2" name="Patient_Male" value="W">
					<label for="sex-2"><span class="star-4">女</span></label>
				</div>
			</div>
		</div>
        <div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>患者年龄：</label>
		  <div class="formControls col-xs-8 col-sm-6">
				<input type="text" class="input-text" value="<?php echo QuerySQL("Patient_Age"); ?>" placeholder="" name="Patient_Age" id="age">
			</div>
		</div>
        <div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>患者身高（单位：cm）：</label>
		  <div class="formControls col-xs-8 col-sm-6">
				<input type="text" class="input-text" value="<?php echo QuerySQL("Patient_Height"); ?>" placeholder="" name="Patient_Height" id="hight">
			</div>
		</div>
        <div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>患者体重（单位：Kg）：</label>
		  <div class="formControls col-xs-8 col-sm-6">
				<input type="text" class="input-text" value="<?php echo QuerySQL("Patient_Weight"); ?>" placeholder="" name="Patient_Weight" id="wight">
			</div>
		</div>
		<!-- <div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>手机：</label>
			<div class="formControls col-xs-8 col-sm-6">
				<input type="text" class="input-text" value="" placeholder="" id="mobile" name="mobile">
			</div>
		</div> -->
		        <div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>录入时间：</label>
			<div class="formControls col-xs-8 col-sm-6">
				<input type="text" class="input-text" value="<?php echo QuerySQL("Sign_in_time"); ?>" placeholder="年-月-日" name="Sign_in_time" id="indate">
			</div>
		</div>

	  <!-- <div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">附件：</label>
			<div class="formControls col-xs-8 col-sm-6"> <span class="btn-upload form-group">
				<input class="input-text upload-url" type="text" name="uploadfile" id="uploadfile" readonly nullmsg="请添加附件！" style="width:200px">
				<a href="javascript:void();" class="btn btn-primary radius upload-btn"><i class="Hui-iconfont">&#xe642;</i> 浏览文件</a>
				<input type="file" multiple name="file-2" class="input-file">
				</span> </div>
		</div> -->
		<!-- <div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">所在城市：</label>
			<div class="formControls col-xs-8 col-sm-6"> <span class="select-box">
				<select class="select" size="1" name="city">
					<option value="" selected>请选择城市</option>
					<option value="1">北京</option>
					<option value="2">上海</option>
					<option value="3">广州</option>
                    <option value="4">沈阳</option>
				</select>
				</span> </div>
		</div> -->
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">所得疾病：</label>
			<div class="formControls col-xs-8 col-sm-6">
				<textarea name="Disease_Name" cols="" rows="" class="textarea" defaultvalue="" onKeyUp="$.Huitextarealength(this,100)"><?php echo QuerySQL("Disease_Name"); ?></textarea>
				<p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
			</div>
		</div>
        <div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">病症描述：</label>
		  <div class="formControls col-xs-8 col-sm-6">
				<textarea name="Discribe" cols="" rows="" class="textarea" value="" placeholder="" onKeyUp="$.Huitextarealength(this,100)"><?php echo QuerySQL("Discribe"); ?></textarea>
				<p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
			</div>
		</div>
        <div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">处理方案：</label>
		  <div class="formControls col-xs-8 col-sm-6">
				<textarea name="Solution" cols="" rows="" class="textarea" value="" placeholder="" onKeyUp="$.Huitextarealength(this,100)"><?php echo QuerySQL("Solution"); ?></textarea>
				<p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
			</div>
		</div>
	</form>
</article>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本--> 
<script type="text/javascript" src="lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	$("#form-member-add").validate({
		rules:{
			username:{
				required:true,
				minlength:2,
				maxlength:16
			},
			sex:{
				required:true,
			},
			mobile:{
				required:true,
				isMobile:true,
			},
			email:{
				required:true,
				email:true,
			},
			uploadfile:{
				required:true,
			},
			
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			//$(form).ajaxSubmit();
			var index = parent.layer.getFrameIndex(window.name);
			//parent.$('.btn-refresh').click();
			parent.layer.close(index);
		}
	});
});
</script> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>