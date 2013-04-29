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
$sessions=$propman->get_distinct("session_id");
$nodes[] = $sessions;
$nodes[]= $propman->get_distinct("data");


foreach ($sessions as $session){
	$sessionresults[$session['session_id']]=$propman->get_sessionresults($session['session_id']);
}
print printGraphSpringy($nodes, $sessionresults);
