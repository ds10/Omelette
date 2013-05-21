<?php

// class loader
require_once 'lib/init.php';

$mode="html";
// This file takes inputs at  URL based requests

if (isset($_SERVER["PATH_INFO"])) {

	// Requests using a URI
	$pathinfo=$_SERVER["PATH_INFO"];
	$patharr=explode("/",$pathinfo);
	

	//This takes the first input after set and splits it between a dot. After the dot can be an ID
	//eg set/500.1/somethings is the property '500' for instance 1
	if (isset($patharr[1]) and $patharr[1]<>""){
		$explode=explode(".",$patharr[1]);
		print_r($explode);
		
		$widget=$explode[0];
		$session=$explode[1];

	}

	//this a thing to set 
	if (isset($patharr[2])){

		$input=$patharr[2];
		/* DONT THINK TOO META
		if ($patharr[3])
			$data=$patharr[3];
			*/
	}

	print $input;
	
	//this is a third, ya'know. Just incase
	//fuck it, this is being left out
	/*
	$pathtype=explode(".",$patharr[1]);
	if ($pathtype[1]){
		$extra=$pathtype[1];
	}
	*/

}
$properties=new property_manager();


if ($properties->getby_session($session,$widget)){
	$propobj=$properties->getby_session($session,$widget);
	$propobj->widget=$widget;
	$propobj->session_id=$session;
	$propobj->data=$input;
	
	
	
	$propobj->savetodb();
	
}else{
	$propobj=new property(null);
	$propobj->widget=$widget;
	$propobj->session_id=$session;
	$propobj->data=$input;
	$propobj->savetodb();
}

print_r($propobj);

// Standard get-post requests
if (isset($_REQUEST['something'])){
	
	//do something
}



if (isset($_REQUEST['action']) AND $_REQUEST['action']=="something"){

	//do something ajaxy

}

//complete list for tags
if (isset($_REQUEST['action']) AND $_REQUEST['action']=="somethingelse"){

	//another placeholder for ajax stuff

}


switch ($mode){
	

	case "example":

		//depends on what we are setting

		break;
	default:

		// Display a plain old webpage...
		
		/*
		$smarty->display("headers.tpl");
		$smarty->display("set.tpl");
		$smarty->display("footers.tpl");
		*/
		break;
}