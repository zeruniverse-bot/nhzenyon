<?php
function echofooter()
{
	echo '<footer class="footer ">
      <p>&copy; 宁海翔宇文教用品有限公司<br /><br />为保障您的账户安全，请在使用完成后<a href="./logout.php">注销</a></p>
</footer>
</body>
</html>';
}
function echoheader($active)
{
	$html='<!DOCTYPE html>
<html lang="zh-cn">
<head>
  <meta charset="utf-8">
  <title>宁海翔宇文教用品有限公司</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="宁海翔宇文教用品有限公司">
  <meta name="author" content="">
	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>

  <![endif]-->

  <!-- Fav and touch icons -->
  <link rel="shortcut icon" href="img/favicon.ico">
  
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
    <script type="text/javascript">if (typeof(Worker) == "undefined") {window.location.href="sorry-for-old.html"}</script>
<style>
.nodeco
{text-decoration:none; color:#666666;}
.nodeco:hover,active,link,visited
{text-decoration:none; color:#666666;}
</style>
</head>

<body style="color:#666666">
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
              <div class="container">
				<div class="navbar-header">
					 <button type="button" class="navbar-toggle"  data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" style="padding-top:3px;padding-bottom:3px;padding-right:55px" href="./"><img height="43px" src="img/logo.png" /></a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1 min-width:600px;">
					<ul class="nav navbar-nav">
						<li';if ($active==1){$html=$html.' class="active"';}
			
						$html=$html.'>
							<a href="./">首页</a>
						</li>
						<li';if ($active==2){$html=$html.' class="active"';}
			
						$html=$html.'>
							<a href="./cusinfo.php">客户信息</a>
						</li>
						<li';if ($active==3){$html=$html.' class="active"';}
			
						$html=$html.'>
							<a href="./kuaidi.php">物流查询</a>
						</li><li';if ($active==5){$html=$html.' class="active"';}
			
						$html=$html.'>
							<a href="./cusfin.php">对账单</a>
						</li>';
                        $html=$html.'<li';
						if ($active==10){$html=$html.' class="active"';}
			
						$html=$html.'>
							<a href="./pdflist.php">PDF文件队列</a>
						</li>';
                $html=$html.'</ul><ul class="nav navbar-nav navbar-right">
        <li><a href="./logout.php">注销</a></li>
        </ul>
				</div>
			  </div>	
</nav>';
echo $html;
}?>