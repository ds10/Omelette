<?php 


require_once "lib/init.php";

$properties=new property_manager();
$words= $properties->grabwords();

?>
<!DOCTYPE html>
<meta charset="utf-8">
<script src="lib/js/d3.v3.min.js"></script>
<script src="lib/js/d3.layout.cloud.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<body>
<script>
var fill = d3.scale.category20();

var words = [],
max,
scale = 1,
complete = 0,
keyword = "",
tags,
fontSize,
maxLength = 30,
statusText = d3.select("#status");



d3.layout.cloud().size([300, 300])
.words([
<?php
	$string = "";
	foreach ($words as $word){
		foreach ($word as $single){
		$string .= '"'.$single.'",';
	}
	}
	$string = rtrim($string, ",");
	print $string;
?>
].map(function(d) {
return {text: d, size: 10 + Math.random() * 90};
}))
.rotate(function() { return ~~(Math.random() * 2) * 90; })
.font("Impact")
.fontSize(function(d) { return d.size; })
.on("end", draw)
.start();



function draw(words) {


	d3.select("body").append("svg")
	.attr("width", 300)
	.attr("height", 300)
	.append("g")
	.attr("transform", "translate(150,150)")
	.selectAll("text")
	.data(words)
	.enter().append("text")
	.style("font-size", function(d) { return d.size + "px"; })
	.style("font-family", "Impact")
	.style("fill", function(d, i) { return fill(i); })
	.attr("text-anchor", "middle")
	.attr("transform", function(d) {
		return "translate(" + [d.x, d.y] + ")rotate(" + d.rotate + ")";
	})
	.text(function(d) { return d.text; });
}


$.ajax({
	  url: 'http://109.74.200.115/Omelette/lib/backend_wordl.php',
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
	  url: 'http://109.74.200.115/Omelette/lib/backend_wordl.php',
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

  



</script>

</script>
