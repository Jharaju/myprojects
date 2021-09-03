<?php
require_once "test2.php";
$obj= new test('project');
echo $obj->sayHello();

// $obj= null;

$obj1= new test('something');
echo "<br>". $obj1->sayBye();







?>