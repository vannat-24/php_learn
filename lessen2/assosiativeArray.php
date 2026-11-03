<?php 
$name = "";
$email = "";
$password = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    // Validate Name
    if (empty($name)) {
        $errors['name'] = "Name is required.";
    }

    // Validate Email
    if (empty($email)) {
        $errors['email'] = "Email is required.";
    }

    // Validate Password
    if (empty($password)) {
        $errors['password'] = "Password is required.";
    }

    // Static Login Check
    if (empty($errors)) {
        if ($email === "van@gmail.com" && $password === "van123") {
            $success = "Login Successful! Welcome, " . htmlspecialchars($name);
        } else {
            $errors['login'] = "Invalid email or password.";
        }
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
    <h1>login form</h1>
    <?php
    if(isset($success)){
        echo '<p>$success</p>';
    }
    ?>

    <form method="post">
        name: <input type="text" name="name" value=<?= htmlspecialchars($name) ?>> <span><?= $errors['name'] ?? '' ?></span>
        email: <input type="text" name="email" value="<?=htmlspecialchars($email)  ?>" ><span><?= $errors['email']?? '' ?></span>
        password: <input type="text" name="password"  ><span><?= $errors['password']?? '' ?></span>
        <br>
        <span><?= $errors['login']?? '' ?></span>
        <br><br>
        <button type="submit">submit</button>
    </form>
</body>
</html>