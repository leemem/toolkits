
<!DOCTYPE html>
<html>
	<head>
		<title>日期计算器</title>
		<style type="text/css">
			input{
				width:50px;
			}

		</style>
		<script
		  src="https://code.jquery.com/jquery-3.2.1.js"
		  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
		  crossorigin="anonymous"></script>
		<script type="text/javascript">
			var hzWeek= new Array("日","一","二","三","四","五","六","日");function cweekday(wday){return hzWeek[wday];}

			function cala()
			{
			y=document.getElementById("SY").value;
			m=document.getElementById("SM").value;
			d=document.getElementById("SD").value;
			ddd=document.getElementById("decday").value;

			ttt=new Date(y,m-1,d).getTime()+ddd*24000*3600;

			theday=new Date();
			theday.setTime(ttt);

			document.getElementById("result1").innerHTML=theday.getFullYear()+"年"+(1+theday.getMonth())+"月"+theday.getDate()+"日"+"星期"+cweekday(theday.getDay());


			}


			function calb()
			{

			y2=document.getElementById("SY2").value;
			m2=document.getElementById("SM2").value;
			d2=document.getElementById("SD2").value;


			y3=document.getElementById("SY3").value;
			m3=document.getElementById("SM3").value;
			d3=document.getElementById("SD3").value;


			day2=new Date(y2,m2-1,d2);
			day3=new Date(y3,m3-1,d3);

			document.getElementById("result2").innerHTML=(day3-day2)/86400000;


			}
		</script>
	</head>
	<body style="margin: 0px; overflow: hidden;line-height:30px;padding-left:30px;">
		<h3>推算几天后的日期：</h3>
		<span>和</span> <input id="SY" value="<?php echo date("Y");?>"/> 年 <input id="SM" value="<?php echo date("m");?>"/> 月 <input id="SD" value="<?php echo date("d");?>"/> 日  （默认为今天） <br />
		<span>相差</span> <input id="decday" value="100" /> 天的日期 (输入负数则往前计算) <br />
		是： <span id="result1"></span><br />
		<button onclick="cala()">计算</button> <br /><br />
		<h3>计算日期差：</h3>
		<span style="display:inline-block;width:30px;"></span><input id="SY2" value="<?php echo date("Y");?>"/> 年 <input id="SM2"  value="<?php echo date("m");?>"/> 月 <input id="SD2"  value="<?php echo date("d");?>"/> 日  （默认为今天） <br />
		<span style="display:inline-block;width:30px;">到</span> <input id="SY3" value="<?php echo date("Y");?>"/> 年 <input id="SM3"  value="<?php echo date("m");?>"/> 月 <input id="SD3"  value="<?php echo date("d");?>"/> 日  （默认为今天） <br />
		相差: <span id="result2"></span> 天 <br />
		<button onclick="calb()">计算</button> <br /><br />
	</body>
</html>