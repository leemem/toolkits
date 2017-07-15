<?php 
require "../../vender/phpqrcode/qrlib.php";
$hasfile = false;
if(!empty($_POST)){
	$content = isset($_POST["content"])?$_POST["content"]:"";
	$filename = md5($content).".png";
	$fullfilename = dirname(__FILE__) . "/output/" . $filename;
	QRcode::png($content, $fullfilename);
	if(is_file($fullfilename)){
		$hasfile = true;
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>在线生成二维码</title>
		<style type="text/css">
			.container{
				width:960px;
				margin: 0 auto;
			}
		</style>
	</head>
	<body style="margin: 0px; overflow: hidden;">
		<div class="container">
			<form action="/toolkits/qrcode/qrcodeGenerate.php" method="post">
				<div>提交你要转换为二维码的内容</div>
				<textarea style="width:100%;height:100px;" name="content"></textarea> <br /> <br />
				<button type="submit">提交</button>
			</form>

			<?php
				if($hasfile){
			?>
			<div style="color:green;">二维码生成成功，二维码生成如下：</div> <br />
			<div>
				<img src="/toolkits/qrcode/output/<?php echo $filename;?>" />
			</div>
			<?php
				}
			?>
		</div>
	</body>
</html>
