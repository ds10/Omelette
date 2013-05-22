<?php
require_once "init.php";
$properties=new property_manager();
$words= $properties->grabwords();
print_r($words);