<?php
session_start();

/**
 * Safely escape text for HTML output to prevent XSS.
 */
function escapeHtml(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

// Get the most recently uploaded photo info from session
$latestPhoto = $_SESSION['uploaded_photo'] ?? null;
$hasLatestFile = $latestPhoto !== null && file_exists(__DIR__ . '/' . $latestPhoto['path']);

// Also scan all saved photos inside the "uploads" folder
$uploadDir         = __DIR__ . '/uploads';
$allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
$allPhotos         = [];

if (is_dir($uploadDir)) {
    $items = scandir($uploadDir);
    if ($items !== false) {
        foreach ($items as $item) {
            if ($item === '.' || $item === '..') {
                continue;
            }
            $fullPath  = $uploadDir . '/' . $item;
            $extension = strtolower(pathinfo($item, PATHINFO_EXTENSION));
            if (is_file($fullPath) && in_array($extension, $allowedExtensions, true)) {
                $allPhotos[] = 'uploads/' . $item;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Uploaded Photo - PHP File Handling</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            background-color: #f4f6f9;
            margin: 0;
            padding: 36px 16px;
            color: #1f2937;
        }
        .container {
            max-width: 820px;
            margin: 0 auto;
        }
        .card {
            background: #ffffff;
            padding: 24px;
            border-radius: 10px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
            margin-bottom: 24px;
        }
        .header-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 18px;
        }
        h1, h2 {
            margin: 0;
        }
        .btn {
            display: inline-block;
            padding: 10px 16px;
            background-color: #2563eb;
            color: #ffffff;
            text-decoration: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: bold;
        }
        .btn:hover {
            background-color: #1d4ed8;
        }
        .latest-wrapper {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            align-items: flex-start;
        }
        .latest-wrapper img {
            max-width: 320px;
            width: 100%;
            height: auto;
            border-radius: 8px;
            border: 1px solid #e5e7eb;
        }
        .info-table {
            flex: 1;
            min-width: 240px;
            border-collapse: collapse;
            font-size: 14px;
        }
        .info-table td {
            padding: 8px 6px;
            border-bottom: 1px solid #e5e7eb;
        }
        .info-table td:first-child {
            font-weight: bold;
            color: #4b5563;
            width: 130px;
        }
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            gap: 14px;
            margin-top: 16px;
        }
        .gallery-item {
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            overflow: hidden;
            background: #f9fafb;
            text-align: center;
            padding: 8px;
        }
        .gallery-item img {
            width: 100%;
            height: 140px;
            object-fit: cover;
            border-radius: 6px;
        }
        .gallery-name {
            font-size: 12px;
            color: #4b5563;
            margin-top: 6px;
            word-break: break-all;
        }
        .empty-note {
            color: #6b7280;
            font-size: 14px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="header-row">
                <h1>Uploaded Photo Result</h1>
                <a class="btn" href="uploadForm.php">+ Upload Another Photo</a>
            </div>

            <?php if ($hasLatestFile): ?>
                <div class="latest-wrapper">
                    <img
                        src="<?= escapeHtml($latestPhoto['path']) ?>"
                        alt="<?= escapeHtml($latestPhoto['title']) ?>"
                    >
                    <table class="info-table">
                        <tr>
                            <td>Title</td>
                            <td><?= escapeHtml($latestPhoto['title']) ?></td>
                        </tr>
                        <tr>
                            <td>Original Name</td>
                            <td><?= escapeHtml($latestPhoto['original_name']) ?></td>
                        </tr>
                        <tr>
                            <td>Saved Name</td>
                            <td><?= escapeHtml($latestPhoto['saved_name']) ?></td>
                        </tr>
                        <tr>
                            <td>Saved Path</td>
                            <td><code><?= escapeHtml($latestPhoto['path']) ?></code></td>
                        </tr>
                        <tr>
                            <td>Dimensions</td>
                            <td><?= (int) $latestPhoto['width'] ?> x <?= (int) $latestPhoto['height'] ?> px</td>
                        </tr>
                        <tr>
                            <td>File Size</td>
                            <td><?= number_format($latestPhoto['size_bytes'] / 1024, 2) ?> KB</td>
                        </tr>
                        <tr>
                            <td>MIME Type</td>
                            <td><?= escapeHtml($latestPhoto['mime_type']) ?></td>
                        </tr>
                        <tr>
                            <td>Uploaded At</td>
                            <td><?= escapeHtml($latestPhoto['uploaded_at']) ?></td>
                        </tr>
                    </table>
                </div>
            <?php else: ?>
                <p class="empty-note">No photo uploaded in this session yet. Click "Upload Another Photo" to upload one.</p>
            <?php endif; ?>
        </div>

        <div class="card">
            <h2>All Photos in <code>uploads/</code> (<?= count($allPhotos) ?>)</h2>
            <?php if (count($allPhotos) > 0): ?>
                <div class="gallery">
                    <?php foreach ($allPhotos as $photoPath): ?>
                        <div class="gallery-item">
                            <img src="<?= escapeHtml($photoPath) ?>" alt="Uploaded Photo">
                            <div class="gallery-name"><?= escapeHtml(basename($photoPath)) ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p class="empty-note">The <code>uploads/</code> folder is currently empty.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>

