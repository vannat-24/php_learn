<?php
setcookie('message','',time()-50,'/') .'<br>';
header('Location: Show_cookies.php');
?>