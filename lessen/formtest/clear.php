<?php
session_start();
unset($_SESSION['users']);   // លុបតែ users
// ឬ session_destroy();       // លុប session ទាំងអស់
header("Location: store.php");
exit;