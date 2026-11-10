<?php
session_start();
echo "Session value:". ($_SESSION['message'] ?? '' ). '<br>';


?>
<a href="create.php">Create</a><br>
<a href="delete.php">delete</a><br>
<a href="update.php">Update</a><br>
