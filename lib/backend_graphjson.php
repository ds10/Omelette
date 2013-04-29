<?php
require_once "init.php";
//lets do some path based requests:

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
//1. Graph
$sessions=$propman->get_distinct("session_id");
foreach ($sessions as $session){
	$sessionresults[$session['session_id']]=$propman->get_sessionresults($session['session_id']);
}


$string = "source,target,value";
$string .= "\n";

foreach ($sessionresults as $session => $dataArray){
	foreach ($dataArray as $data){
		$string .= $session . "," . $data['data'] . ",1";
		$string .= "\n";
			
	}

}


print $string;
