<?php 
$userHTML=
'<!DOCTYPE html>
<html>
<head>
<title></title>
<style type="text/css">
*{margin:0;padding:0;}
body{
background:#ccc;
}
.wrapper{
padding:0px !important;
}
.contain{
border-radius:5px !important;
background:#fff !important;
overflow:hidden !important;
box-shadow:1px 1px 4px grey;
border:2px solid #263238 !important;
}
.imgWrap{
padding:10px !important;
height:80px !important;
text-align:center !important;
box-shadow:0 1px 1px #eee;
background:#263238 !important;
}
.msgBox{
padding:0 15px;
color:#777;
}
.msgBox p{
margin:10px 0;
}
footer div{
height:40px !important;
text-align:center !important;
box-shadow:0 -1px 1px #eee;
padding:10px !important;
background:#263238 !important;
}
.msgBox a{
text-decoration:none !important;
}

.esocial a img{
height:100% !important;
border-radius:7px !important;
margin:0 5px !important;
}
.copyr{color:white !important;
padding:5px !important;
background:#263238 !important;
text-align:center !important;
}

.b1{font-size:2em !important;}
.b2{font-size:1.5em !important;}
.b3{font-size:1em !important;}
</style>
</head>
<body>
<div class="wrapper" >
	<div class="contain" >
		<div class="imgWrap" >
			<img height="100%" src="https://myanshu.com/img/ama-logo-30.png" alt="Logo" >
		</div>
		<div class="msgBox" >
		<br>
			 <p class="b2" >Hi '.$name.'!</p>
			 <p class="b3" >Thank you for getting in touch! <br>I got your message.</p>
			 <p class="b3">Your details are:<br> Mobile no.: '.$mob.' <br>Email : '.$email.'<br>Sub: '.$sub.'<br>Message: '.$msg.'</p>
			 <p class="b3" >One of our colleagues will get back to you shortly.</p>
			 <p>For instant help you can use our live chat service on my website <a href="https://anshumemorial.in" >anshumemorial.in</a>.
			 <p>Have a great day!</p>
			 <p>Best regard <br>Anshu Memorial Academy</p>
		</div>
		<footer>
			<div class="esocial"  >
				<a href="https://fb.com/AnshuMemorialAcademy" >FB</a>
				<a href="https://twitter.com/AnshuMemorial" >twitter</a>
				<a href="https://api.whatsapp.com/send?phone=919973757920" >WA</a>
				<a href="https://m.me/AnshuMemorialAcademy" >messenger</a>
				<a href="tel:9128289100" >Call</a>
				</div>
				
				<p class="copyr" >© Anshu Memorial Academy Edu. Group.</p>
			
		</footer>
	</div>
</div>
</body>
</html>
';









// Compose a simple HTML email message
	$adminHTML = '<!DOCTYPE html>
	<html>
	<head>
	<title>User Message</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
	<style type="text/css">
	*{
	margin:0;
	padding:0;
	}
	.box{
	min-width:350px;
	max-width:600px;
	margin:5vh auto;
	}
	table{
	border:1px solid grey;
	border-radius:5px;
	margin:5px;
	padding:10px;
	box-shadow: 0 1px 5px grey, 0 2px 10px grey, 0 5px 20px grey;
	z-index:5;
	}
	table tr:nth-child(odd){
	background:#f5f5f5;
	}
	td, th{
	text-align:left;
	padding:5px 2px;
	border-collapse:1px solid #efefef;
	}
	</style>
	</head>
	<body>
	<div class="box" >
	<table>
	<tr>
	<th style="text-align:center" colspan="3" >Details:</th>
	</tr>
	<tr>
	<th>Name</th><td><b>: </b>'.$name.'</td>
	</tr>
	<tr>
	<th>Email</th><td><b>: </b>'.$mob.'</td>
	</tr>
	<tr>
	<th>Subject</th><td><b>: </b>'.$email.'</td>
	</tr>
	<tr>
	<th>Subject</th><td><b>: </b>'.$sub.'</td>
	</tr>
	<tr>
	<th>message</th><td><b>: </b>'.$msg.'</td>
	</tr>
	</table>
	</div>
	</body>
	</html>';