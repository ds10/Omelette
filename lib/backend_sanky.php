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
ini_Set("display_errors",false);


$propman = new property_manager();
//1. Graph
//2. BUBBLES
$data=$propman->get_distinct("data");

$people=$propman->get_distinct("session_id");

foreach ($people as $person){
	foreach($propman->get_answers($person['session_id'],"time") as $answers){
		$results[$person['session_id']][]=$answers['data'];
	}
	//$result[$person['session_id']]=$propman->get_answers($person['session_id'],"time");
}

print createSankyJSON($data,$results);

//$smarty->display("d3_backend_circle.tpl");

