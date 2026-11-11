<?php
session_start();
$errors = $_SESSION['errors'] ?? [];
$oldInput = $_SESSION['old_input'] ?? [];
unset($_SESSION['errors'], $_SESSION['old_input']);
?>
<main>
    <h1>Create Product</h1>
    <form action="validation.php" method="post">
    <input type="text" name="title" placeholder="title" value="<?= htmlspecialchars($oldInput['title'] ?? '', ENT_QUOTES, 'UTF-8') ?>"><br>
    <!-- error title -->
    <?php if (!empty($errors['title'])): ?>

        <p><?= htmlspecialchars($errors['title'], ENT_QUOTES, 'UTF-8') ?></p>
        <?php endif ?>
    <input type="number" name="price" placeholder="price" min="1" step="any" value="<?= htmlspecialchars($oldInput['price'] ?? '', ENT_QUOTES, 'UTF-8') ?>"><br>
        <?php if (!empty($errors['price'])): ?>
            <p><?= htmlspecialchars($errors['price'], ENT_QUOTES, 'UTF-8') ?></p>
            <?php endif ?>

    <input type="number" name="qty" placeholder="QTY" min="1" step="1" value="<?= htmlspecialchars($oldInput['qty'] ?? '', ENT_QUOTES, 'UTF-8') ?>"><br>

            <?php if (!empty($errors['qty'])): ?>
                <p><?= htmlspecialchars($errors['qty'], ENT_QUOTES, 'UTF-8') ?> </p>
                <?php endif ?>

            <textarea name="description"><?= htmlspecialchars($oldInput['description'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea><br>

            <?php if (!empty($errors['description'])): ?>
                <p><?= htmlspecialchars($errors['description'], ENT_QUOTES, 'UTF-8') ?></p>
                <?php endif ?>
            <button type="submit">Submit</button>
            <button type="reset">Reset</button>










    </form>
</main>