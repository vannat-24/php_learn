<?php
echo 'string len <hr>';
$message="welcom to string function";
$result=strlen($message);
echo $result;
//=================

echo '<hr> string position <hr>';
$index = strpos($message,'to');
echo $index;



//========
echo 'string replace <hr>';
$result1=str_replace('welcom to','hello',$message);
echo $result1;

//======
echo '<hr> string lowercase and Upercase<hr>';
$name = 'REAKSA';
$result2= strtolower($name);
$result3 = strtoupper($name);
echo $result2 . '  '. $result3;


//================
echo '<hr> sub string <hr>';
$text = 'hello all cambodia';
$Text= strpos($text, 'hello');
$reText =substr($text , $Text);
echo $reText;
//============

echo '<hr> string trim <hr>';
$email = 'Tes@gmail.com';
if(trim(strtolower($email))==='test@gmail.com'){
    echo 'Login Successfully.';
}else{
    echo 'Login Failed.';
}
echo '<hr> string explowde';
$course= 'php,vue,laravel,react';
$arr= explode(',',$course);
print_r($arr);

$text = implode('+',$arr);
echo '<br>';
echo $text;

//======
// -------------
echo "<hr>String split<hr>";

$text = "PHP";
$result = str_split($text);
print_r($result);


// -------------
echo "<hr>String split<hr>";
// where 1 = ' or 1 = 1
$tag = "<h1>Hello</h1>";

echo htmlspecialchars($tag);



// -------------
echo "<hr>String Upper Case First <hr>";

$text = "hello";
echo ucfirst($text);


echo "<hr>";
$message = "Welcome to String Function";

$check1 = str_contains($message, "Function") ? "Found" : "Not Found";
echo " String Contain : $check1 <hr>";

$check2 = str_starts_with($message, "Welcome") ? "Found" : "Not Found";
echo " String Start With : $check2 <hr>";

$check3 = str_ends_with($message, "Function") ? "Found" : "Not Found";
echo " String End With : $check3 <hr>";



?>