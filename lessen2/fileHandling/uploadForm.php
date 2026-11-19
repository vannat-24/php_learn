<?php
session_start();

// Read any error message from uploadProcess.php, then remove it (flash message)
$errorMessage = $_SESSION['upload_error'] ?? null;
unset($_SESSION['upload_error']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Photo - PHP File Handling</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            background-color: #f4f6f9;
            margin: 0;
            padding: 40px 16px;
            color: #1f2937;
        }
        .card {
            max-width: 480px;
            margin: 0 auto;
            background: #ffffff;
            padding: 28px;
            border-radius: 10px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
        }
        h1 {
            margin-top: 0;
            font-size: 22px;
        }
        .subtitle {
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 20px;
        }
        .alert-error {
            background-color: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 18px;
            font-size: 14px;
        }
        .form-group {
            margin-bottom: 16px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 6px;
            font-size: 14px;
        }
        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 14px;
            background: #f9fafb;
        }
        .hint {
            font-size: 12px;
            color: #6b7280;
            margin-top: 6px;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #2563eb;
            color: #ffffff;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
        }
        button:hover {
            background-color: #1d4ed8;
        }
        .nav-link {
            display: block;
            text-align: center;
            margin-top: 16px;
            color: #2563eb;
            text-decoration: none;
            font-size: 14px;
        }
        .nav-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Upload Photo (PHP)</h1>
        <p class="subtitle">Select an image to upload and display it in <code>showPhoto.php</code>.</p>

        <?php if ($errorMessage !== null): ?>
            <div class="alert-error">
                <?= htmlspecialchars($errorMessage, ENT_QUOTES, 'UTF-8') ?>
            </div>
        <?php endif; ?>

        <!-- enctype="multipart/form-data" is REQUIRED for file uploads -->
        <form action="uploadProcess.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Photo Title (Optional)</label>
                <input type="text" id="title" name="title" placeholder="e.g. My Profile Photo">
            </div>

            <div class="form-group">
                <label for="photo">Choose Photo</label>
                <input
                    type="file"
                    id="photo"
                    name="photo"
                    accept="image/jpeg,image/png,image/gif,image/webp"
                    required
                >
                <div class="hint">Allowed: JPG, JPEG, PNG, GIF, WEBP (Max 2MB)</div>
            </div>

            <button type="submit">Upload Photo</button>
        </form>

        <a class="nav-link" href="showPhoto.php">View Uploaded Photos &rarr;</a>
    </div>
</body>
</html>

