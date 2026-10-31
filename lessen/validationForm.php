<?php
$usernameErr= '';
$passwordErr='';
$username='';
 $password='';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(empty($_POST['name'])){
        $usernameErr='user name is require.';
    }else{
        $username=$_POST['name'];
    }

    if(empty($_POST['password'])){
        $passwordErr = "password is require.";
    }else{
        $password =$_POST['password'];
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>* is must require</p>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'UTF-8'); ?>" method="post">
        <input type="text" placeholder="name" name="name">      <span>*<?php echo htmlspecialchars($usernameErr, ENT_QUOTES, 'UTF-8'); ?> </span><br>
        <input type="password" placeholder="Password" name="password">     <span>*<?php echo htmlspecialchars($passwordErr, ENT_QUOTES, 'UTF-8'); ?></span><br>
        <input type="submit" value="Submit">
    </form>
    Username:<?php echo htmlspecialchars($username, ENT_QUOTES, 'UTF-8'); ?><br>
    Passwrod:<?php echo htmlspecialchars($password,ENT_QUOTES,'UTF-8'); ?>
</body>
</html>