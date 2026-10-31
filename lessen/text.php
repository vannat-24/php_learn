<?php 
if(
    array_key_exists('surname',$_POST)&& 
    array_key_exists('name',$_POST)&& 
    array_key_exists('age',$_POST)&&
    array_key_exists('password',$_POST)&&
    array_key_exists('re-password',$_POST)
    
    ){
    if($_POST['password']!=$_POST['re-password']){
        echo 'Password is currect.<br>';
}else{
    echo "ត្រកូល {$_POST['surname']}ឈ្មោះ​ {$_POST['name']} អាយុ​ {$_POST['age']}  ពាក្យសម្ងាត់ {$_POST['password']}  ";
}
}





















?>
<body style="background: <?php 
if(isset($_POST['color'])){
    echo $_POST['color'];
}else{
    echo  'white';
}
?>">
    <form method="post" >
    ត្រកូល: <input type="text" name="surname"><br>
    ឈ្មោះ: <input type="text" name="name"><br>
    អាយុ: <input type="number" name="age"><br>
    អក្សរសម្ងាត <input type="password" name="password"><br>
    អក្សរសម្ងាត <input type="password" name="re-password"><br>
    color: <input type="color" name="color"> <br>
    <button type="submit">submit</button>
</form>
</body>

