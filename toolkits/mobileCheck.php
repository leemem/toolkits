<?php
require "../vender/Medoo/Medoo.php";

$mobileinfo = null;
$ispost = false;
$mobile = "";
if(!empty($_POST)){
	$ispost = true;
	$mobile = isset($_POST["mobile"])?$_POST["mobile"]:"";
	$database = new Medoo([
	    'database_type' => 'mysql',
	    'database_name' => 'mobilecore',
	    'server' => '192.168.0.5',
	    'username' => 'mobile',
	    'password' => 'mObile2017',
	    'charset' => 'utf8'
	]);

	$mobileinfo = $mobile_prefix = substr($mobile,0,7);
	$database->select("vest",[
		"mobile" => $mobile_prefix
	]);
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>手机号码归属地查询</title>
	</head>
	<body style="margin: 0px; overflow: hidden;">
		<div style="margin:0 auto;width:960px;">
			<div style="padding:300px;margin-bottom:30px;text-align:center;">
				<form action="/toolkits/mobileCheck.php" method="post">
					<span>请输入手机号码</span> <input name="mobile"/> <button type="submit">查询</button>					
				</form>
			</div>
			<div style="text-align:center;">
				<?php
					if($ispost && $mobile =="" ){
						echo '<font style="color:red;">请输入手机号码</font>';
					}

					if($mobileinfo){
						echo '<font style="color:green;">查询结果：</font><br />';
						print_r($mobileinfo);
					}
				?>
			</div>
		</div>
	</body>
</html>