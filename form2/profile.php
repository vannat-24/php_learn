<?php
session_start();
// ពិនិត្យមើលថាតើមានទិន្នន័យបាន submit មកឬនៅ
if (!isset($_SESSION['form_data'])) {
    header("Location: form.php");
    exit();
}
$data = $_SESSION['form_data'];

?>

<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="UTF-8">
    <title>តារាងព័ត៌មាន</title>
    <style>
        body { font-family: sans-serif; margin: 40px; }
        table { border-collapse: collapse; width: 60%; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; width: 30%; }
        a.btn { display: inline-block; margin-top: 15px; text-decoration: none; color: blue; }
    </style>
</head>

<body>
    <h2>ព័ត៌មានដែលបានបញ្ចូលជោគជ័យ</h2>
    <table>
    <tr>
        <th>ឈ្មោះ</th>
        <td><?php echo $data['name']; ?></td>
    </tr>
    <tr>
        <th>ភេទ</th>
        <td><?php echo $data['gender']; ?></td>
    </tr>
    <tr>
        <th>លេខទូរស័ព្ទ</th>
        <td><?php echo $data['tel']; ?></td>
    </tr>
    <tr>
        <th>អាសយដ្ឋាន</th>
        <td><?php echo nl2br($data['address']); ?></td>
    </tr>
    <tr>
        <th>រូបថត</th>
        <td>
            <?php if (!empty($data['photo'])): ?>
                <?php
                    $fileUrl = htmlspecialchars($data['photo'], ENT_QUOTES, 'UTF-8');
                    $extension = strtolower(pathinfo($data['photo'], PATHINFO_EXTENSION));
                ?>
                <?php if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'], true)): ?>
                    <img src="<?php echo $fileUrl; ?>" alt="រូបភាពដែលបានភ្ជាប់" style="max-width: 200px; height: auto; display: block;">
                    <a href="<?php echo $fileUrl; ?>" target="_blank" rel="noopener">មើលរូបភាព</a>
                <?php else: ?>
                    <a href="<?php echo $fileUrl; ?>" target="_blank" rel="noopener">មើលឯកសារ</a>
                <?php endif; ?>
            <?php else: ?>
                គ្មាន
            <?php endif; ?>
        </td>
    </tr>
</table>

<a class="btn" href="index.php">← បញ្ចូលព័ត៌មានម្តងទៀត</a>
</body>
</html>