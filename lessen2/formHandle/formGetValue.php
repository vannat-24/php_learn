<?php
session_start();
if($_SERVER['REQUES_METHOD']=='POST'){
    $_SESSION['name']=$name;
    $_SESSION['age']=$age;
    $_SESSION['email']=$email;
    
    $name= trim($_POST['name'])?? '';
    $age= trim($_POST['age'])?? '';
    $email= trim($_POST['email'])?? '';
    
    
    header('Location: formDeplay.php');
}
?>