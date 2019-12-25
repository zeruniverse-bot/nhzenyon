<?php
require_once("checkpw.php");
function isLogin()
{
	session_start();
	if(!isset($_SESSION['pw'])||!isset($_SESSION['user'])||!isset($_SESSION['index'])) return false;
	$r=isPasswordOK($_SESSION['user'],$_SESSION['pw']);
	if($r<0 ||$r!=$_SESSION['index']) {unset($_SESSION['pw']);unset($_SESSION['user']);unset($_SESSION['index']); return false;}
	return true;
}?>