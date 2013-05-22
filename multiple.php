<?php ?>
<html>
<head></head>
<body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>



<?php

require_once 'lib/init.php';
$properties=new property_manager();
$question=$properties->get_formquestions();
$answers=$properties->get_formanswers();




print "<h1> $question </h1>";
?>
<form>

<?php 
print '<input type="hidden" name="session" value="'.$question.'"><br>';
print  'What is your name?  <input type="text" name="name"><br/><br/>';
print  'What do you think?<br/><br/>';
foreach ($answers as $answer){

   print '<input type="radio" name="answer" value="'.$answer['data'].'"  onClick="testResults(this.form)" >'.$answer['data'].'<br>';
print "\n";
 }
  
  ?>
  
  </select>
</form>

<script> 

$.ajax({
	  url: 'http://109.74.200.115/Omelette/lib/backend_questions.php',
	  dataType: 'html',
	  cache: false,
	  data: {},
	  success: function(data, textStatus) {
		  console.log(data)
		  publish(data);
	  },
	 
	});
  
function publish(data){
setInterval( function(){
	
$.ajax({
	  url: 'http://109.74.200.115/Omelette/lib/backend_questions.php',
	  dataType: 'html',
	  cache: false,
	  newdata: {},
	  success: function(newdata, textStatus) {
		  
		
	
				
		if (data != newdata){ 
			location.reload()				
		}
	  },
	 
	});


  
}
, 5000 );
};

  
function testResults (form) {
    var name = form.name.value;
    var session = form.session.value;
    
    var answer = $('input[@name="answer"]:checked').val();
    touch(name, session, answer);
}

function touch(name, session, answer) {
	 $.ajax({
		  url: 'http://109.74.200.115/Omelette/properties/' + encodeURIComponent(session) + '.' + encodeURIComponent(name) + '/' + encodeURIComponent(answer) + '/',
		  dataType: 'html',
		  data: {},
		  success: function(data, textStatus) {
			   console.log(data);
		  },
		  jsonpCallback: 'foo'
		});
   }

function arraysEqual(arr1, arr2) {

	
	if(arr1.length !== arr2.length)
        return false;
   

    return true;
}

</script>