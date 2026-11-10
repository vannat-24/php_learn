<?php
session_start();
$_SESSION['message']='New Update session';
header('Location: show.php');
?>