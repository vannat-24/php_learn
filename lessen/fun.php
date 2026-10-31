<?php 
function greeting ($name='dara'){
    
    echo 'hello every '. $name;
}
greeting();

function triangleArea($width, $height){

return $width*$height/2;
}
echo triangleArea(22,33);

echo "<hr>";
$a=null;

function sum(){
    global $a;
    return 10+$a;
}
echo sum() . '<hr>'. "static<br>";

function a(){
    static $a=0;
    $a++;
    echo  $a ."<br>";
}
a();a();a();





?>