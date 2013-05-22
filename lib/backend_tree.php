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
//2. BUBBLES
$widgets=$propman->get_distinct("widget");
foreach ($widgets as $widget){
	$widgetresults[$widget['widget']]=$propman->get_widgetresults($widget['widget']);
}


print treeJson($widgetresults);

//$smarty->display("d3_backend_circle.tpl");

