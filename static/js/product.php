<?php
if($_GET['type']=='') $ptype='all';
$ptype=addslashes($_GET['type']);
if($ptype!='XY88'&&$ptype!='XY89') $ptype='all';
if($_GET['pid']=='') $page=1; else $page=intval($_GET['pid']);
require_once("./function/sqllink.php");
$link=sqllink();
if($link==NULL) header("Location: ./err.html");
//Get the num of all record
$rs=($ptype=='all')?mysql_query("select count(*) from product",$link):mysql_query("select count(*) from product where type='$ptype'",$link);
$myrow = mysql_fetch_array($rs);
$numrows=$myrow[0];
//page size;
$pagesize=5;
$pages=intval($numrows/$pagesize);
if ($numrows%$pagesize) $pages++;
$offset=$pagesize*($page - 1);
if($page>$pages)header("Location: ./404.html");//  
$sql=($ptype=='all')?"select * from product order by id ASC limit $offset,$pagesize":"select * from product  where type='$ptype' order by id ASC limit $offset,$pagesize";
$rs=mysql_query($sql,$link);
?>
<!DOCTYPE html>
<!--[if IE 9]> <html lang="zh-cn" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="zh-cn">
<!--<![endif]-->
  <head>
    <meta charset="utf-8">
	<meta http-equiv="Cache-Control" content="no-transform" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Favicon -->
		<link rel="shortcut icon" href="images/favicon.ico">

    <meta name="Keywords" content="宁海翔宇, 文教用品, 翔宇, 宁海翔宇文教用品有限公司, 卷笔刀"/>
<meta name="Description" content="宁海翔宇文教用品有限公司"/>
<title>宁海翔宇文教用品有限公司产品数据库</title>

    <!-- Bootstrap core CSS -->
    <script type="text/javascript" src="plugins/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/pagination.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- Bootstrap core CSS -->
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
  </head>

  <body>

    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">导航</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">ZenYon Product</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li <?php if ($ptype=='all') echo 'class="active"'?>><a href="./database.php">全部产品 (All)</a></li>
            <li <?php if ($ptype=='XY88') echo 'class="active"'?>><a href="./database.php?type=XY88">XY88</a></li>
            <li <?php if ($ptype=='XY89') echo 'class="active"'?>><a href="./database.php?type=XY89">XY89</a></li>		
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    <div class="container" style="margin-top:50px;">

      <!-- Main jumbotron for a primary marketing message or call to action -->
	

<!-- START THE FEATURETTES -->
	<div class="row featurette">
        <div class="col-md-5">
          <h2 class="featurette-heading"><?php $k=($ptype=='all')?'产品列表 (Product List)':$ptype.'系列 ('.$ptype.' Series)'; echo $k;?></h2>
		  <p class="lead"> <span class="text-muted"></span></p>
        </div>
        <div class="col-md-7">
        </div>
     </div>
     <hr class="featurette-divider">
<?php
while ($myrow = mysql_fetch_array($rs))
{
	echo '<div class="row featurette"><div class="col-md-5"><h2 class="featurette-heading">'.$myrow['name'].'</h2><p class="lead"><span class="text-muted">'.$myrow['intro'].'</span></p></div><div class="col-md-7"><img class="featurette-image img-responsive" src="./image/'.$myrow['img'].'" alt="'.$myrow['name'].'样品图片(仅供参考，以实际产品为准)"></div></div><hr class="featurette-divider">';
}
?>
      <!-- /END THE FEATURETTES -->
	<div class="row featurette">
		 
         <div style="float:right"><ul id="pagination-demo"class="pagination-sm"></ul></div>
       
      </div>
     <div class="footer">
        <p>&copy; 宁海翔宇文教用品有限公司 2014.<br /> <a href="http://www.miitbeian.gov.cn/">浙ICP备14004474号-1</a></p>
      </div>

    </div> <!-- /container -->
<script type="text/javascript">
$('#pagination-demo').twbsPagination({
        totalPages: <?php echo $pages;?>,
        visiblePages: 9,
		startPage: <?php echo $page;?>,
		first: '<<',
		last: '>>',
		prev: '<',
		next: '>',
        onPageClick: function (event, page) {
            window.location.href="./database.php?type=<?php echo $ptype;?>&pid="+page;
        }
    });
</script>
  </body>
  <script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?8b1f11564a65683697e3aa352d0a1e84";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>

</html>
