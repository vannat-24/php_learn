<?php
session_start();
$_SESSION['message']='Hello session';
header('Location: show.php' );

?>