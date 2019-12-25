<?php
require_once("sqllink.php");
function isPasswordOK($username,$password)
{
	if($password=="") return -1;
    if($username=="") return -2;
	$link=sqllink();
	if(!$link) return -1; 
	$sql="SELECT * FROM `customer` WHERE `loginname`=? AND `loginname`!=''";
    $res=sqlexec($sql,array($username),$link);
    if(!$res) return -1;
    $row=$res->fetch(PDO::FETCH_ASSOC);
	if($row==FALSE) return -2;
	if((int)$row['passerrortime']>=3) return -9;
	if((string)$password!=(string)$row['loginpassword']) {
	    $sql="UPDATE `customer` SET `passerrortime`=`passerrortime`+1 WHERE `index`=?";
    	$res=sqlexec($sql,array($row['index']),$link);
	    return -2;
	}
	$sql="UPDATE `customer` SET `passerrortime`=0 WHERE `index`=?";
    $res=sqlexec($sql,array($row['index']),$link);	
	return($row['index']);
}
?>