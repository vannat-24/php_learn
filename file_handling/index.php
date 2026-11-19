<?php
session_start();
?>

<h1>Uploaded image</h1>
<?php 
if(isset ($_SESSION['image_path'])):?>
    <?php foreach ($_SESSION['image_path'] as $image): ?>
        <img src="<?= $image ?>" width="200px" alt=""><hr>
        <?php endforeach?>
    <?php else: ?>
        <p>NO image Uploads yet.</p>
        <?php endif ?>
        <br><br>
        <a href="form.php"> uploads new image</a>
