<?php

// Deal with Error reporting

if (strpos($_SERVER['SERVER_NAME'],"cetis.ac.uk")!==FALSE){
	
	// WHEN RUNNING FROM A REAL WEBSERVER
	// Do not display errors etc
	
    error_reporting(E_ALL);
    ini_Set("display_errors",false); 
    $testmode=false;
    $db_test=false;

} else {

	// WHEN RUNNING LOCALLY
	error_reporting(E_ALL);
	ini_Set("display_errors",true); 
	$testmode=true; // Logs in as a fake user
	$db_test=true; // Displays extra databse messages
	
}

$env_libdir=dirname(__FILE__); // The lib directory of the site in which this file resides
set_include_path(get_include_path().PATH_SEPARATOR.$env_libdir); // add the directory to the include path

$env_basedir=substr($env_libdir,0,-3); // strip off the last three chars "lib" for the basedir
$env_subdir=substr($env_basedir,strlen($_SERVER['DOCUMENT_ROOT'])); // Determine the subdirectory from the docroot
$env_subdir=str_replace("\\","/",$env_subdir);
$env_subdir=trim($env_subdir,"/");

if ($env_subdir!=""){
	$env_subdir="/".$env_subdir;
}


//Determine the base url
//$env_baseurl='http'.(isset($_SERVER['HTTPS'])?$_SERVER['HTTPS']=='on'?'s':'':'');
$env_baseurl='http://'.$_SERVER['HTTP_HOST'];

//$env_baseurl="http://prod.cetis.ac.uk";

$env_fullself=$env_baseurl.rtrim($_SERVER["REQUEST_URI"],"/");
$env_scriptname=$env_baseurl.rtrim($_SERVER["SCRIPT_NAME"],"/");


// SMARTY ---------
require_once 'externals/smarty/Smarty.class.php';
$smarty=new smarty;

$smarty->plugins_dir=array('plugins',//thedefaultunderSMARTY_DIR
'smarty-plugins'
);

$smarty->template_dir=$env_basedir."templates";
$smarty->compile_dir=$env_basedir."templates_c";
$smarty->compile_check = true;
//$smarty->debugging = true;

$smarty->assign("env_basedir",$env_basedir);
$smarty->assign("env_subdir",$env_subdir);
$smarty->assign("env_baseurl",$env_baseurl);
//$smarty->assign("env_self",$env_self);
$smarty->assign("env_fullself",$env_fullself);
$smarty->assign("env_scriptname",$env_scriptname);
$smarty->assign("env_getrequest",$_GET);

// DATABASE -----------

require_once 'db.php';
$db=new db;



// OTHER CLASSES
require_once 'property.class.php';
require_once 'util.php';




?>
