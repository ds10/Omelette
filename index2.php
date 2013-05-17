<?php

require_once "lib/init.php";
//lets do some path based requests:
// Requires path-info and multiviews turned on...

//timestamps of files for ajax
$smarty->assign("forceTime",(int)filemtime('force.csv'));
//$smarty->assign("forceTimeJson", json_encode(array('ts' => filemtime('force.csv'))));

if (isset($_SERVER['PATH_INFO'])){
	$pathinfo =$_SERVER['PATH_INFO'];
	$pathinfo=trim($pathinfo,'\,/');
	$pi=explode("/",$pathinfo);

} elseif (isset($_SERVER['REQUEST_URI'])){

	$requestURI =$_SERVER['REQUEST_URI'];
	$requestURI=trim($requestURI,'\,/');
	$a = explode ("?",$requestURI);
	$pi = explode("/",$a[0]);
}


$propman = new property_manager();

//$smarty->display("headers.tpl");
//$smarty->display("index.tpl");
//$smarty->display("footers.tpl");
//$smarty->display("d3.tpl");

$smarty->display("sky_headers.tpl");
$smarty->display("sky_nav.tpl");
$smarty->display("sky_index.tpl");
$smarty->display("sky_footers.tpl");