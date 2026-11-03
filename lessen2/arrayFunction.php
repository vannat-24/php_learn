<?php
$number=[12,34,56,23,14,53];
$Number=[78,98,67,56,45,98,40];
foreach($number as $i){
echo $i. ' ';
};
echo '<hr>';
array_push($number,45);
foreach($number as $i){
echo $i. ' ';}


array_pop($number)
;
echo '<hr>';
foreach($number as $i){
echo $i. ' ';}
echo '<hr>';


if(in_array(12,$number)){
    echo '12 is in array <br>';
}else{
    echo "12 is't into array<br>";
}
echo '<hr>';
$combinArray=array_merge($number,$Number);

foreach($combinArray as $j){
    echo $j .' ';
}
echo '<hr>';
echo array_search(56,$number);

echo '<hr>';
$arrayCut=array_slice($number,4,8);
foreach($arrayCut as $k){
    echo $k. ' ';
}

?>