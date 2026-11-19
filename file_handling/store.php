<?php 
session_start();
if($_SERVER['REQUEST_METHOD']==='POST'){
    $image_name=$_FILES['image']['name'];
    $tmp_name= $_FILES['image']['tmp_name'];
    $image_path = "image/". time(). '_'. $image_name;

    if(move_uploaded_file($tmp_name,$image_path)){
        $_SESSION['image_path'][]=$image_path;
       header('Location: index.php' ); 
       exit;
    }
    
    
}
?>