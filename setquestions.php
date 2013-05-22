<?php

// class loader
require_once 'lib/init.php';
$properties=new property_manager();

if (isset($_POST["question"]) ) { 
$properties->set_questions($_POST);

}

?>
<html>
<body>

<form action="setquestions.php" method="post">
question: <input type="text" name="question">
answer1: <input type="text" name="answer[]">
answer1: <input type="text" name="answer[]">
answer1: <input type="text" name="answer[]">
answer1: <input type="text" name="answer[]">
<input type="submit">
</form>

</body>
</html>


<?php




