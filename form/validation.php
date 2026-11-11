<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = is_string($_POST['title'] ?? null) ? trim($_POST['title']) : '';
    $price = is_string($_POST['price'] ?? null) ? trim($_POST['price']) : '';
    $qty = is_string($_POST['qty'] ?? null) ? trim($_POST['qty']) : '';
    $description = is_string($_POST['description'] ?? null) ? trim($_POST['description']) : '';

    $errors = [];

    if (empty($title)) {
        $errors['title'] = 'Title is required.';
    } else if (strlen($title) < 3) {
        $errors['title'] = 'Title must be at least 3 characters.';
    }

    if (empty($price)) {
        $errors['price'] = 'Price is required.';
    } else if (!is_numeric($price) || (float) $price < 1) {
        $errors['price'] = 'Price must be a number at least 1.';
    }

    if (empty($qty)) {
        $errors['qty'] = 'QTY is required.';
    } else if (filter_var($qty, FILTER_VALIDATE_INT) === false || (int) $qty < 1) {
        $errors['qty'] = 'QTY must be a whole number at least 1.';
    }

    if (empty($description)) {
        $errors['description'] = 'Description is required.';
    } else if (strlen($description) < 5) {
        $errors['description'] = 'Description must be at least 5 characters.';
    }

    if (empty($errors)) {
        $_SESSION['products'] ??= [];
        $_SESSION['products'][] = [
            'title' => $title,
            'price' => (float) $price,
            'qty' => (int) $qty,
            'description' => $description,
        ];
        unset($_SESSION['errors'], $_SESSION['old_input']);
        header('Location: show.php');
        exit();
    } else {
        $_SESSION['errors'] = $errors;
        $_SESSION['old_input'] = [
            'title' => $title,
            'price' => $price,
            'qty' => $qty,
            'description' => $description,
        ];
        header('Location: form.php');
        exit();
    }
}

header('Location: form.php');
exit();
?>