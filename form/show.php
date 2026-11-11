<?php
session_start();
$products = $_SESSION['products'] ?? [];
?>
<main>
    <a href="form.php">Create</a>
    <h1>Product list</h1>
    <?php if (empty($products)): ?>
        <p>No products have been added.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= htmlspecialchars($product['title'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars((string) $product['price'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars((string) $product['qty'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($product['description'], ENT_QUOTES, 'UTF-8') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</main>