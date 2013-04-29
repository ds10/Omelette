<?php
/*
*Smartyplugin
*-------------------------------------------------------------
*File:function.editinplace.php
*Type:function
*Name:editinplace
*Purpose:squirts out a bit of scriptaculous editinplace stuff...
*-------------------------------------------------------------
*/

function smarty_function_editinplace($params,&$smarty) {

	global $user;
	
	if (empty($params['target'])){
		$smarty->trigger_error("assign:missing 'target' parameter");
		return;
	}
	
	if (empty($params['element_id'])){
		$smarty->trigger_error("assign:missing 'element_id' parameter");
		return;
	}
	
	$options=array();
	$options['okControl']="false";
	$options['cancelControl']="false";
	$options['formClassName']="ipe";
	$options['submitOnBlur']="true";
	if (isset($params['emptytext'])){
		$options['emptyText']=$params['emptytext'];
		unset($params['emptytext']);
	} elseif (isset($params['term'])){
		$options['emptyText']="Click to edit ".$params['term']."...";
	
	}
	
	
	$output="
	<script type='text/javascript'>
		new Ajax.InPlaceEditorWithEmptyText( '".$params['element_id']."', '".$params['target']."?";
		
	foreach ($params as $key=>$value){
		if ($key!="element_id" AND $key!="target"){
			$output.=$key."=".$value."&";
		}
	}
	$output=rtrim($output,"&");
	
	$output.="', {";
	
	foreach ($options as $key=>$value){
		$output.=$key.":'".$value."',";
	}
	$output=rtrim($output,",");
	
	$output.="});
	</script>";
			
	return $output;
}
?>