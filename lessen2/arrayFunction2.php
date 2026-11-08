<?php
$data=['van','nat','dara',12,43];
$result=(in_array('dara',$data))?'true':'fale';
echo $result;

echo '<hr>';
$course=['vue','react','tailwind','Java','html'];
$index=array_search('html',$course);

echo 'at position '.$index;
echo 'value'.$course[$index];

//-----------------
echo '<hr>';
$user1=['van','dara'];
$user2=['vachra','mama'];
$user3=array_merge($user1,$user2);
print_r($user3);

//==============
echo '<hr>';
$data=['a','b','c',1,2,4];
$result=array_slice($data,1,3);
print_r($result);

//=============
print_r($data);

echo '<hr>';
$user=[
    ['name'=>'user1','age'=>11],
    ['name'=>'user3','age'=>32],
    ['name'=>'user2','age'=>54]
];
$result =array_column($user,'name');
print_r($result);
$result =array_column($user,'age');
print_r($result);


//======
echo '<hr>';
$data=['vue',10,30,'lavarel',50];
$result=array_filter($data,function ($item) {return is_numeric($item)&&$item>10;});
print_r($result);
echo '<hr>';
$data =[10,'30',60,40];
$result=array_reduce($data,function ($sum, $item) {return $sum+$item;});

echo 'sum= '.$result;







?>