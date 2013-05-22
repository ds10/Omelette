<?php
require_once "init.php";
$properties=new property_manager();
$question=$properties->get_formquestions();
$answers=$properties->get_formanswers();

print $question;
print_r($answers);