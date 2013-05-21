<?php


class property_manager{
	var $properties=array();
	
	function getpropertylist($limit=null,$order=null,$dir="ASC"){
	
		
		global $db;
		
		$sql="SELECT id FROM properties ";
		if ($limit!=null AND is_numeric($limit)){
			$sql.=" LIMIT $limit ";
		}
		
		if ($dir<>"ASC" AND $dir<>"DESC"){
			$dir="ASC";
		}

		if (!is_null($order)){
		switch ($order){
			case "id":
				$sql.=" ORDER BY id $dir";
				break;
			case "widget":
				$sql.=" ORDER BY widget $dir";
				break;
			case "session_id":
				$sql.=" ORDER BY session_id $dir";
				break;

			}
		}
		
		$properties=$this->getbysql($sql,$order);
		
		return $properties;
		
	}
	
	function getby_session($session,$widget){
		$sql="SELECT id FROM properties WHERE widget LIKE '$widget' AND session_id LIKE '$session'  ";
		$properties=$this->getbysql($sql);
		
		// Only return something if we have found ONE property...
		if (is_array($properties) AND count($properties)==1){
			$property = $properties[0];
			return $property;
		} else {
			return FALSE;
		}
	
	}
	
	function get_widgetresults($widgetname){
		$sql="SELECT session_id, data from  properties WHERE widget LIKE '$widgetname' ";
		$properties=$this->simplesql($sql);
		return $properties;
		
	}
	
	function get_sessionresults($sessionname){
		$sql="SELECT widget, data from  properties WHERE session_id LIKE '$sessionname' ";
		$properties=$this->simplesql($sql);
		return $properties;
	
	}
	
	function get_count($column,$string){
		$sql='select count(*) AS count from `properties` where '.$column.' = "'.$string.'" ';
		$properties=$this->simplesql($sql);
		return $properties['0']['count'];
	
	}


	function get_all($table){
		$sql='select * FROM '.$table.'" ';
		$properties=$this->simplesql($sql);
		return $properties['0']['count'];
	
	}
	
	/*return a list of ids */
	function get_distinct($value,$order=null){
		$sql="SELECT DISTINCT " . $value . " FROM `properties`  ";
		
		if ($order){
			$sql .= "ORDER BY " . $order;
		}
		
		$properties=$this->simplesql($sql);
		
		return $properties;
		
		}
		
		function get_answers($user,$order=null){
			$sql="SELECT data  FROM `properties`  WHERE session_id = '".$user."'" ;
		
			if ($order){
				$sql .= " ORDER BY " . $order;
			}
		
			$properties=$this->simplesql($sql);
		
			return $properties;
		
		}
		
		
		
	function getbysql($sql){
		global $db;
		$properties=array();
		$data=$db->queryarray($sql);
		if (is_array($data)){
			foreach ($data as $thisprop){
				$properties[]=new property($thisprop['id']);
			}
		}

		return $properties;
	}
	

	function simplesql($sql){
		global $db;
		$properties=array();
		$data=$db->queryarray($sql);	

		
		return $data;
	}
	
	
	/* backup the db OR just a table */
	function backup_tables()
	{
	
		$filename='database_backup_'.date("Y-m-d H:i:s").'.sql';
		print $filename;
		//sudo mysqldump -uroot -pgladdylight omelette > test.sql
		
		$result=exec('mysqldump -uroot -pgladdylight omelette > /var/www/Omelette/backups/'.$filename,$output);
		print $result;
		if($output==''){print "no output";}
		else {print_r($output);}
		
		
	}
	
}	


class property  extends database_record{

	var $widget;
    var $id;
    var $session_id;
    var $data;
    var $db_table = "properties";
    
	// I'm pretty sure this isn't how constructors are called anymore
	function property($id=null){
		global $db;

		if ($id){
			$this->id = $id;
		}else{
			$this->database_record($id,"properties");
		}
	}

	function savetodb(){
	//	global $user;

		// Pass back to the main
		
		if ($this->id==null){
			$newrec=TRUE;
		} else {
			$newrec=FALSE;
		}
		
		database_record::savetodb();
		
	}


	function destroy(){
		// This will actually destroy the database record
		// and all the properties and activities associated with the project...

		database_record::destroy();
	}
	
	function exportJSON(){
		$toencode=array();
		$toencode['project_id']=$this->id;
		//$toencode['name']=$this->title;
		//$toencode['shortname']=$this->shortname;

		$propsparsed=array();
		$props=$this->properties->get_properties();
		foreach ($props as $thisprop){
			$propsparsed=array_merge($propsparsed,array($thisprop->term=>$thisprop->data));
		}

		$toencode['properties']=$propsparsed;


		$jsonout=json_encode($toencode);
		return $jsonout;
	}




}