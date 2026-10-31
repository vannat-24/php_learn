<?php 
if(isset($_POST['name'])&& isset($_POST['password'])){
    if(!empty($_POST['name'])&& !empty($_POST['password'])){
        $name = $_POST['name'];
        $pass = $_POST['password'];
        echo "name:{$name}<br>password:{$pass}<br>"; 
    }else{
        header('Location:simpleForm.php');
    }
         
    }

?>