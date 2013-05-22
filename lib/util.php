<?php

require_once "init.php";

function writeSessionCSV ($sessionresults){

	$string = "source,target,value";
	$string .= "\n";
	
	foreach ($sessionresults as $session => $dataArray){
		foreach ($dataArray as $data){
				$string .= $session . "," . $data['data'] . ",1";
				$string .= "\n";
			
		}
		
	}

	$xmlfile = "force.csv";
	$fh = fopen($xmlfile, 'w') or die("can't open file");
	fwrite($fh, $string);
	fclose($fh);
}


function circlePackingJson($widgetresults){
	$propman = new property_manager();
	$string = "{";
	$string .= '
			    "name": "omelette",
			';
	$string .= '"children": [
			';

	foreach ($widgetresults as $widget => $dataArray){
		$string .= " { \n";
		$string .= ' "name": "'.$widget.'",
				';
		$string .= ' "children": [ ';
		foreach ($dataArray as $data){
			$num=$propman->get_count('data',$data['data']);
			$string .= '
			{"name": "'.$data['data'].'", "size":'.$num.'},';
		}
		$string = rtrim($string, ",");
		$string .= "] \n";
		$string .= "},";
	}
	$string = rtrim($string, ",");
	$string .= "]}";

	//$xmlfile = "bullets.json";
	//$fh = fopen($xmlfile, 'w') or die("can't open file");
	//fwrite($fh, $string);
	//fclose($fh);

	return $string;
}



function createsankyJSON($datas,$results){

	$i=0;

	$string = '{"nodes":[';
	$string .= "\n";


	foreach ($datas as $data){
		$list[$data['data']] = $i;
		$i++;
		$string .= "\n";
		$string .= 	'{"name":"'.$data['data'].'"},';
	}
	
	$string = rtrim($string, ",");
	$string .= 	"\n ], \n";


	//list[$name] will get you the id 

	foreach ($results as $result){
		
		$i=0;
		foreach ($result as $article){
			$i++;
		

		 if ($result[$i]){
		 	$sources[$article][$result[$i]] = $sources[$article][$result[$i]] + 1;
		 	}	
		}
	}
	
	$string .= '"links":[';

	
	foreach ($sources as $source => $targets){
		
		foreach ($targets as $target => $number){
			$string .= "\n";
			//{"source":0,"target":1,"value":124.729},
			$string .= '{"source":'.$list[$source].',"target":'.$list[$target].',"value":'.$number.'},';
		}
		
	}
	$string = rtrim($string, ",");
	
	$string .= "\n";
	$string .= "]}";
	

	return $string;
}

function treeJSON($datas){

	$i=0;

	$string = '{"name": "questions", ';
	$string .= "\n";
	$string .= ' "children": [ ';
 				


	foreach ($datas as $question => $data){
		$string .= ' { ';
		$string .= '"name": "'.$question.'",';
		$string .= '"children": [';
	    
			foreach ($data as $answers){

				 $string .= '{"name": "'.$answers['data'] .'", "size": 5000},';
			
				}
				$string = rtrim($string, ",");
				$string .= ']},';
	}
	$string = rtrim($string, ",");
	$string .= ']}';
	

	return $string;
}


function printGraphSpringy($nodes, $sessionresults){


	$string = "{ \n";
	$string .= ' "nodes": [';
	
	foreach ($nodes as $node => $dataArray){
		foreach ($dataArray as $data){
			$string .= "\n";
			if (isset($data['data'])){
				$string .= '"' .$data['data'] . '",' ;		
			}else{
				$string .= '"' .$data['session_id'] . '",' ;
			}	
		}
	}
	$string = rtrim($string, ",");
	
	$string .= '],';
	
	$string .=  ' "edges": [';
	
	foreach ($sessionresults as $session => $dataArray){
		foreach ($dataArray as $data){
			$string .= "\n";
			$string .= '["' .$session.'"' .  ', "' . $data['data']. '"],' ;
		}
	}
	$string = rtrim($string, ",");
	$string .= "	
	]
	}";
	
	return $string;
}

function sort_by_user($array) {
	$out = array();
	foreach($array as $answers)
		print_r($answers);
	
	exit();
		$out[] = "$key=$value";
	return $out;
}
